'use strict';

var config = require('../config');
var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');

gulp.task('sass', ['clean'], function() {
  return gulp.src([config.src.root + '/main.scss'])
    .pipe(sass(config.sass))
    .pipe(gulp.dest(config.dist.root + '/css'))
    .pipe(concat('main.css'))
    .pipe(gulp.dest(config.dist.root + '/css'));
});
