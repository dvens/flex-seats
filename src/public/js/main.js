var moduleInitializer = require('./helpers/moduleinit');

// Require modules
var Calendar = require('./modules/calendar');
var Navigation = require('./modules/navigation');

if( document.querySelector && document.addEventListener && 'classList' in document.documentElement ) {

	moduleInitializer( '.js--calendar', Calendar );
	moduleInitializer( '.js--header', Navigation );

	window.reInit = function() {

		moduleInitializer( '.js--calendar', Calendar );

	}

}






