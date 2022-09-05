# Inštalácia Gulp

- Stiahnite si a nainštalujte [Node.js][node-js]
- Stiahnite si tento náš **template** pre gulp.
- Po otvorení priečinku new-gulp v konzole, zadajte príkaz `npm install`, tento príkaz vám nainštaluje node-modules, ktorý sa nevkladá do git-u, pretože si ho node vygeneruje.
- Ďalej si nainštalujeme Gulp 4 pomocou node.js s príkazom `npm install gulp@next`  
- Na spustenie Gulp-u máme **2 základné príkazy**. Príkaz `gulp build` – vygeneruje skomprimovaný js a scss so všetkými prefixmi. A príkaz `gulp watch`, ktorý spraví to isté ako “gulp build“ avšak nám ešte otvorí nové okno v prehliadačí, v ktoré sa bude automaticky znova načítavať ak vykonáme nejakú zmenu v scss alebo js.
- Oficiálny návod na [Inštaláciu][quick-start].

## gulpfile.babel.js

Gulpfile.babel.js súbor, ktorý budeme editovať. Obsahuje už priamo úlohy Gulp-u. Primárne budeme editovať len časť kódu, kde sa definujú cesty k súborom v premennej **paths**. Cestu treba nastaviť od umiestnenia samotného gulpfile.bable.js.

### Upravujeme

- public/src/html/index.html 
- Blizsie info k includovaniu part .html [linka][include-html].

### Build

Po builde sa vytvorí index.html v root. Tento už bude obsahovať **head** a **footer** podľa toho či sa jedná o verziu devel alebo production.   

```js

const paths = {
  styles: {
    src: 'public/src/scss/style.scss',
    watch: 'public/src/scss/**/*.scss',
    dest: 'public/dist/css/'
  },
  scripts: {
    srcincludes:[
      'public/src/js/includes/jquery-3.3.1.min.js',
      'public/src/js/includes/popper.min.js',
      'public/src/js/includes/bootstrap.min.js',      
    ]
    src: [
        'public/src/js/app.js',
        'public/src/js/cookiebar.js',
    ],
    dest: 'public/dist/js/'
  },
  html: {
    watch: [
        'public/src/html/*.html',
    ]
  },
  include:{
    src: 'public/src/html/index.html',
    dest: '/'
  }
}

```


[node-js]: https://nodejs.org/en/
[new-gulp]: https://git.esx.sk/elite/gulp-template/tree/master/new-gulp
[quick-start]: https://gulpjs.com/docs/en/getting-started/quick-start
[include-html]: https://www.npmjs.com/package/gulp-file-include
