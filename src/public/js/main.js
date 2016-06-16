var moduleInitializer = require('./helpers/moduleinit');

// Require modules
var Calendar = require('./modules/calendar');
var Navigation = require('./modules/navigation');

moduleInitializer( '.js--calendar', Calendar );
moduleInitializer( '.js--header', Navigation );

window.reInit = function() {

	moduleInitializer( '.js--calendar', Calendar );

}




