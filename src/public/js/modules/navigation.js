function Navigation(element) {

	var _this = this;
    var _element = element;
    var _navToggle = _element.querySelector('.header__navigation-toggle');
   var _navContainer = _element.querySelector('.header__navigation');

    function init() {

    	initEvents();

    }

    function initEvents (){

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