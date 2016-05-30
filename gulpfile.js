'use strict';

var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var config = require('./gulp/config');
var runSequence = require('run-sequence');
var tasklist = require('readdir').readSync(config.taskPath, ['**.js']);

// Require all tasks in gulp/tasks, including subfolders
tasklist.forEach(function(taskfile) {

    require(config.taskPath + taskfile)(gulp, $, config);

});

//----------- MAIN TASKS LIST -----------//

gulp.task('build', ['clean'], function() {

	return runSequence(
		['html', 'css', 'images','fonts'],
		['misc:copy'],
		'browserify'
	);

});

gulp.task('dist', ['clean'], function() {

	config.base = config.dist;

	return runSequence(
		['html', 'css', 'images','fonts'],
		['misc:copy'],
		'browserify',
		'minifyhtml'
	);

});

gulp.task('server', ['clean'], function() {

	return runSequence(
		['html', 'css', 'images', 'fonts'],
		['misc:copy',],
		'browserify',
		'browser-sync',
		'watch'
	);

});
