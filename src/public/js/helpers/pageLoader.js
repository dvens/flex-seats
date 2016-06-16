function Pageloader() {

	var _this = this;
    var _element = element;
    var _document;
    var _history;
    var _contentContainer; 
    var _loader;
    var _isSupported = (window.history && window.history.pushState);
    
    _this.init = function( containerID ) {

        if(!_isSupported) return;

    }

    _this.addLinks = function( links ) {

        if(!_isSupported) return;

    } 




}

module.exports = Pageloader;