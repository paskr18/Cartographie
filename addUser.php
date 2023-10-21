<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
     <?php include("insertUser.php"); ?>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
       <label for "user"> Nom d'utilisateur </label> <br>
       <input type="text" id="user" name="user" value="<?php echo $user; ?>"> <span class="errors"> <?php echo $userERR; ?> </span> <br>
       <label for "password"> Mot de passe </label> <br>
       <input type="password" id="password" name="password" value="<?php echo $password; ?>"> <span class="errors"> <?php echo $passwordERR; ?> </span> <br>
       <label for "confirmPassword"> Confirmez le mot de passe </label> <br>
       <input type="password" id="passwordConfirm" name="passwordConfirm" value="<?php echo $passwordConfirm; ?>"> <span class="errors"> <?php echo $passwordConfirmERR; ?> </span> <br>
       <label for "role"> Rôle </label>
       <select id="role" name="role"> 
         <option value="admin">Administrateur</option>
         <option value="editor">Editeur</option>
         <option value="visualisor" selected>Visualisateur</option>
       </select> <br>
       <label for="email"> Courriel </label> <br>
       <input type="email" id="email" name="email" value="<?php echo $email; ?>"> <span class="errors"> <?php echo $emailERR; ?> </span> <br>
       <input type="submit" value="Soumettre">
     </form>
  </body>
</html>