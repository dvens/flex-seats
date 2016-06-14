var moduleInitializer = require('./helpers/moduleinit');

// Require modules
var Calendar = require('./modules/calendar');
var Pageloader = require('./modules/pageloader');

moduleInitializer( '.js--calendar', Calendar );
moduleInitializer( '.js--header', Pageloader );





