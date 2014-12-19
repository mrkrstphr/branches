'use strict';

// stolen/adapted from: https://github.com/jakemmarsh/angularjs-gulp-browserify-boilerplate

var config = require('../config');
var http = require('http');
var express = require('express');
var gulp = require('gulp');
var gutil = require('gulp-util');
var morgan = require('morgan');

gulp.task('server', ['build'], function() {
  var server = express();

  server.use(morgan('dev'));
  server.use(express.static(config.dist.root));

  server.all('/*', function(req, res) {
      res.sendFile('index.html', { root: config.dist.root });
  });

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
