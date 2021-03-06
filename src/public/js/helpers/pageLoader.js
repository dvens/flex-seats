var Loader = require('./htmlLoader');

function Pageloader() {

	var _this = this;
    var _isSupported = (window.history && window.history.pushState && window.Promise);
    var _body = document.body;
    var _loaderElement;
    var _html; 
    var _document;
    var _documentTitle;
    var _history;
    var _contentContainer;
    var _contentHolder;
    var _containerId;
    var _loader;
    var _links;
    var _navContainer;
    var _isTransitioning = false;
    var _firstTime = true;

    _this.init = function( containerID ) {

        // Check if window.pushstate and promises are supported 
        if(!_isSupported) return;

        _loader = new Loader();
        _contentContainer = document.querySelector( containerID );
        _containerId = containerID
        _history = window.history;
        _document = document;
        _loaderElement = document.querySelector('.loader');
        _html = document.querySelector('html');
        _documentTitle = _document.getElementsByTagName( 'title' )[ 0 ];
        _navContainer = document.querySelector('.header__navigation');
        _currentItem = document.querySelector('[ajax-link].is--active');

        window.addEventListener('popstate', load);

    }

    _this.addLinks = function( links ) {

        // Return if pushstate is not supported.
        if(!_isSupported) return;

        _links = links;

        // Add a click handler forEach element that has the attribute [ajax-link]
        for( var i = 0; i < _links.length; i++ ) {

            _links[i].addEventListener('click', function(e) {
                
                if( _isTransitioning ) return;   

                _firstTime = false; 
                
                e.preventDefault();

                if( _currentItem ) {

                    _currentItem.classList.remove('is--active');
                    this.classList.add('is--active');
                    _currentItem = this;
                    
                }
               
                _navContainer.classList.remove('is--active');
                load(e);

            });

        }

    } 
    
    function load(event) {

        if(_firstTime) return;
        
        // Get url given by the a element.
        var _url = event.target.href || window.location.href;
        var _title = _url || 'home';
        
        // Create a new div and place it under the old content container.
        _contentHolder = document.createElement('div');
        _contentHolder.classList.add('page-holder');
        _body.appendChild(_contentHolder);

        _history.pushState( {}, _title, _url );

        loadNewContent(_url);

    }

    function loadNewContent(page) {

        toggleLoader('show');

        var _div = document.createElement('div');

        // Get page data and update the new contentholder with new data
        _loader.load('GET', page).then(function(response){
            
            _div.innerHTML = response;
            _contentHolder.innerHTML = _div.querySelector(_containerId).innerHTML;

        }).then(function(){

            animateTransition();

        });

    }

    function animateTransition() {

        // Transition the main container
        _isTransitioning = true;
        _contentContainer.classList.add('is--transitioning');
        setNewCurrent();

    }

    function setNewCurrent() {

        _contentContainer.addEventListener('transitionend', setContent, false);

        // When transition is endend update the old container with the new data and remove the newcontent container
        function setContent() {

            toggleLoader('hide');
            _contentContainer.innerHTML = _contentHolder.innerHTML;
            _contentContainer.classList.remove('is--transitioning');
            window.reInit();
            _contentHolder.remove();
            _isTransitioning = false;
            _contentContainer.removeEventListener('transitionend', setContent);


        }
    }

    function toggleLoader(elementShow) {

        if(elementShow == 'show') {

            _loaderElement.classList.add('is-visible');
            _html.classList.add('cursor-wait');
            return;

        }

        if(elementShow == 'hide') {

            _loaderElement.classList.remove('is-visible');
            _html.classList.remove('cursor-wait');
            return;

        }

    }

}

module.exports = Pageloader;