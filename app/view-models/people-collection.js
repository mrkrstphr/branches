var _ = require('lodash');
var personViewModel = require('./person');

module.exports = function (data) {
  return {
    people: _.map(data, function (person) {
      person.id = person._id;
      delete person._id;

      return personViewModel(person)['people'];
    })
  };
};
