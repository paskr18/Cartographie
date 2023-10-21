<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
     <?php include("insertTown.php"); ?>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post"">
       <label> Département </label> <br>
       <input type="text"> <br>
       <label> Commune </label> <br>
       <input type="text"> <br>
       <label> Latitude </label> <br>
       <input type="text"> <br>
       <label> Longitude </label> <br>
       <input type="text"> <br>
       <input type="submit" value="Soumettre">
     </form>
  </body>
</html>