<!DOCTYPE html>
<html>
  <head>
    <title>Map</title>
    <link rel="stylesheet" href="../Css/map_style.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA47TIDmePhzcfD68uWKcs-vGy9tLMDXGI&callback=initMap&libraries=&v=weekly"async></script>
    <?php include "../Scripts/map/admin_map.php" ?>
  </head>
    <body onload="auto_update()">
        <div id="map"></div>
        <p>
            ID : <input id='ID'/> GPS N : <input id='GPS_N'/> E : <input id='GPS_E'/>  STATUS : <input id='ST'/> <button onclick="markerInsert()">make marker</button>
        </p>
        <button onclick="remove_marker_DB()">delete marker</button>
    </body>
</html>
