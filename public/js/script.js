var map;
var myLatLng;
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
        // nearbySearch(myLatLng, "school");
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
    }

    //nearby search
    // function nearbySearch(myLatLng, type) {
    //     var request = {
    //         location: myLatLng,
    //         radius: '1500',
    //         types: [type]
    //     };
    //
    //     service = new google.maps.places.PlacesService(map);
    //     service.nearbySearch(request, callback);
    //
    //     function callback(results, status) {
    //
    //         console.log(results);
    //         if(status == google.maps.places.PlacesServiceStatus.OK){
    //             for(var i = 0; i < results.length; i++) {
    //                 var place = results[i];
    //                 latlng = place.geometry.location;
    //                 icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
    //                 name = place.name;
    //                 createMarker(latlng, icn, name);
    //             }
    //         }
    //     }
    // }

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
});
