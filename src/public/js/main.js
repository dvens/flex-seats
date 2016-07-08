// Require module initializer
var moduleInitializer = require('./helpers/moduleinit');

// Require modules
var Navigation = require('./modules/navigation');
var Messagebox = require('./modules/messageBox');
var CalendarItem = require('./modules/calendarItem');

// Only initialize when queryselector and andEventListener are supported
if( document.querySelector && document.addEventListener && 'classList' in document.documentElement ) {

	moduleInitializer( '.js--header', Navigation );
	moduleInitializer( '.js--message-box', Messagebox );
	moduleInitializer( '.js--calendar-item ', CalendarItem );
	
	// Reinitialize function when pages are loaded with pageloader as SPA
	window.reInit = function() {

		moduleInitializer( '.js--message-box', Messagebox );
		moduleInitializer( '.js--calendar-item ', CalendarItem );

	}

}






