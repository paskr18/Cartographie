<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
     <?php include("signin.php"); ?>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
       <label for "user"> Utilisateur </label> <br>
       <input type="text" id="user" name="user" placeholder="Utilisateur" value="<?php echo $user; ?>"> <span class="errors"><?php echo $userERR; ?> </span> <br>
       <label for "password"> Mot de passe </label> <br>
       <input type="password" id="password" name="password" value="<?php echo $password; ?>"> <span class="errors"><?php echo $passwordERR; ?> </span> <br>
       <input type="submit" value="Soumettre">
     </form>
     <p> <a href="retrievePassword.php"> Mot de passe oublié </a></p>
  </body>
</html>