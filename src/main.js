require('script!lodash/dist/lodash.js');
require('script!angular/angular.js');
require('script!angular-route/angular-route.js');
require('script!angular-resource/angular-resource.js');
require('script!angular-cookies/angular-cookies.js');
require('script!angular-bootstrap/ui-bootstrap.js');
require('script!angular-bootstrap/ui-bootstrap-tpls.js');

require('./app.js');

require('./components/resources/resources.js');
require('./components/resources/place-resource.js');
require('./components/resources/person-resource.js');

require('./modules/home-page/home-page.js');
require('./modules/home-page/home-page-controller.js');

require('./modules/places/places.js');
require('./modules/places/place-list-controller.js');
require('./modules/places/create-place-controller.js');
require('./modules/places/view-place-controller.js');

require('./modules/people/people.js');
require('./modules/people/people-list-controller.js');
require('./modules/people/create-person-controller.js');
require('./modules/people/view-person-controller.js');
