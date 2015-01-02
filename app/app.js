
var express = require('express');
var bodyParser = require('body-parser');
var mongoose = require('mongoose');
var path = require('path');
var glob = require('glob');

module.exports = function () {
  var app = express();
  var router = express.Router();

  app.use(bodyParser.urlencoded({extended: true}));
  app.use(bodyParser.json());

  mongoose.connect('mongodb://localhost/branches');

  glob('./app/routes/*.js', {sync: true}).forEach(function(modulePath) {
    require(path.resolve(modulePath))(router);
  });

  app.use('/api', router);
  app.use(express.static('dist'));

  app.get('*', function (req, res) {
    res.sendFile('index.html', {root: 'dist'});
  });

  return app;
};
