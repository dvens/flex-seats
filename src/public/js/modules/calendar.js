function Calendar(element) {

	var _this = this;
    var _element = element;
    var _calendarDates = _element.querySelector('.calendar__dates ul');
    var _activeItem = _calendarDates.querySelector('.is--active');

    _this.init = function() {

    	initEvents();
    	setScrollPosition();

    }

    function initEvents (){

    	window.addEventListener('resize', function(e){
    		
    		setScrollPosition();

    	});

    }

    function setScrollPosition() {

    	_calendarDates.scrollLeft = (_activeItem.offsetWidth - _calendarDates.offsetWidth) + _activeItem.offsetLeft + (_calendarDates.offsetWidth / 2 - _activeItem.offsetWidth / 2);

    }

    _this.init();

}

module.exports = Calendar;