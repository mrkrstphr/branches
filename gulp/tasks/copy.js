'use strict';

var config = require('../config');
var gulp = require('gulp');

gulp.task('copy-fonts', ['clean'], function() {
  gulp.src('bower_components/fontawesome/fonts/**/*.{ttf,woff,svg,eot}')
    .pipe(gulp.dest(config.dist.root + '/fonts'));
});

gulp.task('copy-images', ['clean'], function() {
  gulp.src(config.src.root + '/images/*.{png,gif,jpg}')
    .pipe(gulp.dest(config.dist.root + '/images'));
});

gulp.task('copy-templates', ['clean'], function() {
  gulp.src([config.src.root + '/**/*.html', config.src.root + '/*.html'])
    .pipe(gulp.dest(config.dist.root));
});

gulp.task('copy', ['copy-fonts', 'copy-images', 'copy-templates']);
