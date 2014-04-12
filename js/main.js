var pos;
var marker = null;
var map = null;

var baseURL = "http://jasminetpowell.github.io/";

function initialize() {
	console.log("called");
	var mapOptions = {
		zoom: 16,
		center: new google.maps.LatLng(42.0551396, -87.6755195),
		/*navigationControl: false,
	    mapTypeControl: false,
	    scaleControl: false,
	    draggable: false,
	    scrollwheel: false,
	    disableDefaultUI: true
	    */
	};

  map = new google.maps.Map(document.getElementById('selection-map'), mapOptions);
  
  function findPosition(pos) {
	  var crs = pos.coords;

	  console.log('Your current position is:');
	  console.log('Latitude: ' + crs.latitude);
	  console.log('Longitude: ' + crs.longitude);

	  var myLatLng = new google.maps.LatLng(crs.latitude, crs.longitude);

	  var marker = new google.maps.Marker({
	        position: myLatLng,
	        title: 'Position',
	        map: map,
	        draggable: true,
	        visible: true,
	        animation : google.maps.Animation.DROP
	    });
	};

	function posError(err) {
	  console.warn('ERROR(' + err.code + '): ' + err.message);
	};

	navigator.geolocation.getCurrentPosition(findPosition, posError);

	 google.maps.event.addListener(map, 'click', function(event) {
	//call function to create marker
         if (marker) {
            marker.setMap(null);
            marker = null;
         }
	 marker = createMarker(event.latLng, "name", "<b>Location</b><br>"+event.latLng);
	//display button
	document.getElementById('go-button').style.display = "block";

  });

	var data2 = {
    	"name":"John",
        "lat":1.2,
        "long":2.4
    };

  	$.post(baseURL + 'php/add_user.php', {'data2': data2}).done(function(response) {
  	});


}

google.maps.event.addDomListener(window, 'load', initialize);


function createMarker(latlng, name, html) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });

    google.maps.event.trigger(marker, 'click');    
    return marker;
}


