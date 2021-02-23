<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
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
    main_map.setCenter(location);
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


function getFormatDate(date){
	var year = date.getFullYear();
	var month = (1+ date.getMonth());
	month = month >= 10 ? month : '0' + month;
	var day = date.getDate();
	day = day >= 10 ? day : '0' + day;
	var hour = date.getHours();
	hour = hour >= 10 ? hour : '0' + hour;
	var minute = date.getMinutes();
	minute = minute >= 10 ? minute : '0' + minute;
	var sec = date.getSeconds();
	sec = sec >= 10 ? sec : '0' + sec;
	return year + "-" + month + "-" + day + "-" + hour+":" + minute + ":" + sec;
}

function createMarkerData(){
	const ID = document.getElementById('ID').value;
	const GPS_N = document.getElementById('GPS_N').value;
	const GPS_E = document.getElementById('GPS_E').value;
	const ST = document.getElementById('ST').value; 
	const DATE = getFormatDate(new Date());
	var sendData = {robot_id:ID, gps_n:GPS_N, gps_e:GPS_E, status:ST,date:DATE};
	return sendData;
}

function markerInsert(){
	$.ajax({
		type: "POST",
		url: "../Scripts/map/marker_insert.php",
		data:createMarkerData(),
		dataType:"json",
		success: function(data,status,xhr){
			console.log(data);
		},
		error:function(jqXHR,textStatus,errorThrown){
			console.log(jqXHR.responseText);		
		}
	});
}

function markerInfo(){
	$.ajax({
		type: "POST",
		url: "../Scripts/map/marker_info.php",
		data:'',
		dataType:"json",
		success: function(data,status,xhr){
			var datas = data.split(" - ");			
			console.log(datas[1]);
		},
		error:function(jqXHR,textStatus,errorThrown){
			console.log(jqXHR.responseText);		
		}
	});
};
</script>
