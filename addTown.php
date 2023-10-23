<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
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
  </body>
</html>