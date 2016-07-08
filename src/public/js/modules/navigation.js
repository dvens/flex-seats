var Pageloader = require('../helpers/pageLoader');

function Navigation(element) {

	var _this = this;
    var _element = element;
    var _navToggle = _element.querySelector('.header__navigation-toggle');
    var _navContainer = _element.querySelector('.header__navigation');
    var _navLinks = _element.querySelectorAll('[ajax-link]');
    var _legend = document.querySelector('.legend');
    var _legendToggle = document.querySelector('.legend__button');
    var _pageLoader = new Pageloader();

    function init() {

    	initEvents();

        // Do not initialize page loader if promises are not supported.
        if(typeof Promise !== 'undefined'){
            
            _pageLoader.init('[ajax-container]');
            _pageLoader.addLinks(_navLinks);

        }

    }

    function initEvents (){

        _navToggle.addEventListener('click', function(e) {

            toggleNav();
            e.preventDefault();

        });

        if( _legend ) {

            _legendToggle.addEventListener('click', function(e) {

                this.classList.toggle('is--active');
                _legend.classList.toggle('is--active');
                e.preventDefault();
            });

        }

    }


    function toggleNav() {

        _navContainer.classList.toggle('is--active');

    }

    init();

}

module.exports = Navigation;