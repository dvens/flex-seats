var ExampleClass = require('./modules/ExampleClass');

console.log('main is initializedsssss!');

var main = new Main();
main.init();

function Main() {

	var _this = this;
	var _ExampleClass;

	_this.init = function() {

	 	_ExampleClass = new ExampleClass();

	}

}

