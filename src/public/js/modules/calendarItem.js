var Loader = require('../helpers/htmlLoader');

function CalendarItem(element) {

    var _this = this;
    var _element = element;
    var _isSupported = (window.Promise);
    var _elementButton;
    var _form;
    var _timerIn;
    var _timerOut;
    var _timerMessage;
    var _body;

    function init() {

        if(!_isSupported) return;

        _loader = new Loader();
        _elementButton = _element.querySelector('a');
        _form = _element.querySelector('form');
        _body = document.querySelector('body');

        initEvents();

    }

    function initEvents (){

    	_elementButton.addEventListener('click', function(e) {

    		openItem();
    		e.preventDefault();

    	});

    	if(_form) {

    		// Intercept form submit
    		_form.addEventListener('submit', function(e) {

    			e.preventDefault();
    			// Make a post and set values
    			setFormData();

	    	});

    	}
   
    }

    function openItem() {

    	_element.classList.toggle('is--active');

    }

    // Create url that is being send through the 'POST'
    function createUrl(input, action) {

    	var _url = 'date=' + input;

    	if( action ) {

    		_url += '&action=' + action;

    	}

    	return _url;

    }

    function setFormData(){

    	var _div = document.createElement('div');
    	var _date = _form.querySelector('input[name="date"]').value;
    	var _formAction = _form.getAttribute('action');
    	var _formButton = _form.querySelector('button');
    	var _formButtonValue = _form.querySelector('button').value;
        var _messageBox;
        var _target; 

    	// Post the data to the orignal 'form action' to intercept and display the data
    	_loader.load('POST', _formAction, createUrl(_date, _formButtonValue) ).then(function(response){
            
            _div.innerHTML = response;
            _target = _div.querySelector('input[value="' + _date + '"]').parentElement.parentElement.parentElement;
            _messageBox = _div.querySelector('.message-box');

        }).then(function(){

      		// If the server gives an error back show the message box with the error.
            if(_messageBox) {
                
                _messageBox.classList.remove('is--active');
                loadMessageBox(_messageBox);    

            } else {

                loadNewContent(_target, _formButtonValue);    

            }
            

        });


    }

    function loadMessageBox(element) {
        
        _body.appendChild(element);
        
        _timerMessage = setTimeout(function() {

            element.classList.add('is--active');
            window.reInit();
            clearTimeout(_timerMessage);

        }, 700);

        return;

    }

    function loadNewContent(element, type) {
        
        _element.innerHTML = element.innerHTML;

        // Check button type and determine border color
        if(type === 'yes') {

            _element.classList.remove('calendar__date--office');
            _element.classList.add('calendar__date--out');

        } else {
            
            _element.classList.remove('calendar__date--out');
            _element.classList.add('calendar__date--office');

        }

        // Add success state to button
        _timerIn = setTimeout(function() {

            _element.querySelector('button').classList.add('is--completed');
            clearTimeout(_timerIn);

        }, 700);

        // Remove success state after 2 seconds
        _timerOut = setTimeout(function() {

            _element.querySelector('button').classList.remove('is--completed');
            clearTimeout(_timerOut);

        }, 2000);

        init();

    }

    init();

}

module.exports = CalendarItem;