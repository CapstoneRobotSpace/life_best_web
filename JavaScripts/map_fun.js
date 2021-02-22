let main_map;
let markers = [];
function initMap(){
    var e = document.getElementById("map");
    var opts = {
        center:{lat:37.30341882507054,lng: 126.8554620584105},
        zoom:17
    }
    main_map= new google.maps.Map(e,opts);
}

function addMarker(location) {
    const marker = new google.maps.Marker({
      position: location,
      map: main_map,
    });
    markers.push(marker);
    main_map.setCenter(location)
}

function setMapOnAll(map) {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

function clearMarkers() {
    alert("delete all markers");
    setMapOnAll(null);
}

function showMarkers() {
    setMapOnAll(main_map);
}

function deleteMarkers() {
    clearMarkers();
    markers = [];
}

function get_GPS(){
    const GPS_N = document.getElementById('GPS_N').value;
    const GPS_E = document.getElementById('GPS_E').value;
    var location = new google.maps.LatLng(GPS_N, GPS_E);
    return location;
}

function makeMarker(){
    addMarker(get_GPS());
    showMarkers();
}
