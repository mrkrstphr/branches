'use strict';

var config = require('../config');
var gulp = require('gulp');
var webpack = require('gulp-webpack');

gulp.task('webpack', ['clean'], function() {
  return gulp.src(config.src.root + '/main.js')
    .pipe(webpack(config.webpack))
    .pipe(gulp.dest(config.dist.root));
});
