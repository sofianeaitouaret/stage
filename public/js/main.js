(function (){



	var notifyUser = function (data) {


		if (! ('Notification' in window)) {
			alert('Web Notification is not supported');

			return;
		}

		Notification.requestPermission(function(permission){

			console.log('{{auth()->user()->prenom}}');
			new PNotify({
				title: 'Regular Success',
				text: 'That thing that you were trying to do worked!',
				type: 'success'
			});

		});
	};

	var loadPusher = function (){
		Pusher.log = function(message) {
			if (window.console && window.console.log) {
				window.console.log(message);
			}
		};

		var pusher = new Pusher(document.getElementById('pusher_key').content);
		var channel = pusher.subscribe('test-created');

		channel.bind('App\\Events\\TestCreated', notifyUser);
	};


	loadPusher();
})();
