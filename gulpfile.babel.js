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

const paths = {
  styles: {
    srcincludes:[
      'assets/src/scss/includes/style.css',
    ],
    src:[
      'assets/src/scss/style.scss',
    ],
    lint: [
      'assets/src/scss/**/**/*.scss',
      '!assets/src/scss/vendors/**/*.scss'
    ],
    watch: [
      'assets/src/scss/**/**/*.scss',
      'assets/src/scss/**/**/*.css',
    ],
    dest: 'assets/dist/css/'
  },
  scripts: {
    srcincludes:[
      'assets/src/js/includes/jquery-3.3.1.min.js',
      'assets/src/js/includes/popper.min.js',
      'assets/src/js/includes/bootstrap.min.js',
    ],
    src: [
        'assets/src/js/app.js',
        'assets/src/js/cookiebar.js',
    ],
    dest: 'assets/dist/js/'
  },
  html: {
    watch: [
        'assets/src/html/*.html',
    ]
  }
}

const styles = () => {
  return gulp.src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(addsrc.prepend(paths.styles.srcincludes))
    .pipe(sass())
    .pipe(concat('style.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(browserSync.stream())
    .pipe(touch());
}

const stylesProduction = () => {
  return gulp.src(paths.styles.src)
    .pipe(addsrc.prepend(paths.styles.srcincludes))
    .pipe(sass())
    .pipe(concat('style.css'))
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
  gulp.watch(paths.styles.watch, gulp.series(styles));
  gulp.watch(paths.html.watch).on('change', browserSync.reload);
}

const lintCss = () => {
  return gulp.src(paths.styles.lint)
    .pipe(scsslint({
      'config': 'assets/src/scss/lint.yml'
    }));
};


const gulpBuild = gulp.series(stylesProduction,  scriptsProduction);
const gulpWatch = gulp.series(styles, scripts, watchFiles );

gulp.task('default', gulpBuild, lintCss);
gulp.task('watch', gulpWatch);
gulp.task('build', gulpBuild, lintCss);
