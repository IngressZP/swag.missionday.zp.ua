const gulp = require('gulp');
const watch = require('gulp-watch');
const uglify = require('gulp-uglify');
const cleanCss = require('gulp-clean-css');
const concat = require('gulp-concat');
const sass = require('gulp-sass');
const babel = require('gulp-babel');

gulp.task('build:css', function () {
    gulp.src('./resources/assets/scss/**/*.scss')
        .pipe(sass())
        .pipe(cleanCss({compatibility: 'ie8'}))
        .pipe(concat('main.min.css'))
        .pipe(gulp.dest('./public/css'));
});

gulp.task('build:js', function () {
    gulp.src('./resources/assets/js/**/*.js')
        .pipe(babel({
            presets: ['env']
        }))
        .pipe(uglify())
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest('./public/js'));
});

gulp.task('build', ['build:js', 'build:css']);

gulp.task('watch', function () {
    watch(['./resources/assets/js/*', './resources/assets/scss/*'], function () {
        gulp.run('build');
    });
});

gulp.task('default', ['build']);
