function moduleInit( selector, constructor ) {

	var moduleElements = document.querySelectorAll( selector );
	var moduleInstances = [];

	// Initialize a new contructor for each element found in HTML.
	for ( var i = 0; i < moduleElements.length; i++ ) {

		var element = moduleElements[ i ];
		
		if( element._isInitialized ) continue;
		
		element._isInitialized = true;

		// Create a new constructor for each element and initialize them.
		moduleInstances.push( new constructor( element ) );

	}

	return moduleInstances;

}

// Export the module init function
module.exports = moduleInit;