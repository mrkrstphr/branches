module.exports = function (data) {
  return {
    people: {
      id: data.id,
      names: data.names,
      events: data.events
    }
  };
};
