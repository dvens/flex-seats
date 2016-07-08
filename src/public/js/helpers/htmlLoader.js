function Loader() {

	var _this = this;

	_this.load = function(method, url, data, contentType) {
		
		return new Promise(function(resolve, reject) {

			var _xhr = new XMLHttpRequest();
			_xhr.open(method, url, true);

			_xhr.onload = function() {

				if (this.status >= 200 && this.status < 300) {
			        
			   		resolve(_xhr.response);
			    
			    } else {
				    
				    var error = {
				    	status: this.status,
				    	message: _xhr.statusText
				    };

				    reject(error);	
				}

			}	

			// Use xhr send data with 'POST' method
			if(data) {

				_xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				_xhr.send(data);

			} else {

				_xhr.send();

			}
		
		});

	}

}

module.exports = Loader;