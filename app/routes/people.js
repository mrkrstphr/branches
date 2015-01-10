'use strict';

var _ = require('lodash');
var Person = require('../models/person');
var personViewModel = require('../view-models/person');
var peopleCollectionViewModel = require('../view-models/people-collection');

module.exports = function (router) {
  router.route('/people')
    .get(function (req, res) {
      Person.find(function (err, people) {
        if (err)
          res.send(err);

        res.json(peopleCollectionViewModel(people));
      });
    });

  router.route('/people/:id')
    .get(function (req, res) {
      People.findOne({_id: req.params.id}, function (err, person) {
        res.json(personViewModel(person));
      });
    });
};
