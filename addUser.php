<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
     <?php include "header.php"; ?>
     <script>
       const myConstant = document.getElementById("administration");
       myConstant.style.backgroundColor="#00FF00";
     </script>
     <h1 style="margin: 10px 25%;"> Ajout d'utilisateur </h1>
     <?php include("scripts/insertUser.php"); ?>
     <form class="userForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
       <label for="firstName"> Prénom </label> <br>
       <input type="text" id="firstName" name="firstName" value="<?php echo $firstName ; ?>"> <span class="errors"> <?php echo $firstNameERR; ?> </span> <br>
       <label for="lastName"> Nom de famille </label> <br>
       <input type="text" id="lastName" name="lastName" value="<?php echo $lastName ; ?>"> <span class="errors"> <?php echo $lastNameERR; ?> </span> <br>
       <label for="user"> Nom d'utilisateur </label> <br>
       <input type="text" id="user" name="user" value="<?php echo $user; ?>"> <span class="errors"> <?php echo $userERR; ?> </span> <br>
       <label for="password"> Mot de passe </label> <br>
       <input type="password" id="password" name="password" value="<?php echo $password; ?>"> <span class="errors"> <?php echo $passwordERR; ?> </span> <br>
       <label for="passwordConfirm"> Confirmez le mot de passe </label> <br>
       <input type="password" id="passwordConfirm" name="passwordConfirm" value="<?php echo $passwordConfirm; ?>"> <span class="errors"> <?php echo $passwordConfirmERR; ?> </span> <br>
       <label for="role"> Rôle </label>
       <select id="role" name="role"> 
         <option value="Administrateur" <?php if((isset($_POST["role"])) && ($_POST["role"] == "Administrateur")) { echo "selected";} ?>>Administrateur</option>
         <option value="Editeur" <?php if((isset($_POST["role"])) &&  ($_POST["role"] == "Editeur")) { echo "selected";} ?>>Editeur</option>
         <option value="Visualisateur" <?php if((isset($_POST["role"])) && ($_POST["role"] == "Visualisateur")) { echo "selected";} ?>>Visualisateur</option>
       </select> <br>
       <label for="email"> Courriel </label> <br>
       <input type="email" id="email" name="email" value="<?php echo $email; ?>"> <span class="errors"> <?php echo $emailERR; ?> </span> <br>
       <input type="submit" value="Soumettre">
     </form>
  </body>
</html>