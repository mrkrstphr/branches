'use strict';

var config = require('../config');
var gulp = require('gulp');

gulp.task('dev', ['server', 'browser-sync'], function() {
  gulp.watch(config.watch.paths, ['reload']);
});
