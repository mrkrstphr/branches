
var express = require('express');
var bodyParser = require('body-parser');
var mongoose = require('mongoose');

var app = express();
var router = express.Router();


var Place = require('./models/place');

app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());

mongoose.connect('mongodb://localhost/branches');

router.route('/places')
  .get(function(req, res) {
    Place.find(function(err, places) {
      if (err)
        res.send(err);

      res.json({places: places});
    });
  });

app.use('/api', router);

var port = process.env.PORT || 8080;

app.listen(port);
console.log('Server running on http://localhost:' + port);
