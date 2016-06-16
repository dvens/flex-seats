function Loader() {

	var _this = this;

	_this.load = function(method, url, data, contentType) {

		return new Promise(function(resolve, reject) {

			var xhr = new XMLHttpRequest();
			xhr.open(method, url, true);

			xhr.onload = function() {

				if (this.status >= 200 && this.status < 300) {
			        
			   		if(data) {
			   			resolve(xhr.response);	
			   		} else {
			   			resolve(JSON.parse(xhr.response));
			   		}
			        
			    
			    } else {
				    
				    var error = {
				    	status: this.status,
				    	message: xhr.statusText
				    };

				    reject(error);	
				}

			}	

			if(data) {
				console.log(data);
				xhr.send(data);	
			} else {
				xhr.send();	
			}
			
		
		});

	}

}