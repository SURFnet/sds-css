/**
 * @file
 * Load plugins.
 */

'use strict';

var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
var imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync').create();
// Allows if statement.
var gulpif = require('gulp-if');
// Uglify js.
var uglify = require('gulp-uglify-es').default;
// Allows gulp --dev to be run.
var argv = require('minimist')(process.argv.slice(2));
// Logging.
var log = require('fancy-log');
// Svg sprite.
var svgSprite = require('gulp-svg-sprite');
// Shell commands.
var exec = require('child_process').exec;
// Javascript ES6 to ES5.
var babel = require('gulp-babel');
// PostCSS plugin.
var path = require('path');
var del = require('del');
// Merge-stream is for using multiple sources in one task.
var merge = require('merge-stream');
// Convert ttf fonts to woff2
var ttf2woff2 = require('gulp-ttf2woff2');

// Check if we should build for production or not.
var isProduction = true;
if (argv.dev === true) {
  isProduction = false;
  log("Running in dev-mode, writing uncompressed files. Omit the '--dev' flag for prod-mode.");
} else {
  log("Running in prod-mode, writing compressed files. Add the '--dev' flag for dev-mode.");
}

// Error notification settings for plumber.
var plumberErrorHandler = function (err) {
  plugins.notify.onError("Error: <%= error.message %>")(err);
  this.emit('end');
};

/**
 * Task: BrowserSync Task for starting the server.
 */
function startBrowserSync(cb) {
  browserSync.init({
    proxy: "http://localhost:8000",
  });
  cb();
}

/**
 * Task: Optimize any new images.
 */
function optimizeImages() {
  return gulp.src('htdocs/sds/src/image-optimizer/**/**')
    .pipe(plugins.newer('images'))
    .pipe(imagemin([
      imagemin.gifsicle({interlaced: true}),
      imagemin.jpegtran({progressive: true}),
      imagemin.optipng({optimizationLevel: 5}),
      imagemin.svgo({
        plugins: [
          {removeViewBox: false},
        ],
      }),
    ]))
    .pipe(gulp.dest('htdocs/sds/assets/images'))
    .pipe(plugins.notify({ message: 'Image optimizer task complete' }));
}

/**
 * Task: Compile our Sass for all SDS elements.
 */
function compileSass() {
  const sassMain = gulp.src('htdocs/sds/src/sass/*.scss')
    .pipe(plugins.plumber(plumberErrorHandler))
    .pipe(plugins.sassGlob())
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass({
      includePaths: [
        'node_modules/normalize.css/'
      ]
    }))
    .pipe(plugins.autoprefixer({remove: false}))
    .pipe(plugins.mergeMediaQueries())
    .pipe(gulpif(isProduction, plugins.cleanCss()))
    .pipe(plugins.if(!isProduction, plugins.sourcemaps.write('maps')))
    .pipe(gulp.dest('htdocs/sds/assets/stylesheets/'))
    .pipe(browserSync.stream())
    .pipe(plugins.notify({ message: 'Sass task complete!' }));

  // return merge(sassMain, sassIsolated);
  return merge(sassMain);
}

/**
 * Task: Compile our Sass for the SDS demo page.
 */
function compileSassDemoPage() {
  const sassDemoPage = gulp.src('htdocs/assets/*.scss')
    .pipe(plugins.plumber(plumberErrorHandler))
    .pipe(plugins.sassGlob())
    .pipe(plugins.sass())
    .pipe(plugins.autoprefixer({remove: false}))
    .pipe(gulp.dest('htdocs/assets/stylesheets/'))
    .pipe(browserSync.stream())
    .pipe(plugins.notify({ message: 'Sass DemoPage task complete!' }));

  return merge(sassDemoPage);
}

/**
 * Task: Watch various files for changes and trigger the associated tasks.
 */
function watchFiles() {
  // Watch scss files changes.
  gulp.watch(["htdocs/sds/src/sass/*.scss", "htdocs/sds/src/sass/**/**/*.scss", "./htdocs/sds/elements/**/**/*.scss"], compileSass);
  gulp.watch(["htdocs/assets/*.scss"], compileSassDemoPage);

  // Watch image-optimizer file changes.
  gulp.watch("htdocs/sds/src/image-optimizer/**", optimizeImages);
}

/**
 * Task: Convert all ttf fonts to woff2
 */
function convertTTFFonts() {
    const nunitoConversion = gulp.src(['htdocs/sds/assets/fonts/Nunito/*.ttf'])
            .pipe(ttf2woff2())
            .pipe(gulp.dest('htdocs/sds/assets/fonts/Nunito/'))
            .pipe(plugins.notify({ message: 'Converted Nunito TTF files to WOFF2' }));
    const sourceSansProConversion = gulp.src(['htdocs/sds/assets/fonts/Source_Sans_Pro/*.ttf'])
            .pipe(ttf2woff2())
            .pipe(gulp.dest('htdocs/sds/assets/fonts/Source_Sans_Pro/'))
            .pipe(plugins.notify({ message: 'Converted Source Sans Pro TTF files to WOFF2' }));
    return merge(nunitoConversion, sourceSansProConversion);
}

/**
 * Task: Watch file changes and serve with BrowserSync.
 */
const watch = gulp.parallel(watchFiles, startBrowserSync);

/**
 * Task: Perform all tasks needed to build the assets directory. The fonts will not change, so this task is commented out
 */
const build = gulp.parallel(compileSass, compileSassDemoPage, optimizeImages); // convertTTFFonts

exports.sass = gulp.series(compileSass, compileSassDemoPage);
exports.watchfiles = watchFiles;
exports.watch = watch;
exports.build = build;
exports.default = gulp.series(build, watch);
