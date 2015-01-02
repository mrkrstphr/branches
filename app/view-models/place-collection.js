var _ = require('lodash');
var placeViewModel = require('./place');

module.exports = function (data) {
  return {
    places: _.map(data, function (place) {
      place.id = place._id;
      delete place._id;

      return placeViewModel(place)['places'];
    })
  };
};
