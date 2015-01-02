
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

/*
 n  ADDR <ADDRESS_LINE>  {0:1}
 +1 CONT <ADDRESS_LINE>  {0:M}
 +1 ADR1 <ADDRESS_LINE1>  {0:1}
 +1 ADR2 <ADDRESS_LINE2>  {0:1}
 +1 CITY <ADDRESS_CITY>  {0:1}
 +1 STAE <ADDRESS_STATE>  {0:1}
 +1 POST <ADDRESS_POSTAL_CODE>  {0:1}
 +1 CTRY <ADDRESS_COUNTRY>  {0:1}
 */
