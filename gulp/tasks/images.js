'use strict';

module.exports = function (gulp, $, config) {

    gulp.task('images', function() {

        return gulp.src(config.images.src)
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe($.newer(config.base + config.images.folder))
            .pipe($.imagemin({
                progressive: true,
                svgoPlugins: [{
                    removeTitle: true,
                    removeViewBox: false
                }]
            }))
            .pipe(gulp.dest(config.base + config.images.folder));

    });


    gulp.task('images:copy', function() {

        return gulp.src(config.images.src, { base: './' })
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe(gulp.dest(config.base));

    });

};



