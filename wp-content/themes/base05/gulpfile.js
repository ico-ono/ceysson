/********************************************************************************************/
//  Tache à lancer dans l'invit de commande pour passer en prod
//  cd notre dossier du theme, puis gulp
/********************************************************************************************/
// Requires
var gulp = require('gulp');

//  browser sync
var browserSync = require('browser-sync').create();

// Include plugins
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var minifycss = require('gulp-minify-css');
// var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');

/********************************************************************************************/
// Tâche CSS
// 1. compile tous les fichiers (.scss du dossier sass) vers global.min.css et global.css sass()
// 2. autoprefixer()
// 3. minifycss()
/********************************************************************************************/

// gulp.task('sass', function () {
//   return gulp.src('./sass/*.scss')
//         .pipe(sass().on('error', sass.logError))
//         .pipe(autoprefixer())
//         .pipe(minifycss())
//         .pipe(concat('./css/global.min.css'));
//
// });
gulp.task('sass', function () {
  return gulp.src('./sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(gulp.dest('./css/'))
        .pipe(rename({
           suffix: '.min'
        }))
        //.pipe(sourcemaps.init())
        .pipe(minifycss())
        //.pipe(sourcemaps.write('.', {includeContent: false}))
        .pipe(gulp.dest('./css/'))
        .pipe(browserSync.stream());
});
/********************************************************************************************/
// Tâche JS
// 1. minify all js sauf jquery qu'on charge au début
// 2. concat dans all.js
/********************************************************************************************/

gulp.task('script', function () {
  return gulp.src([
  './js/plugin/contactForm.js',
  './js/plugin/jquery.form.min.js',
  './js/plugin/masterslider.min.js',
  './js/plugin/jquery.easing.min.js',
  './js/modernizr-2.6.2.min.js',
  './js/skel.min.js',
  './js/main.js',
  './js/util.js',
  './js/imagesloaded.js',
  './js/skrollr.js',
  // './js/init.js',
  './js/smooth_scroll.js'
  ])
        .pipe(uglify())
        .pipe(concat('all.min.js'))
        .pipe(gulp.dest('./js/'))
        .pipe(browserSync.stream());
});

/********************************************************************************************/
//  Tâche "img" = Images optimisées, prises dans le dossier /img/uncompressed, mise dans /img en compressé
/********************************************************************************************/
gulp.task('img', function () {
  return gulp.src('./img/uncompressed/*.{png,jpg,jpeg,gif,svg}')
    .pipe(imagemin())
    .pipe(gulp.dest('./img'));
});


/********************************************************************************************/
// Watch
/********************************************************************************************/

gulp.task('watch', function() {

    browserSync.init({
        proxy: "http://localhost:8888/ceysson"
    });

    /* compil */
    gulp.watch(["./sass/*.scss","./sass/**/*.scss"],['sass']);
    gulp.watch("./css/*.css").on('change', browserSync.reload);

    gulp.watch("./js/**/*.js").on('change', browserSync.reload);


    gulp.watch("./modules/**/*.php").on('change', browserSync.reload);
    gulp.watch("./*.tpl").on('change', browserSync.reload);

});

gulp.task('default', ['watch']);
