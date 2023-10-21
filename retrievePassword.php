<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
     <h3> Veuillez fournir une adresse courriel pour recouvrer un mot de passe </h3>
     <?php include("password.php"); ?>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post"">
       <label> Courriel </label> <br>
       <input type="email"> <br>
       <input type="submit" value="Soumettre">
     </form>
  </body>
</html>