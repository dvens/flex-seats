var moduleInitializer = require('./helpers/moduleinit');

// Require modules
var Calendar = require('./modules/calendar');
var Navigation = require('./modules/navigation');
var WebFont = require('webfontloader');

WebFont.load({

	google: {
		families: ['Open Sans:700,400,300,600', 'Source Sans Pro:400,600,700,900'] 
	}

});

if( document.querySelector && document.addEventListener && 'classList' in document.documentElement ) {

	moduleInitializer( '.js--calendar', Calendar );
	moduleInitializer( '.js--header', Navigation );

	window.reInit = function() {

		moduleInitializer( '.js--calendar', Calendar );

	}

}






