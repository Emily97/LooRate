var map;
var myLatLng;
var infoWindow;
var searchBox;

$(document).ready(function(){

    geoLocationInit();
    function geoLocationInit() {
        //gives current location of device
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(success,fail);
        } else{
            alert("Browser not supported");
        }
    }

    //if the devices coordinates are found
    function success(position) {
        console.log(position);
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;
        // console.log(latval,lngval);

        myLatLng = new google.maps.LatLng(latval,lngval);
        createMap(myLatLng);
        nearbySearch(myLatLng);
        console.log();
        bathroom(latval,lngval);
    }

    //if the device doesn't allow geolocation
    function fail() {
        alert("it fails");
    }

    //making map
    function createMap(myLatLng){
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            scrollwheel:true,
            zoom: 8
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });
    }

    //createMarker
    function createMarker(latlng, icn, title){
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: icn,
            title: title
        });

        var infoWindow = new google.maps.InfoWindow({
            content:title
        });

        marker.addListener('click', function(){
            infoWindow.open(map,marker);
        });
        google.maps.event.addListener(map, 'click', function() {
				infoWindow.close();
		});
        /*
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          marker.forEach(function(marker) {
            marker.setMap(null);
          });
          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            marker.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
        */
    }

    //nearby search
    function nearbySearch(myLatLng) {
        var request = {
            location: myLatLng,
            radius: "50000",
            name: 'public bathrooms'
        };

        service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);

        function callback(results, status) {

            console.log(results);
            if(status == google.maps.places.PlacesServiceStatus.OK){
                for(var i = 0; i < results.length; i++) {
                    var place = results[i];
                    latlng = place.geometry.location;
                    icn = 'https://developers.google.com/maps/documentation/javascript/images/circle.png';
                    name = place.name;
                    createMarker(latlng, icn, name);
                    console.log(results[i]);
                }
            }
        }
    }

    function bathroom(lat,lng) {
        $.post('http://localhost/loorate/public/api/user/bathrooms/', {lat:lat, lng:lng}, function(match){
            console.log(match);

            $.each(match, function(i,val){
                console.log(val.longitude);
                var glatval=val.latitude;
                var glngval=val.longitude;
                var gtitle=val.title;
                var gicn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                var GLatLng = new google.maps.LatLng(glatval, glngval);

                createMarker(GLatLng,gicn,gtitle);
            });
        });
    }

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });


});
