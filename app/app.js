
var express = require('express');
var bodyParser = require('body-parser');
var mongoose = require('mongoose');
var _ = require('lodash');

var Place = require('./models/place');

var placeCollectionViewModel = function (data) {
  return {
    places: _.map(data, function (place) {
      place.id = place._id;
      delete place._id;

      return {
        id: place._id,
        name: place.name
      };
    })
  };
};

var placeViewModel = function (data) {
  return {
    places: {
      id: data.id,
      name: data.name
    }
  };
};

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

        res.json(placeCollectionViewModel(places));
      });
    })
    .post(function (req, res) {
      var place = new Place(req.body);
      return place.save(function (err) {
        res.json(place);
      });
    });

  router.route('/places/:id')
    .get(function (req, res) {
      Place.findOne({_id: req.params.id}, function (err, place) {
        res.json(placeViewModel(place));
      });
    });

  app.use('/api', router);
  app.use(express.static('dist'));

  app.get('*', function (req, res) {
    res.sendFile('index.html', {root: 'dist'});
  });

  return app;
};
