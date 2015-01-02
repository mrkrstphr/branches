'use strict';

var _ = require('lodash');
var Place = require('../models/place');
var placeViewModel = require('../view-models/place');
var placeCollectionViewModel = require('../view-models/place-collection');

module.exports = function (router) {
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
};
