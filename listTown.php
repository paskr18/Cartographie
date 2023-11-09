<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>

  <body>
     <?php include "header.php"; ?>
     <script>
        const myHeader = document.getElementById("dataManagement");
        myHeader.style.backgroundColor = "#00FF00";
     </script>
     <h1> Liste des agglomérations </h1>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
           <label for="ville"> Agglomération </label>
           <input input type="text" id="ville" name="ville">
           <label for="departement"> District </label>
             <select id="departement" name="departement">
             <option value="none" selected disabled hidden> Choisissez le district </option>
            <?php include "scripts/districtsDropdown.php" ?>;
            <option value="Tout" name="Tout"> Tout </option>
          </select>
          <label for="commune"> Région </label> 
           <select id="commune" name="commune">
             <script src="scripts/regionsDropdownSearch.js"></script>
           </select>
           <input type="submit" value="Rechercher">
     </form>
     <table id="listTable">
     <tr><th> District </th> <th> Région </th> <th> Agglomération </th> <th> Modifier </th> <th> Supprimer </th></tr>
     <?php
       include("scripts/dbconnect.php");
       $sql = "SELECT DISTINCT villes.townName, departments.Name, communes.Nom FROM (( villes INNER JOIN departments ON villes.deptID = departments.deptID) INNER JOIN communes ON villes.communeID = communes.communeID) ORDER BY departments.deptID, communes.communeID, villes.townName";
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
         echo "No result found";
       }
       $conn->close();
     ?>
     </table>
     <?php include "scripts/searchTown.php"; ?>
  </body>
</html>