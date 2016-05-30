'use strict';

module.exports = function (gulp, $, config) {

    gulp.task('annotate', function () {

        return gulp.src(config.js.src)
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe($.ngAnnotate())
            .pipe(gulp.dest(config.base + config.js.folder));

    });

};


