
var express = require('express');
var bodyParser = require('body-parser');
var mongoose = require('mongoose');

var Place = require('./models/place');

module.exports = function () {
  var app = express();
  var router = express.Router();

  app.use(bodyParser.urlencoded({extended: true}));
  app.use(bodyParser.json());

  mongoose.connect('mongodb://localhost/branches');

  router.route('/places')
    .get(function (req, res) {
      Place.find(function (err, places) {
        if (err)
          res.send(err);

        res.json({places: places, foo: 'bar'});
      });
    });

  app.use('/api', router);
  app.use(express.static('dist'));

  app.get('*', function (req, res) {
    res.sendFile('index.html', {root: 'dist'});
  });

  return app;
};
