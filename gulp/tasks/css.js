'use strict';

module.exports = function (gulp, $, config) {

    gulp.task('css', function() {

        return gulp.src(config.css.src)
            .pipe($.plumber({
                errorHandler: config.error
            }))
            .pipe($.sass())
            .pipe($.autoprefixer({
                browsers: ['last 2 versions'],
                cascade: false
            }))
            .pipe($.rev())
            .pipe($.minifyCss({
                advanced: false,
                aggressiveMerging: false,
                keepSpecialComments: 0
            }))
            .pipe($.rename(config.css.destFile))
            .pipe($.size({
                title: config.css.destFile
            }))
            .pipe(gulp.dest(config.base + config.css.folder));

    });

};


