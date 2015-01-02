var _ = require('lodash');

module.exports = function (data) {
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
