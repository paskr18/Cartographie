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
     <h1> Liste des agglomérations </h1>
     <table>
     <tr><th> District </th> <th> Région </th> <th> Agglomération </th> <th> Modifier </th> <th> Supprimer </th></tr>
     <?php
       include("scripts/dbconnect.php");
       $sql = "SELECT DISTINCT villes.townName, departments.Name, communes.Nom FROM (( villes INNER JOIN departments ON villes.deptID = departments.deptID) INNER JOIN communes ON villes.communeID = communes.communeID)";
        $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
            echo "<tr>" ;
            echo '<td>' . $row["Name"]. '</td>';
            echo '<td>' . $row["Nom"]. '</td>';
            echo '<td>' . $row["townName"]. '</td>';
            echo "</tr>" ;     
         }
       } else {
         echo "result found";
       }
     ?>
     </table>
  </body>
</html>