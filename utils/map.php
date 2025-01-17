<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0;
        padding: 0;
      }

    </style>
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initialize"
  type="text/javascript"></script>
    <script>
var map;
function initialize() {
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 8,
    center: {lat: -89.6295753, lng: 21.017556}
  });
}



    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>


