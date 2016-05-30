'use strict';

module.exports = function (gulp, $, config) {

    gulp.task('misc:copy', function() {

        return gulp.src(config.misc.src, { base: './' })
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe(gulp.dest(config.base));

    });

    gulp.task('fonts', function() {

        return gulp.src(config.fonts.src)
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe(gulp.dest(config.base + config.fonts.folder));

    });

    };
