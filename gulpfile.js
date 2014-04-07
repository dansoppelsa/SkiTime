var     gulp = require('gulp'),
        gutil = require('gulp-util'),
        notify = require('gulp-notify'),
        less = require('gulp-less'),
        autoprefix = require('gulp-autoprefixer'),
        minifyCss = require('gulp-minify-css'),
        concat = require('gulp-concat'),
        uglify = require('gulp-uglify'),
        EXPRESS_PORT = 4000,
        EXPRESS_ROOT = __dirname,
        LIVERELOAD_PORT = 35729;


gulp.task( 'default' ,  [ 'less', 'concat-css', 'watch' ] );


// Compile LESS
gulp.task( 'less' , function()
{
    return gulp.src('public/css/less/*.less')
        .pipe(less().on('error' , gutil.log))
        .pipe(autoprefix('last 10 version'))
        .pipe(gulp.dest('public/css/less/compiled'))
        .pipe(notify('LESS Compiled'));
});


// Concatenate and minify all core CSS files
gulp.task('concat-css' , function()
{
    gulp.src([  'public/css/css/bootstrap.min.css' ,
                'public/css/css/bootswatch.min.css' ,
                'public/css/dark-hive/jquery-ui-1.10.4.custom.css' ,
                'public/less/compiled/style.css' ])
        .pipe(concat('style.min.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('public/css'))
        .pipe(notify('CSS concatenated and minified'));
});


// Concatenate and uglify
gulp.task('concat-js' , function()
{
    gulp.src([  'public/js/lib/jquery-1.11.0.min.js',
                'public/js/lib/bootstrap.min.js',
                'public/js/lib/jcypher.min.js',
                'public/js/lib/jquery-ui-1.10.4.custom.min.js',
                'public/js/lib/app.js'
        ])
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'))
        .pipe(notify('JS concatenated and Uglified'));
});




// Setup watchers for LESS and JS changes
gulp.task('watch', function()
{
    startExpress();

    startLivereload();

    gulp.watch( 'public/css/less/*.less' , [ 'less' ] );

    gulp.watch( 'public/css/css/*.css' , [ 'concat-css' ] );

    gulp.watch( 'public/css/less/compiled/*.css' , [ 'concat-css' ] );

    gulp.watch( 'public/css/style.min.css' , notifyLivereload );

    gulp.watch( 'public/js/lib/*.js' ,  [ 'concat-js' ] );

    gulp.watch( 'public/js/app.min.js' , notifyLivereload );

    gulp.watch( 'app/**/*.php' , notifyLivereload );

    gulp.watch( 'bootstrap/**/*.php' , notifyLivereload );
});





// Let's make things more readable by
// encapsulating each part's setup
// in its own method
function startExpress() {
    var express = require('express');
    var app = express();
    app.use(require('gulp-livereload'));
    app.use(express.static(EXPRESS_ROOT));
    app.listen(EXPRESS_PORT);
}


// We'll need a reference to the tinylr
// object to send notifications of file changes
// further down
var lr;
function startLivereload() {
    lr = require('tiny-lr')();
    lr.listen(LIVERELOAD_PORT);
}



// Notifies livereload of changes detected
// by `gulp.watch()`
function notifyLivereload(event) {
    gulp.src(event.path, {read: false})
        .pipe(require('gulp-livereload')(lr));
}
