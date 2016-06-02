'use strict';

var browserSync     = require('browser-sync');
var modRewrite      = require('connect-modrewrite');

module.exports = function (gulp, $, config) {

    gulp.task('browser-sync', function() {

        browserSync.init({
            proxy: 'localhost:8000'
        });

    });

  };
