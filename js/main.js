var map;

function initialize() {
	var mapOptions = {
		zoom: 16,
		center: new google.maps.LatLng(42.0551396, -87.6755195),
		navigationControl: false,
	    mapTypeControl: false,
	    scaleControl: false,
	    draggable: false,
	    scrollwheel: false,
	    disableDefaultUI: true
	};

	map = new google.maps.Map(document.getElementById('selection-map'), mapOptions);
}
google.maps.event.addDomListener(window, 'load', initialize);