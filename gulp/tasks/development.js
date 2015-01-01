'use strict';

var config = require('../config');
var gulp = require('gulp');

gulp.task('dev', ['lint', 'server', 'browser-sync'], function() {
  return gulp.watch(config.watch.paths, ['lint', 'reload']);
});
