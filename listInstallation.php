<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>s
  </head>

  <body>
     <?php include "header.php"; ?>
     <script>
        const myHeader = document.getElementById("dataManagement");
        myHeader.style.backgroundColor = "#00FF00";
     </script>
     <h1> Liste des installations </h1>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
           <label for="installation"> Centre de santé </label>
           <input type="text" id="installation" name="installation">
           <label for="ville"> Agglomération </label>
           <input type="text" id="ville" name="ville">
           <label for="departement"> District </label>
             <select id="departement" name="departement">
               <option value="none" selected disabled hidden> Choisissez le district </option>
            <?php include "scripts/districtsDropdown.php" ?>;
          </select>
          <label for="commune"> Région </label> 
           <select id="commune" name="commune">
             <script src="scripts/regionsDropdownSearch.js"></script>
           </select>
           <input type="submit" value="Rechercher">
     </form>
     <table id="listTable">
     <tr><th> District </th> <th> Région </th> <th> Agglomération </th> <th> Installation </th> <th> Modifier </th> <th> Supprimer </th></tr>
     <?php
       include("scripts/dbconnect.php");
       $sql = "SELECT DISTINCT installations.instID, installations.instName , villes.townName, departments.Name, communes.Nom FROM ((( installations INNER JOIN departments ON installations.deptID = departments.deptID) INNER JOIN communes ON installations.communeID = communes.communeID) INNER JOIN villes ON installations.villeID = villes.villeID) ORDER BY departments.deptID, communes.communeID, villes.villeID, installations.instName";
        $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
            echo "<tr>" ;
            echo '<td>' . $row["Name"]. '</td>';
            echo '<td>' . $row["Nom"]. '</td>';
            echo '<td>' . $row["townName"]. '</td>';
            echo '<td>' . $row["instName"]. '</td>';
            echo '<td> <button class="edit" id="ID'. $row["instID"] .'" onClick="getID(this.id)"> Modifier </button> </td>';
            echo '<td> <button class="delete" id="ID'. $row["instID"] .'" onClick="removeInstallation(this.id)"> - </button> </td>';
            echo "</tr>" ;     
         }
       } else {
         echo "No result found";
       }
       $conn->close();
     ?>
     <?php include("scripts/searchInstallation.php"); ?>
     </table>
     <script>
        function getID(clickedID){
           clickedID = clickedID.replace("ID","");
           document.cookie = "ID=" + clickedID;
           window.location.href = "editInstallation.php";
        }
     </script>
     <?php include "scripts/removeInstallation.php"; ?>
  </body>
</html>