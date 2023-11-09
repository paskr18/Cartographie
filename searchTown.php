<?php
  echo "<script>"; 
    echo 'var x = document.getElementById("listTable").rows.length;';
    
  echo "</script>";
  if (empty($_POST["ville"])) {
   echo "Sélectionnez vos choix pour la recherche";
  } else {
     echo "<script>"; 
     echo 'var x = document.getElementById("listTable").rows.length;';
    
    echo "</script>";
    include("scripts/dbconnect.php");
       $sql = "SELECT DISTINCT villes.townName, departments.Name, communes.Nom FROM (( villes INNER JOIN departments ON villes.deptID = departments.deptID) INNER JOIN communes ON villes.communeID = communes.communeID) WHERE villes.townName='" . $_POST["ville"] . "' ORDER BY departments.deptID, communes.communeID, villes.townName";
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
       $conn->close();
  }
?>