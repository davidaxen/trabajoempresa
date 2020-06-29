<?
include('bbdd.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Ejemplo de marcar ruta</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: {lat: 40.416691, lng: -3.700345},//Para Madrid
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });


  var flightPlanCoordinates = [
    <?php

    //Query the user for start and ending location. Store locations in variables
    $sql1 = "SELECT * from almseguimiento where idronda = 1 and lon NOT BETWEEN 0 AND 0.1 and lat NOT BETWEEN 0 AND 0.1";
    $result1=mysql_query ($sql1) or die ("Invalid result sql1");
    $row=mysql_affected_rows();

    for($j=0;$j<$row;$j++){;
        $lat=mysql_result($result1,$j,'lat');
        $lon=mysql_result($result1,$j,'lon');
        echo 'new google.maps.LatLng('.$lat.', '.$lon.'),';
    }
    ?>

  ];


  var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  flightPath.setMap(map);
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfv-9iI2oJwinE0WH6Fej_EEc2ugxfbPQ&signed_in=true&callback=initMap"></script>
  </body>
</html>