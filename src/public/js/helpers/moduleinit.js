function moduleInit( selector, constructor ) {

	var moduleElements = document.querySelectorAll( selector );
	var moduleInstances = [];

	for ( var i = 0; i < moduleElements.length; i++ ) {

		var element = moduleElements[ i ];
		
		if( element._isInitialized ) continue;
		
		element._isInitialized = true;

		moduleInstances.push( new constructor( element ) );

	}

	return moduleInstances;

}

// Export the module init function
module.exports = moduleInit;