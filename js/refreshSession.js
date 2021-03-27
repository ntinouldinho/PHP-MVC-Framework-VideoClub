	
	setInterval( function(){
		var refreshAPI = 'https://fragoulakis.gr/platform/refreshSession.php';
		$.post(refreshAPI, function(data, status){
			console.log(data);
		});

	}, 900000) //every 15minutes