'use strict';

var browserSync     = require('browser-sync');

module.exports = function (gulp, $, config) {

   gulp.task('browserify', function() {
       	
       	// Single entry point to browserify 
      	return gulp.src('./src/js/main.js')
      		.pipe($.plumber({
                errorHandler: config.error
            }))
           	.pipe($.browserify({
             	insertGlobals : false
           	}))
            .pipe($.uglify())
           	.pipe(gulp.dest(config.base + config.js.folder));

   });

};