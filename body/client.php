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
    </body>
</html>
