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
        const myHeader = document.getElementById("dataManagement");
        myHeader.style.backgroundColor = "#00FF00";
     </script>
     <h1> Liste des installations </h1>
     <table>
     <tr><th> District </th> <th> Région </th> <th> Agglomération </th> <th> Installation </th> <th> Modifier </th> <th> Supprimer </th></tr>
     </table>
  </body>
</html>