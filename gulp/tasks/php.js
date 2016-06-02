'use strict';

module.exports = function (gulp, $, config) {

    gulp.task('php', function() {

        return gulp.src(config.php.src)
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe(gulp.dest(config.base));

    });

};
