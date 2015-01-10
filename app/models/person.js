
var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var Name = new Schema({
  given: String,
  surname: String
});

var Event = new Schema({
  date: Date
});

var Person = new Schema({
  name: [Name],
  events: [Event]
});

module.exports = mongoose.model('Person', Person);
