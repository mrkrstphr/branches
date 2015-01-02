module.exports = function(config) {
  config.set({
    basePath: '',
    frameworks: ['jasmine'],
    files: [
      'bower_components/angular/angular.js',
      'bower_components/angular-*/angular-*.js',
      'bower_components/angular-bootstrap/ui-bootstrap.js',
      'bower_components/angular-bootstrap/ui-bootstrap-tpls.js',
      'src/app.js',
      'src/components/resources/resources.js',
      'src/components/resources/*-resource.js',
      'src/modules/home-page/home-page.js',
      'src/modules/places/places.js',
      'src/modules/**/*-controller.js',
      'src/modules/**/*-test.js'
    ],
    autoWatch: true,
    browsers: ['PhantomJS'],
    plugins: [
      'karma-phantomjs-launcher',
      'karma-jasmine'
    ]
  });
};
