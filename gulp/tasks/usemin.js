'use strict';

module.exports = function (gulp, $, config) {

    gulp.task('usemin', function() {

        config.base = config.dist;

        return gulp.src(config.base + 'index.html')
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe($.usemin({
                js: [$.uglify({ mangle: false })]
            }))
            .pipe(gulp.dest(config.base));

    });

    };



