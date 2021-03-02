<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
let main_map;
var markers = new Map();
let ship_img;
let warning_img;
let sos_img;
function initMap(){
  var e = document.getElementById("map");
  var opts = {
      center:{lat:37.30341882507054,lng: 126.8554620584105},
      zoom:17
  }
	ship_img = "../../img/ship.png";
	warning_img = "../../img/warning.png"
	sos_img = "../../img/sos.png";
	main_map= new google.maps.Map(e,opts);
}

var Marker_data = function(ID,N,E,DATE,STATE){
	this.id = ID;
	this.n = Number(N);
	this.e = Number(E);
	this.date = DATE;
	this.state = STATE;
	return this;
}

function addMarker(marker_data) {
	var location = {lat:marker_data.n,lng:marker_data.e};
	var marker_scale = main_map.getZoom() > 15 ? 22 -  main_map.getZoom() : 0;
	var marker_img;
	if(marker_data.state == 0){
		marker_img = ship_img;
	}
	else if(marker_data.state == 1){
		marker_img = warning_img;
	}
	else{
		marker_img = sos_img;
	}	
	if(markers.has(marker_data.id)){
		var edit = markers.get(marker_data.id);
		if(edit.st != 2 && marker_data.state == 2){
			alert("HELP!!\n" + "GPS\n" + "N : " + marker_data.n + " E : " + marker_data.e + "\n"
				+"TIME : " + marker_data.date);
		}
		edit.st = marker_data.state;
		edit.mk.setOptions({
			  position: location,
			  map: main_map,
				icon: marker_img,
				scale: marker_scale ,
			});
		if(marker_scale > 0){
			edit.mk.setVisible(true);
		}
		else{
			edit.mk.setVisible(false);
		}
	}
	else{
		if(marker_scale > 0){
			const marker = new google.maps.Marker({
			  position: location,
			  map: main_map,
				icon: marker_img,
				scale: marker_scale ,
			});
			if(marker_data.state ==2)
				alert("HELP!!\n" + "GPS\n" + "N : " + marker_data.n + " E : " + marker_data.e + "\n"
				+"TIME : " + marker_data.date);
			markers.set(marker_data.id,{mk:marker,st:marker_data.state});
		}
	}
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
function auto_update(){
	setInterval(markerInfo,200);
}
function list_check(mk_list){
	console.log("list_check, marker num : "+ mk_list.size);
	var delete_list = new Set();
	for(var key of markers.keys()){
		if(!mk_list.has(key))
			delete_list.add(key);
	}
	delete_markers(delete_list);
}
function delete_markers(mk_list){
	console.log("delete marker num : ",mk_list.size);
	for(let item of mk_list){
		console.log("delete : " + item);
		remove = markers.get(item);
		remove.setMap(null);
		markers.delete(item);
	}
}
function remove_marker_DB(){
	$.ajax({
		type: "POST",
		url: "../Scripts/map/marker_remove.php",
		data:'',
		dataType:"json",
		success: function(data,status,xhr){
			console.log("deleted");
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
			if(data != "0" && data != "-1"){
				var datas = data.split(" - ");
				var new_list = new Set();
				for(let i=0;i<datas.length-1;i++){
					var marker_info = datas[i].split(" ");		
					addMarker(new Marker_data(marker_info[0],marker_info[1],marker_info[2],marker_info[3],marker_info[4]));
					new_list.add(marker_info[0]);
				}
				console.log("new_list : "+new_list.size);
			}
			else
				list_check(new Set());
		},
		error:function(jqXHR,textStatus,errorThrown){
			console.log(jqXHR.responseText);		
		}
	});
};
</script>
