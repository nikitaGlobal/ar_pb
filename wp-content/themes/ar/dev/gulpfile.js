const { series, src, dest, watch, gulp } = require('gulp'),
  babel = require('gulp-babel'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  rename = require('gulp-rename'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  imagemin = require('gulp-imagemin'),
  clean = require('gulp-clean-css'),
  bSync = require('browser-sync').create();


function css_comp(cb) {
  return src('sass/common.sass')
  .pipe(sass())
  .pipe(dest('../css/'))
  .pipe(bSync.stream())
  cb()
}

function css_min(cb) {
  return src('../css/common.css')
  .pipe(autoprefixer())
  .pipe(clean())
  .pipe(dest(site.src))
  .pipe(bSync.stream())
  cb()
}

function phpreload(cb) {
  return src('../**/*.php')
  .pipe(bSync.stream())
  cb()
}

// function scriptBuild(cb) {
  // return src(['src/scripts/jquery.js','src/scripts/bootstrap.min.js', 'src/scripts/slick.min.js', 'src/scripts/index.js'])
    // .pipe(babel())
    // .pipe(concat('bundle.js'))
    // .pipe(uglify())
    // .pipe(rename({ extname: '.min.js' }))
    // .pipe(dest('./output/assets/'))
    // cb()
// }

function scriptreload(cb) {
  return src('../**/*.js')
    .pipe(bSync.stream()) 
    cb()
}

function imageminF(cb) {
  return src(['../img/**/*.png', '../img/**/*.jpg', '../img/**/*.gif'])
    .pipe(imagemin())
    cb()
}

function serve(cb) {

  bSync.init({
    proxy: 'ar/',
    port: 8080
  })

  watch('../**/*.php', series('phpreload'))
  watch('../**/*.s[ac]ss', series('css_comp'))
  watch('../**/*.js', series('scriptreload'))

  cb()
}

exports.default = serve;
exports.phpreload = phpreload;
exports.css_comp = css_comp;
exports.css_min = css_min;
exports.imageminF = imageminF;
exports.scriptreload = scriptreload;
