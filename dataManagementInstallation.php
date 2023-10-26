<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
     <?php include "header.php"; ?>
     <h1> Gestion de données </h1>
     <div class="divAdmin">
        <h2> Gestion des installations </h2>
        <a href="listInstallation.php"> <div class="divAdminSub">
          <img src="images/icons/standard.png" alt="">
          <p> Liste </p>
        </div> <a>
        <a href="addInstallation.php"> <div class="divAdminSub">
          <img src="images/icons/standard.png" alt="">
          <p> Ajout </p>
        </div> <a>
     </div>
  </body>
</html>