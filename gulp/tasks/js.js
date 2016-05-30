'use strict';

module.exports = function (gulp, $, config) {

    gulp.task('js', function() {

        return gulp.src(config.js.src)
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe(gulp.dest(config.base + config.js.folder));

    });

    };
