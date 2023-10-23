<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
     <?php include "header.php"; ?>
     <h1> Administration </h1>
     <script>
       const myConstant = document.getElementById("administration");
       myConstant.style.backgroundColor="#FF0000";
     </script>
     <div class="divAdmin">
        <h2> Gestion des utilisateurs </h2>
        <a href="listUser.php" style="text-decoration:none;"> <div class="divAdminSub">
          <img src="images/icons/standard.png" alt="">
          <p> Liste </p>
        </div> </a>
       <a href="addUser.php" style="text-decoration:none;"> <div class="divAdminSub">
          <img src="images/icons/standard.png" alt="">
          <p> Ajout </p>
        </div> </a>
     </div>
  </body>
</html>