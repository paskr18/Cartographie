<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>

  <body>
     <?php include "header.php"; ?>
     <script>
        const myActive = document.getElementById("combinedMaps");
        myActive.style.backgroundColor="#00FF00";
     </script>
     <div class="mapInfos">
        <div id="map" style="height:550px;"></div>
        <script src="scripts/ivoryCoast.js"></script>
        <script src="scripts/mapCombined.js"></script>
        <div class="infos">
          <div id="legend"> <h4> Population </h4> </div>
          <script>
            const grades = ["0","250000","500000","750000","1000000","2000000","3000000","4000000","5000000"];
            function getColor(d) { return d>5000000?"#00441B" : d>4000000?"#006D2C" : d> 3000000?"#238B45" : d>2000000?"#41AE76" : d>1000000?"#66C2A4" : d>750000?"#99D8C9" : d>500000?"#CCECE6" : d>250000?"#E5F5F9": "#F7FCFD"; }
            for (var i = 0; i< grades.length; i++) {
             var div = document.createElement("div");
             div.class = "legend";
             div.style.backgroundColor = getColor(grades[i]);
             div.innerHTML = grades[i] + " - " + (grades[i+1] -1);
               if (i == (grades.length -1) ) {
                 div.innerHTML = "+ de " + grades[i];
               }
             document.getElementById("legend").appendChild(div);
             }
        </script>
        <br>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <label for="district"> Districts : </label>
          <select id="district" name="district">
            <option value="none" selected disabled hidden> Choisissez le district </option>
            <?php include "scripts/districtsDropdown.php";
            ?>
          </select>
          <br> <br>
          <input type="checkbox" name="town" id="town" value="Town">
          <label for="town"> Afficher les agglomérations </label> <br> <br>
          <input type="checkbox" name="health" id="health" value="health">
          <label for="town"> Afficher les installation médicales </label>
        </form> 
        <script>
          $(document).ready(function(){
                 $("#district").change(function(){
                   var hDepartments = ($(this).find(":selected").val());
                   switch (hDepartments) {
                     case "Abidjan":
                        $("#map").innerHTML = map.setView([5.316667, -4.033333], 10);
                        layerDistricts.clearLayers();
                        const abidjan = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 01;}}).addTo(layerDistricts);
                        map.fitBounds(abidjan.getBounds());
                        break;
                     case "Bas-Sassandra" :
                        $("#map").innerHTML = map.setView([5.49998, -6.666664],8);
                        layerDistricts.clearLayers();
                        const bassassandra = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 02;}}).addTo(layerDistricts);
                        map.fitBounds(bassassandra.getBounds());
                        break;
                     case "Comoé" :
                        $("#map").innerHTML = map.setView([6.7333, -3.4834],9);
                        layerDistricts.clearLayers();
                        const comoe = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 03;}}).addTo(layerDistricts);
                        map.fitBounds(comoe.getBounds());
                        break;
                     case "Denguélé" :
                        $("#map").innerHTML = map.setView([9.4999, -7.417],8);
                        layerDistricts.clearLayers();
                        const denguele = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 04;}}).addTo(layerDistricts);
                        map.fitBounds(denguele.getBounds());
                        break;
                     case "Gôh-Djiboua" :
                        $("#map").innerHTML = map.setView([6.1332, -5.9333],9);
                        layerDistricts.clearLayers();
                        const gohdjiboua = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 05;}}).addTo(layerDistricts);
                        map.fitBounds(gohdjiboua.getBounds());
                        break;
                      case "Lacs" :
                        $("#map").innerHTML = map.setView([6.6499, -4.6999],9);
                        layerDistricts.clearLayers();
                        const lacs = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 06;}}).addTo(layerDistricts);
                        map.fitBounds(lacs.getBounds());
                        break;
                      case "Lagunes" :
                        $("#map").innerHTML = map.setView([5.9333, -4.2167],8);
                        layerDistricts.clearLayers();
                        const lagunes = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 07;}}).addTo(layerDistricts);
                        map.fitBounds(lagunes.getBounds());
                        break;
                      case "Montagnes" :
                        $("#map").innerHTML = map.setView([7.3999, -7.55],8);
                        layerDistricts.clearLayers();
                        const montagnes = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 08;}}).addTo(layerDistricts);
                        map.fitBounds(montagnes.getBounds());
                        break;
                      case "Sassandra-Marahoué" :
                        $("#map").innerHTML = map.setView([6.8833, -6.45],8);
                        layerDistricts.clearLayers();
                        const sassandramarahoue = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 09;}}).addTo(layerDistricts);
                        map.fitBounds(sassandramarahoue.getBounds());
                        break;
                      case "Savanes" :
                        $("#map").innerHTML = map.setView([9.4165, -5.6166],8);
                        layerDistricts.clearLayers();
                        const savannes = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 10;}}).addTo(layerDistricts);
                        map.fitBounds(savannes.getBounds());
                        break;
                      case "Vallée du Bandama" :
                        $("#map").innerHTML = map.setView([8.1333, -5.1001],8);
                        layerDistricts.clearLayers();
                        const valleedubandama = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 11;}}).addTo(layerDistricts);
                        map.fitBounds(valleedubandama.getBounds());
                        break;
                      case "Woroba" :
                        $("#map").innerHTML = map.setView([8.4832, -6.6],8);
                        layerDistricts.clearLayers();
                        const woroba = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 12;}}).addTo(layerDistricts);
                        map.fitBounds(woroba.getBounds());
                        break;
                      case "Yamoussoukro":
                        $("#map").innerHTML = map.setView([6.8092, -5.2954],10);
                        layerDistricts.clearLayers();
                        const yamoussoukro = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 13;}}).addTo(layerDistricts);
                        map.fitBounds(yamoussoukro.getBounds());
                        break;
                      case "Zanzan" : 
                        $("#map").innerHTML = map.setView([8.6167, -3.15],8);
                        layerDistricts.clearLayers();
                        const zanzan = L.geoJSON(districts, {style:style, filter: function(feature,layer) {return feature.id == 14;}}).addTo(layerDistricts);
                        map.fitBounds(zanzan.getBounds());
                   }
                 });
               });
        </script>
        <br>
        </div>
        
  </body>
</html>