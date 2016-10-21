//
// Gulp assets manager.
// =============================================================
var gulp       = require('gulp-help')(require('gulp'));
var jshint     = require('gulp-jshint');
var less       = require('gulp-less');
var rename     = require("gulp-rename");
var args       = require('yargs').argv;
var sourcemaps = require('gulp-sourcemaps');
var minifyCss  = require('gulp-minify-css');
var gulpif     = require('gulp-if');
var gutil      = require('gulp-util');
var plumber    = require('gulp-plumber');
var concat     = require('gulp-concat');
var lesshint   = require('gulp-lesshint');
var chmod      = require('gulp-chmod');
var coffee     = require('gulp-plumber');

//
// Gulp Flag variables.
// =======================================================================
var isProduction  = args.env === 'prod';        // Used: compile-less and minify it.
var isSourcemaps  = args.sourcemaps === 'true'; // Used: to generate sourcemaps.

// Gulp Folder Paths
// =======================================================================
var PathResourcesLessCostum    = 'resources/less/costum/';
var PathResourcesLessBootstrap = 'resources/less/bootstrap/';
var PathResourcesJsBootstrap   = 'resources/js/bootstrap/';
var PathResourcesImg           = 'resources/img/';
var PathResourcesFonts         = 'resources/fonts/';
var PathAssetsJs               = 'assets/js/';
var PathAssetsFonts            = 'assets/fonts/';
var PathAssetsCss              = 'assets/css/';
var PathAssetsImg              = 'assets/img/';

// Gulp help descriptions.
var help = [
    "Compile all the LESS and JS resources.",
    "The default task.",
    "Compile all the JS resources.",
    "Compile all the LESS resources.",
    "Validate your LESS files.",
    "Validate your JS files.",
    "Copy all the fonts to his destination.",
    "Lint all the LESS and JS resources."
];

//
// Gulp global tasks
// =============================================================
gulp.task('default', help[1], function() {
    // There is no default task.
    // So why we don't call the,
    // Help section of this asset manager.
    gulp.start('help');
});

gulp.task('compile', help[0], function() {
    gulp.start('compile-less', 'compile-js');
});

gulp.task('lint', help[6], function() {
   gulp.start('lint-less', 'lint-js');
});

//
// Gulp specific task.
// =============================================================

// Flags:
// -----------------------------------------
// --sourcemaps: Enable sourcemaps or not.
gulp.task('compile-js', help[2], function() {
    gulp.src(PathResourcesJsBootstrap + '*.js')
        .pipe(plumber(function(error) {
            gutil.log(gutil.log(gutil.colors.red('Error (' + error.plugin + '): ' + error.message)));
            this.emit('end');
        }))
        .pipe(concat('bootstrap.js'))
        .pipe(gulpif(isSourcemaps, sourcemaps.init()))
        .pipe(gulpif(isSourcemaps, sourcemaps.write('./maps')))
        .pipe(plumber.stop())
        .pipe(gulp.dest(PathAssetsJs))

        gutil.log('Message (gulp): JavaScript resources are compiled.');

}, {
    options: {
        'sourcemaps=true' : 'Compile-js -> Enable sourcemaps',
    }
});

// Flags:
// -----------------------------------------
// --env:        The environment variable.
// --sourcemaps: Enable sourcemaps or not.
gulp.task('compile-less', help[3], function() {
    var files = [
        PathResourcesLessCostum + 'costum.less',
        PathResourcesLessBootstrap + 'bootstrap.less'
    ];

    gulp.src(files)
        .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red('Error (' + error.plugin + '): ' + error.message));
            this.emit('end');
        }))

        .pipe(chmod({
            owner:  { read: true,  write: true,   execute: false },
            group:  { read: true,  write: false,  execute: false },
            others: { read: false, write: false,  execute: false }
        }))

        .pipe(gulpif(isSourcemaps, sourcemaps.init()))
        .pipe(less())
        .pipe(gulpif(isProduction, minifyCss()))
        .pipe(gulpif(isProduction,  rename({suffix: '.min'})))
        .pipe(gulpif(isSourcemaps, sourcemaps.write('./maps')))
        .pipe(plumber.stop())
        .pipe(gulp.dest(PathAssetsCss));

        gutil.log(gutil.colors.green('Success: Bootstrap css file created.'));
        gutil.log(gutil.colors.green('Success: costum css file created.'));

}, {
    options: {
        'env=prod'        : 'Compile-less -> Minify the css files.',
        'sourcemaps=true' : 'Compile-less -> Enable sourcemaps',
    }
});

gulp.task('lint-less', help[3], function() {
    // Bootstrap LESS
    gulp.src(PathResourcesLessBootstrap + '*.less')
        .pipe(lesshint({}));

    // Costum LESS
    gulp.src(PathResourcesLessCostum + '*.less')
        .pipe(lesshint({}));
});

gulp.task('lint-js', help[4], function() {
    gulp.src(PathResourcesJsBootstrap + '*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('copy-fonts', help[7], function() {
    gulp.src(PathResourcesFonts + 'bootstrap/*')
        .pipe(gulp.dest(PathAssetsFonts));
});

gulp.task('copy-img', help[7], function() {
    gulp.src(PathResourcesImg + '*')
        .pipe(gulp.dest(PathAssetsImg));
});