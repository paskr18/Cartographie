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
     <h1> Ajout d'agglomération </h1>
     <div class="mapInfos">
       <div class="infos" style="width:25%;">
         <?php include("scripts/insertTown.php"); ?>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
           <label for "ville"> Ville </label> <br>
           <input type="text" id="ville" name="ville" value="<?php echo $ville;?>"> <span class="errors"> <?php echo $villeERR; ?> </span> <br>
           <label for "departement"> Département </label> <br>
           <input type="text" id="departement" name="departement" value="<?php echo $departement;?>"> <span class="errors"> <?php echo $departementERR; ?> </span> <br>
           <label for "commune"> Commune </label> <br>
           <input type="text" id="commune" name="commune" value="<?php echo $commune;?>"> <span class="errors"> <?php echo $communeERR; ?> </span> <br>
           <label for "latitude"> Latitude </label> <br>
           <input type="text" id="latitude" name="latitude" value="<?php echo $latitude;?>"> <span class="errors"> <?php echo $latitudeERR; ?> </span> <span class="errors">  </span> <br>
           <label for "longitude"> Longitude </label> <br>
           <input type="text" id="longitude" name="longitude" value="<?php echo $longitude;?>">  <span class="errors"> <?php echo $longitudeERR; ?> </span> <br>
          <input type="submit" value="Soumettre">
         </form>
       </div>
       <div id="map" style="width:25%;"></div>
     </div>
     <script src="scripts/addMap.js"></script> 
  </body>
</html>