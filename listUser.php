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
     <h1> Liste des utilisateurs </h1>
     <table>
     <tr><th> Utilisateur </th> <th> Prénom </th> <th> Nom </th> <th> Rôle </th> <th> Modifier </th> <th> Supprimer </th></tr>
     <?php
       include("scripts/dbconnect.php");
       $sql = "SELECT * FROM users";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
            echo "<tr>" ;
            echo '<td>' . $row["user"]. '</td>';
            echo '<td>' . $row["first_name"]. '</td>';
            echo '<td>' . $row["last_name"]. '</td>';
            echo '<td>' . $row["role"]. '</td>';
            echo '<td> <button class="edit" id="ID'. $row["ID"] .'"> Modifier </button> </td>';
            echo '<td> <button class="delete" id="ID'. $row["ID"] .'"> - </button> </td>';
            echo "</tr>" ;     
         }
       } else {
         echo "result found";
       }
       $conn->close();
     ?>
     </table>
  </body>
</html>