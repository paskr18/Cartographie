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
     <?php include "header.php"; ?>
     <div class="mapInfos">
        <div id="map"></div>
        <script src="scripts/ivoryCoast.js"></script>
        <script src="scripts/mapDashboard.js"></script>
        <div class="infos">
          <h1> Infos </h1>
          <p id="district"><b>District : </b></p>
          <p id="population"><b>Population : </b></p>
        </div>
     <div>
  </body>
</html>