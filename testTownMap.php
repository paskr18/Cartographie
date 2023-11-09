<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  </head>

  <body>
     <div id="map" style="height:500px;"></div>
     <script>
       var map = L.map('map').setView([7.54, -5.54],6);
       L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);
       L.control.scale().addTo(map);
       const layerTowns = L.featureGroup();
       layerTowns.addTo(map);
     </script>
     <?php
       include "scripts/dbconnect.php";
       $sql = "SELECT * FROM villes";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
                echo '<script>';
                while ($row = $result->fetch_assoc()){
                  echo 'L.marker(['. floatval($row["latitude"]) . ','. floatval($row["longitude"]) . ']).addTo(layerTowns).bindPopup("'.$row["townName"].'");';
                }
                echo '</script>';
              } else {
                echo "result found";
              }
       $conn->close();
     ?>
  </body>
</html>