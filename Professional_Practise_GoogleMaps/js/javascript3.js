var map, infoWindow, service;
function initMap() {
  // we define a Javascript function that creates a map in the div
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat:53.294118, lng: -6.134221},
    zoom: 10,
    styles: [{
      stylers: [{visibility: 'simplified'}]
    }, {
      elementType: 'labels',
      stylers: [{ visibility: 'off'}]
    }]
  });
  infoWindow = new google.maps.InfoWindow;


  //Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Your Location');
      infoWindow.open(map);
      map.setCenter(pos);

      var marker = {
        lat: 53.297939,
        lng:-6.204252999999994,
        title: 'testing'
      };
      addMarker(marker);

    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    //Browser doesn't support GeoLocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeoLocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeoLocation ?
                        'Error: The Geolocation service failed.':
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}

function addMarker(position) {
  var marker = new google.maps.Marker({
    position: position,
    map: map,
    title: position.title
  });
  google.maps.event.addListener(marker, 'click', function() {
    console.log('ouch!!');
  });
}
