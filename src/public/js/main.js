var moduleInitializer = require('./helpers/moduleinit');

// Require modules
var Calendar = require('./modules/calendar');
var Navigation = require('./modules/navigation');
var Messagebox = require('./modules/messageBox');

if( document.querySelector && document.addEventListener && 'classList' in document.documentElement ) {

	moduleInitializer( '.js--calendar', Calendar );
	moduleInitializer( '.js--header', Navigation );
	moduleInitializer( '.js--message-box', Messagebox );

	window.reInit = function() {

		moduleInitializer( '.js--calendar', Calendar );

	}

}






