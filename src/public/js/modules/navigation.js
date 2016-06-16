var Pageloader = require('../helpers/pageLoader');

function Navigation(element) {

	var _this = this;
    var _element = element;
    var _navToggle = _element.querySelector('.header__navigation-toggle');
    var _navContainer = _element.querySelector('.header__navigation');
    var _navLinks = _element.querySelectorAll('[ajax-link]');
    var _pageLoader = new Pageloader();

    function init() {

    	initEvents();
        _pageLoader.init('[ajax-container]');

    }

    function initEvents (){

        _pageLoader.addLinks(_navLinks);

        _navToggle.addEventListener('click', function(e) {

            toggleNav();
            e.preventDefault();

        });

    }


    function toggleNav() {

        _navContainer.classList.toggle('is--active');

    }

    init();

}

module.exports = Navigation;