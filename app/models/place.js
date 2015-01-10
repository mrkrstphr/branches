
var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var PlaceSchema = new Schema({
  name: String,
  address: String,
  address2: String,
  city: String,
  state: String,
  postalCode: String,
  country: String
});

module.exports = mongoose.model('Place', PlaceSchema);
