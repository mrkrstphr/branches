'use strict';

var gulp = require('gulp');
var browserSync = require('browser-sync');

gulp.task('reload', ['build'], function() {
  browserSync.reload();
});
