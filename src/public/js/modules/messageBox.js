function MessageBox(element) {

    var _element = element;
    var _closeBtn = _element.querySelector('button');
    var _timer;
    var _timerRemoveElement;

    function init() {

    	// If element is active remove it after 6 seconds
    	if( _element.classList.contains('is--active') ) {

    		_timer = setTimeout(function(){

    			removeBox();
    			clearTimeout(_timer);

    		}, 6000);

    	}

    	initEvents();

    }

    function initEvents (){

    	// Add remove functionality to closeButton
    	_closeBtn.addEventListener('click', function(e) {

    		removeBox();
    		e.preventDefault();

    	});

    }

    function removeBox() {

    	_element.classList.remove('is--active');

    	// After 600ms remove the box out the dom.
    	_timerRemoveElement = setTimeout(function(){

    		_element.remove();
    		clearTimeout(_timerRemoveElement);

    	}, 600);

    }

    init();

}

module.exports = MessageBox;