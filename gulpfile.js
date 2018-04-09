const gulp = require('gulp');
const watch = require('gulp-watch');
const cleanCss = require('gulp-clean-css');
const concat = require('gulp-concat');
const sass = require('gulp-sass');
const imagemin = require('gulp-imagemin');
const webpackConfig = require('./webpack.config');
const webpackStream = require('webpack-stream');

gulp.task('build:css', function () {
    gulp.src('./resources/assets/scss/*.scss')
        .pipe(sass())
        .pipe(cleanCss({compatibility: 'ie8'}))
        .pipe(concat('main.min.css'))
        .pipe(gulp.dest('./public/css'));
});

gulp.task('build:fonts', function () {
    gulp.src('./resources/assets/fonts/**')
        .pipe(gulp.dest('./public/fonts'));
});

gulp.task('build:js', function () {
    gulp.src('./resources/assets/js/main.js')
        .pipe(webpackStream(webpackConfig))
        .on('error', function handleError() {
            this.emit('end'); // Recover from errors
        })
        .pipe(gulp.dest('./public/js'))
});

gulp.task('build:img', function () {
    gulp.src('./resources/assets/img/*')
        .pipe(imagemin({
            progressive: true
        }))
        .pipe(gulp.dest('./public/img'))
});

gulp.task('build', ['build:js', 'build:css', 'build:img', 'build:fonts']);

gulp.task('watch', function () {
    watch(['./resources/assets/js/*', './resources/assets/scss/*'], function () {
        gulp.run('build');
    });
});

gulp.task('default', ['build']);
