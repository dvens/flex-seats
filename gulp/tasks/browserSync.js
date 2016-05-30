'use strict';

var browserSync     = require('browser-sync');
var modRewrite      = require('connect-modrewrite');

module.exports = function (gulp, $, config) {

    gulp.task('browser-sync', function() {

        return browserSync({
            files: config.base + config.css.folder + '*.css', // This makes sure CSS changes are injected without reloading.
            notify: false,
            port: 8000,
            server: {
                baseDir: config.base,
                middleware: [
                    modRewrite([
                        '^[^\\.]*$ /index.html [L]'
                    ]),
                    function(request, response, next) {
                        response.setHeader('Access-Control-Allow-Origin', '*');
                        next();
                    }
                ],
                routes: {
                    '/bower_components': 'bower_components' // http://www.browsersync.io/docs/options/#option-server
                }
            }
        });

    });

  };




