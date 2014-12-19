'use strict';

var concat = require('gulp-concat');

var src = {
  'root': 'src'
};

var dest = {
  'root': 'dist'
};

module.exports = {
  'serverport': 3000,

  'src': src,

  'dist': dest,

  'sass': {
      includePaths: [
        'bower_components/bootstrap-sass-official/assets/stylesheets/',
        'bower_components/fontawesome/scss/'
      ]
  },

  'watch': {
    'paths': ['js', 'scss', 'html'].reduce(function(paths, ext) {
      return paths.concat([src.root + '/**/*.' + ext, src.root + '/*.' + ext]);
    }, [])
  },

  'webpack': {
    entry: __dirname + '/../src/main.js',
    output: {
      path: __dirname + '/../dist',
      filename: 'main.js'
    },
    resolve: {
      modulesDirectories: ['bower_components']
    }
  }
};
