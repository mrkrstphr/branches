'use strict';

var config = require('../config');
var gulp = require('gulp');
var browserSync = require('browser-sync');

gulp.task('browser-sync', ['server'], function() {
  browserSync({
    proxy: 'localhost:' + config.serverport
  });
});
