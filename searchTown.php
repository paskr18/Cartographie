<?php
   $ville="";
   if ((empty($_POST["ville"])) && (empty($_POST["departement"]))  && (empty($_POST["commune"]))) {
   echo "Entrez vos critères pour la recherche";
  } else {
     echo "<script>"; 
     echo 'var x = document.getElementById("listTable").rows.length;';
     echo 'for (let i = 1; i< x; i++) {';
     echo 'document.getElementById("listTable").deleteRow(1);';
     echo '}';
     echo "</script>";
     $ville = $_POST["ville"];
     include("scripts/dbconnect.php");
     if((!empty($_POST["ville"])) && (empty($_POST["departement"])) && (empty($_POST["commune"]))){
       $sql = "SELECT DISTINCT villes.villeID, villes.townName, departments.Name, communes.Nom FROM (( villes INNER JOIN departments ON villes.deptID = departments.deptID) INNER JOIN communes ON villes.communeID = communes.communeID) WHERE villes.townName LIKE '%" . $_POST["ville"] . "%' ORDER BY departments.deptID, communes.communeID, villes.townName";
        $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
            echo "<tr>" ;
            echo '<td>' . $row["Name"]. '</td>';
            echo '<td>' . $row["Nom"]. '</td>';
            echo '<td>' . $row["townName"]. '</td>';
            echo '<td> <button class="edit" id="ID'. $row["villeID"] .'"> Modifier </button> </td>';
            echo '<td> <button class="delete" id="ID'. $row["villeID"] .'"> - </button> </td>';
            echo "</tr>" ;     
         } 
       }
    } else if ((!empty($_POST["ville"])) && (!empty($_POST["departement"])) && (!empty($_POST["commune"]))) {
       $sql = "SELECT DISTINCT villes.villeID, villes.townName, departments.Name, communes.Nom FROM (( villes INNER JOIN departments ON villes.deptID = departments.deptID) INNER JOIN communes ON villes.communeID = communes.communeID) WHERE villes.townName LIKE '%" . $_POST["ville"] . "%' AND departments.Name = '" . $_POST["departement"] . "' AND communes.Nom ='" . $_POST["commune"] . "' ORDER BY departments.deptID, communes.communeID, villes.townName";
        $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
            echo "<tr>" ;
            echo '<td>' . $row["Name"]. '</td>';
            echo '<td>' . $row["Nom"]. '</td>';
            echo '<td>' . $row["townName"]. '</td>';
            echo '<td> <button class="edit" id="ID'. $row["villeID"] .'"> Modifier </button> </td>';
            echo '<td> <button class="delete" id="ID'. $row["villeID"] .'"> - </button> </td>';
            echo "</tr>" ;     
         } 
       }
     } else if ((empty($_POST["ville"])) && (!empty($_POST["departement"])) && (!empty($_POST["commune"]))) {
       $sql = "SELECT DISTINCT villes.villeID, villes.townName, departments.Name, communes.Nom FROM (( villes INNER JOIN departments ON villes.deptID = departments.deptID) INNER JOIN communes ON villes.communeID = communes.communeID) WHERE departments.Name = '" . $_POST["departement"] . "' AND communes.Nom ='" . $_POST["commune"] . "' ORDER BY departments.deptID, communes.communeID, villes.townName";
        $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
            echo "<tr>" ;
            echo '<td>' . $row["Name"]. '</td>';
            echo '<td>' . $row["Nom"]. '</td>';
            echo '<td>' . $row["townName"]. '</td>';
            echo '<td> <button class="edit" id="ID'. $row["villeID"] .'"> Modifier </button> </td>';
            echo '<td> <button class="delete" id="ID'. $row["villeID"] .'"> - </button> </td>';
            echo "</tr>" ;     
         } 
       }
     } 
    $conn->close();
    echo '<script>';
    echo 'var x = document.getElementById("ville");';
    echo 'x.value = "'. $ville .'";';
    //echo 'var y = document.getElementById("departement");';
   // echo 'y.value = "'. $_POST["departement"] .'";';
    //echo 'var z = document.getElementById("commune");';
    //echo 'z.value = "'. $_POST["commune"] .'";';
    echo '</script>';
  }
?>