'use strict';

// stolen/adapted from: https://github.com/jakemmarsh/angularjs-gulp-browserify-boilerplate

var config = require('../config');
var http = require('http');
var app = require('../../app/app.js');
var gulp = require('gulp');
var gutil = require('gulp-util');
var morgan = require('morgan');


gulp.task('server', ['build'], function() {
  var server = app();

  server.use(morgan('dev'));

  var s = http.createServer(server);
  s.on('error', function(err){
    if(err.code === 'EADDRINUSE'){
      gutil.log('Development server is already started at port ' + config.serverport);
    }
    else {
      throw err;
    }
  });

  s.listen(config.serverport);
});
