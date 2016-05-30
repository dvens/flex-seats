'use strict';

var del             = require('del');

module.exports = function (gulp, $, config) {

    gulp.task('clean', function(callback) {

        del(config.base, callback);

    });

    gulp.task('clean:js', function(callback) {

        del([
            config.base + 'js/*',
            '!' + config.base + 'js/' + config.js.destFile
        ], callback);

    });

};
