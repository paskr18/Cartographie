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
     <script>
       const myConstant = document.getElementById("dashboard");
       myConstant.style.backgroundColor="#FF0000";
     </script>
     <div class="mapInfos">
        <div id="map"></div>
        <script src="ivoryCoast.js"></script>
        <script>
          var map = L.map('map').setView([7.54, -5.54],6);
      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);
          function getColor(d) { return d>5000000?"#00441B" : d>4000000?"#006D2C" : d> 3000000?"#238B45" : d>2000000?"#41AE76" : d>1000000?"#66C2A4" : d>750000?"#99D8C9" : d>500000?"#CCECE6" : d>250000?"#E5F5F9": "#F7FCFD"; }
          function style(feature) { return {fillColor:getColor(feature.properties.population),weight:2,opacity:1,color:"black",dashArray:"3",fillOpacity:0.7};}
          function highlightFeature(e) { var layer = e.target;
                                         layer.setStyle({weight:5, color:"#666", dashArray:"", fillOpacity:0.7});
                                         layer.bringToFront();}
          function resetHighlight(e) { geojson.resetStyle(e.target); }
          function zoomToFeature(e) { map.fitBounds(e.target.getBounds()); }
          function onEachFeature(feature, layer) { layer.on({mouseover: highlightFeature, mouseout: resetHighlight, click: zoomToFeature}); }
          const geojson = L.geoJson(districts,{style:style, onEachFeature: onEachFeature}).addTo(map);
        </script>
        <div class="infos">
          <h1> Infos </h1>
        </div>
     <div>
  </body>
</html>