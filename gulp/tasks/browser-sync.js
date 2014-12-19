'use strict';

var config      = require('../config');
var browserSync = require('browser-sync');
var gulp        = require('gulp');

gulp.task('browser-sync', function() {
  browserSync({
    proxy: 'localhost:' + config.serverport
  });
});
