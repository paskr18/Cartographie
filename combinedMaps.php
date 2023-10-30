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
            <?php
              $conn = new mysqli("localhost","root","","cartographie");
              if ($conn->connect_error) {
                echo "Connection failed: ". $conn->connect_error ;
              } 
              $sql = "SELECT Name FROM departments";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                  echo '<option value="'. strtolower($row["Name"]) .'">'. $row["Name"] .'</option>';
                }
              } else {
                echo "result found";
              }
              $conn->close();
            ?>
          </select>
          <br> <br>
          <input type="checkbox" name="town" id="town" value="Town">
          <label for="town"> Afficher les agglomérations </label> <br> <br>
          <input type="checkbox" name="health" id="health" value="health">
          <label for="town"> Afficher les installation médicales </label>
        </form>
        <br>
        </div>
  </body>
</html>