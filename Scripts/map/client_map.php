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
</script>
