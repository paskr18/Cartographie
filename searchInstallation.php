<?php
  $installation=$ville="";
    if ((empty($_POST["installation"])) && (empty($_POST["ville"]))  && (empty($_POST["departement"])) && (empty($_POST["commune"]))) {
    echo "Entrez vos critères pour la recherche";
  } else {
    echo "<script>"; 
    echo 'var x = document.getElementById("listTable").rows.length;';
    echo 'for (let i = 1; i< x; i++) {';
    echo 'document.getElementById("listTable").deleteRow(1);';
    echo '}';
    echo "</script>";
    $installation = $_POST["installation"];
    $ville = $_POST["ville"];
    include("scripts/dbconnect.php");
    if((!empty($_POST["installation"])) && (empty($_POST["ville"]))  && (empty($_POST["departement"])) && (empty($_POST["commune"]))){
        $sql = "SELECT DISTINCT installations.instID, installations.instName , villes.townName, departments.Name, communes.Nom FROM ((( installations INNER JOIN departments ON installations.deptID = departments.deptID) INNER JOIN communes ON installations.communeID = communes.communeID) INNER JOIN villes ON installations.villeID = villes.villeID) WHERE installations.instName LIKE '" . $_POST["installation"] . "' ORDER BY departments.deptID, communes.communeID, villes.villeID, installations.instName";
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
       }
    } else if ((!empty($_POST["installation"])) && (!empty($_POST["ville"]))  && (empty($_POST["departement"])) && (empty($_POST["commune"]))){
      $sql = "SELECT DISTINCT installations.instID, installations.instName , villes.townName, departments.Name, communes.Nom FROM ((( installations INNER JOIN departments ON installations.deptID = departments.deptID) INNER JOIN communes ON installations.communeID = communes.communeID) INNER JOIN villes ON installations.villeID = villes.villeID) WHERE installations.instName LIKE '%" . $_POST["installation"] . "%' AND villes.townName LIKE '%". $_POST["ville"]."%' ORDER BY departments.deptID, communes.communeID, villes.villeID, installations.instName";
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
       }
    } else if ((!empty($_POST["installation"])) && (!empty($_POST["ville"]))  && (!empty($_POST["departement"])) && (empty($_POST["commune"]))){
      $sql = "SELECT DISTINCT installations.instID, installations.instName , villes.townName, departments.Name, communes.Nom FROM ((( installations INNER JOIN departments ON installations.deptID = departments.deptID) INNER JOIN communes ON installations.communeID = communes.communeID) INNER JOIN villes ON installations.villeID = villes.villeID) WHERE installations.instName LIKE '%" . $_POST["installation"] . "%' AND villes.townName LIKE '%". $_POST["ville"]."%' AND departments.Name = '" . $_POST["departement"] . "' ORDER BY departments.deptID, communes.communeID, villes.villeID, installations.instName";
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
       }
    } else if ((!empty($_POST["installation"])) && (!empty($_POST["ville"]))  && (!empty($_POST["departement"])) && (!empty($_POST["commune"]))){
      $sql = "SELECT DISTINCT installations.instID, installations.instName , villes.townName, departments.Name, communes.Nom FROM ((( installations INNER JOIN departments ON installations.deptID = departments.deptID) INNER JOIN communes ON installations.communeID = communes.communeID) INNER JOIN villes ON installations.villeID = villes.villeID) WHERE installations.instName LIKE '%" . $_POST["installation"] . "%' AND villes.townName LIKE '%". $_POST["ville"]."%' AND departments.Name = '" . $_POST["departement"] . "' AND communes.Nom ='" . $_POST["commune"] . "' ORDER BY departments.deptID, communes.communeID, villes.villeID, installations.instName";
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
       }
    }
    
    $conn->close();
    echo '<script>';
    echo 'var x = document.getElementById("installation");';
    echo 'x.value = "'. $installation .'";';
    echo 'var y = document.getElementById("ville");';
    echo 'y.value = "' . $ville . '";';
    //echo 'var z = document.getElementById("departement");';
    //echo 'z.value = "' . $departement . '";';
    //echo 'var w = document.getElementById("commune");';
    //echo 'w.value = "'. $_POST["commune"] .'";';
    echo '</script>';
  }
?>