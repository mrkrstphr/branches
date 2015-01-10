'use strict';

var viewModel = require('./place');

describe('PlaceViewModel', function () {
  beforeEach(function () {
  });

  it('should transform the _id to id', function () {
    var data = {_id: 14};
    var result = this.viewModel(data);

    expect(result.id).toBe(14);
  });
});
