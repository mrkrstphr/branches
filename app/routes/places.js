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

  router.route('/people')
    .get(function (req, res) {
      res.json({
        people: [
          {
            id: 101281,
            names: [{given: 'Kristopher', surname: 'Wilson'}],
            events: [{type: 'birth', date: '04 Oct 1983'}]
          },
          {id: 101282, names: [{given: 'Ashley', surname: 'Coleman'}]}
        ]
      })
    });

  router.route('/people/:id')
    .get(function (req, res) {
      res.json({
        people: {
          id: req.params.id,
          names: [{given: 'Tillotson', surname: 'Terrell'}],
          events: [
            {type: 'death', date: '1838-12-23'},
            {type: 'birth', date: '1785-05-01'}
          ]
        }
      })
    });
};
