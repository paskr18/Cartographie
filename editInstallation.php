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
     <?php include "header.php"; 
           include("scripts/updateInstallation.php");?>
     <script>
        const myHeader = document.getElementById("dataManagement");
        myHeader.style.backgroundColor = "#00FF00";
     </script>
     <h1> Modification d'installation </h1>
     <div class="mapInfos">
        <div class="infos" style="width:25%;">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
           <label for="installation"> Centre de santé </label> <br>
           <input type="text" id="installation" name="installation" value="<?php echo $installation;?>"> <span class="errors"> <?php echo $installationERR; ?> </span> <br>
           <label for="departement"> District </label>
           <select id="departement" name="departement">
            <?php include "scripts/districtsDropdown.php" ?>;
          </select>
           <br>
           <label for="commune"> Région </label> 
           <select id="commune">
             <script src="scripts/regionsDropdown.js"></script>
           </select>
           <br>
           <label for="ville"> Agglomération </label> <br>
           <input type="text" id="ville" name="ville" value="<?php echo $ville; ?>"> <span class="errors"> <?php echo $villeERR; ?> </span> <br>
           <label for="latitude"> Latitude </label> <br>
           <input type="text" id="latitude" name="latitude" value="<?php echo $latitude; ?>"> <span class="errors"> <?php echo $latitudeERR; ?> </span> <br>
           <label for="longitude"> Longitude </label> <br>
           <input type="text" id="longitude" name="longitude" value="<?php echo $longitude; ?>"> <span class="errors"> <?php echo $longitudeERR; ?> </span> <br>
           <input type="submit" value="Soumettre">
          </form>
        </div>
        <div id="map" style="width:25%;"></div>
      </div>
        <script src="scripts/addMap.js"></script> 
        <?php
          include "scripts/displayTown.php"
        ?>    
        <?php
       include("scripts/dbconnect.php");
       $sql = "SELECT DISTINCT installations.instName , villes.townName, departments.Name, communes.Nom, installations.latitude, installations.longitude FROM ((( installations INNER JOIN departments ON installations.deptID = departments.deptID) INNER JOIN communes ON installations.communeID = communes.communeID) INNER JOIN villes ON installations.villeID = villes.villeID) WHERE installations.instID='". $_COOKIE["ID"] ."'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
           echo '<script>';
           echo 'document.getElementById("installation").value = "' . $row["instName"] . '";';
           echo 'document.getElementById("ville").value = "' . $row["townName"] . '";';
           echo 'document.getElementById("departement").value="' . $row["Name"] . '";';
           echo 'document.getElementById("commune").append(new Option("' . $row["Nom"] . '","' . $row["Nom"] . '"));';
           echo 'document.getElementById("latitude").value="' . $row["latitude"] . '";';
           echo 'document.getElementById("longitude").value="' . $row["longitude"] . '";';
           echo 'map.setView(['. floatval($row["latitude"]) .','. floatval($row["longitude"]) .'],9);';
           echo '</script>';
         }
       }
       $conn->close();
     ?>
  </body>
</html>