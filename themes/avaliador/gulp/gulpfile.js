// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync');
var reload = browserSync.reload;
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var yarn = require('gulp-yarn');
var sourcemaps = require('gulp-sourcemaps');
var imagemin = require('gulp-imagemin');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

var config = {
  node: './node_modules/'
};

// browser-sync task for starting the server.
gulp.task('browser-sync', function () {
  //watch files
  var files = ['../dist/main.css', '../*.php'];

  //initialize browsersync
  browserSync.init(files, {
    //browsersync with a php server
    proxy: 'http://avaliador.tri/',
    notify: false
  });
});

// Lint Task
gulp.task('lint', function () {
  return gulp
    .src('../assets/js/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

// Yarn
gulp.task('yarn', function () {
  return gulp
    .src(['./package.json', './yarn.lock'])
    .pipe(gulp.dest('./core'))
    .pipe(
      yarn({
        production: true
      })
    );
});

// Compile Our Sass
gulp.task('sass', function () {
  return gulp
    .src([
      '../assets/scss/*.scss'
    ])
    .pipe(
      sass({
        outputStyle: 'compressed'
      })
    )
    .pipe(gulp.dest('../dist/css/'))
    .pipe(browserSync.stream());
});

// Concatenate & Minify JS
gulp.task('js', function () {
  return gulp
    .src([
      '../assets/js/*.js'
    ])
    .pipe(concat('main.js'))
    .pipe(rename('main.min.js'))
    .pipe(gulp.dest('../dist/js'))
    .pipe(browserSync.stream());
});

// Compress all images
gulp.task('images', function () {
  return gulp
    .src('../assets/img/**/*')
    .pipe(
      imagemin({
        progressive: true,
        interlaced: true,
        svgoPlugins: [{
            removeUnknownsAndDefaults: false
          },
          {
            cleanupIDs: false
          }
        ]
      })
    )
    .pipe(gulp.dest('../dist/images'))
    .pipe(browserSync.stream());
});

// Watch Files For Changes
gulp.task('watch', function () {
  //gulp.watch('../assets/js/*.js', ['lint', 'scripts']);
  gulp.watch('../assets/scss/**', ['sass']);
});

gulp.task(
  'default',
  gulp.series(function (done) {
    // task code here
    done();
  })
);

// Default Task
gulp.task(
  'default',
  gulp.series('browser-sync', 'lint', 'sass', 'images', 'watch')
);