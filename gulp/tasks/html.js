'use strict';

module.exports = function (gulp, $, config) {

    gulp.task('html', function() {

        return gulp.src(config.html.src)
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe($.fileInclude({
                prefix: '@@',
                basepath: '@root'
            }))
            .pipe(gulp.dest(config.base));

    });

    gulp.task('minifyhtml', function() {

        config.base = config.dist;

        return gulp.src(config.base + '**/*.html')
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe($.minifyHtml({empty: true}))
            .pipe(gulp.dest(config.base));

    });

};
