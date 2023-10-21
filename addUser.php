<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
     <?php include("insertUser.php"); ?>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post"">
       <label> Nom d'utilisateur </label> <br>
       <input type="text"> <br>
       <label> Mot de passe </label> <br>
       <input type="password"> <br>
       <label> Confirmez le mot de passe </label> <br>
       <input type="password"> <br>
       <label> Rôle </label> <br>
       <input type="text"> <br>
       <label> Courriel </label> <br>
       <input type="email"> <br>
       <input type="submit" value="Soumettre">
     </form>
  </body>
</html>