module.exports = function (data) {
  return {
    places: {
      id: data.id,
      name: data.name,
      address: data.address,
      address2: data.address2,
      city: data.city,
      state: data.state,
      postalCode: data.postalCode
    }
  };
};
