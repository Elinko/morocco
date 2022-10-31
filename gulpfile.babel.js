import gulp from 'gulp';
// zaciatok nahradit za SASS
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
// koniec nahradit za SASS
import babel from 'gulp-babel';
import uglify from 'gulp-uglify';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import concat from 'gulp-concat';
import browserSync from 'browser-sync';
import addsrc from 'gulp-add-src';
import replace from 'gulp-replace';
import fileinclude from 'gulp-file-include';
import touch from 'gulp-touch-cmd';
import scsslint from 'gulp-scss-lint';

//pridat 
const sass = gulpSass(dartSass);


const paths = {
  styles: {
    src: 'assets/src/scss/style.scss',
    watch: 'assets/src/scss/**/*.scss',
    lint: ['assets/src/scss/**/*.scss', '!assets/src/scss/vendors/**/*.scss'],
    dest: 'assets/dist/css/'
  },
  css: {
    src: 'assets/dist/css/style.css',
    dest: 'assets/dist/css/'
  },
  scripts: {
    srcincludes:[
      // 'assets/src/js/includes/jquery-3.3.1.min.js',
      // 'assets/src/js/includes/cookiebar-en.js',
      // 'assets/src/js/includes/cookiebar-sk.js',
      'assets/src/js/includes/popper.min.js',
      'assets/src/js/includes/bootstrap.min.js',
      // 'assets/src/js/includes/slick.js',
      // 'assets/src/js/includes/owl.carousel.min.js',
      //'node_modules/slick-carousel/slick/slick.min.js',
      //'assets/src/js/includes/masonry.pkgd.min.js',
      //'node_modules/vanilla-lazyload/dist/lazyload.min.js',

    ],
    src: [
        'assets/src/js/app.js',
        // 'assets/src/js/map.js',
        // 'assets/src/js/cookiebar.js',
    ],
    dest: 'assets/dist/js/'
  },
  copy: {
    src:[
        'assets/src/assets/**/**.*', 
    ],
    dest:[
        'assets/dist/',
    ],
  },
  html: {
    watch: [
        './*.html',
    ]
  },
  include:{
    src: 'assets/src/*.html',
    watch: [
      'assets/src/*.html',
    ],
    dest: 'assets/dist/'
  }
}

const styles = () => {
  return gulp.src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(browserSync.stream())
    .pipe(touch());
}

const stylesProduction = () => {
  return gulp.src(paths.styles.src)
    .pipe(sass())
    .pipe(postcss([autoprefixer, cssnano]))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(browserSync.stream())
    .pipe(touch());
}

const scripts = () => {
  return gulp.src(paths.scripts.src, { sourcemaps: true })
      .pipe(babel())
      .pipe(addsrc.prepend(paths.scripts.srcincludes))
      .pipe(concat('all.js'))
      .pipe(gulp.dest(paths.scripts.dest))
      .pipe(browserSync.stream())
      .pipe(touch());
}


const scriptsProduction = () => {
  return gulp.src(paths.scripts.src, { sourcemaps: true })
      .pipe(babel())
      .pipe(uglify())
      .pipe(addsrc.prepend(paths.scripts.srcincludes))
      .pipe(concat('all.js'))
      .pipe(gulp.dest(paths.scripts.dest))
      .pipe(browserSync.stream())
      .pipe(touch());
}

const watchFiles = () => {
  browserSync.init({
      server: {
          baseDir: "./"
      }
  });
  gulp.watch(paths.scripts.src, gulp.series(scripts))
  gulp.watch(paths.copy.src, gulp.series(copy))
  gulp.watch(paths.styles.watch, gulp.series( styles, css));
  gulp.watch(paths.include.watch, gulp.series(including_dev));
  gulp.watch(paths.html.watch).on('change', browserSync.reload);
}

const css = () => {
  return gulp.src(paths.css.src )
  .pipe(concat('style-parce.css'))
  .pipe(gulp.dest(paths.css.dest))
  .pipe(postcss())
  .pipe(gulp.dest(paths.css.dest))
  .pipe(touch());
}

const copy = () => {
  return gulp.src(paths.copy.src, {base: 'assets/src/'})
    .pipe(gulp.dest(paths.copy.dest))
}

const makeid = () => {
  return (Math.random() + 1).toString(36).substring(7);
}

const php = () => {
  return gulp.src('assets/dist/*.html' )
  .pipe(replace(/_v=([0-9a-z]*)/g, '_v='+makeid()))
  .pipe(gulp.dest('assets/dist/'))
  .pipe(touch());
}

const including_dev = () => {
  return gulp.src(paths.include.src)
    .pipe(fileinclude({
      prefix: '@@',
      basepath: '@file',
      context: {
        name: 'dev'
      }
    }))
    .pipe(gulp.dest(paths.include.dest))
    .pipe(touch());
}

const including_pro = () => {
  return gulp.src(paths.include.src)
    .pipe(fileinclude({
      prefix: '@@',
      basepath: '@file',
      context: {
        name: 'pro'
      }
    }))
    .pipe(gulp.dest(paths.include.dest))
    .pipe(touch());
}

const lintCss = () => {
  return gulp.src(paths.styles.lint)
    .pipe(scsslint({
      'config': 'assets/src/scss/lint.yml'
    }));
};


const gulpBuild = gulp.series(stylesProduction, scriptsProduction, css, copy, including_pro, php);
const gulpWatch = gulp.series(styles, scripts, css, including_dev, copy, watchFiles);
const gulpParce = gulp.series(css);
const gulplintCss = gulp.series(lintCss);

gulp.task('default', gulpBuild);
gulp.task('watch', gulpWatch);
gulp.task('build', gulpBuild);
gulp.task('parce', gulpParce);

gulp.task('lintcss', gulplintCss);
