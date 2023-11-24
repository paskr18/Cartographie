<?php
  $installation=$departement=$commune=$ville=$latitude=$longitude="";
  $installationERR=$departementERR=$communeERR=$villeERR=$latitudeERR=$longitudeERR="";
 
  function testInput($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return($data);
   }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty($_POST["installation"])){
         $installationERR = "Ce champ doit être renseigné.";
      } else {
         if(!preg_match("/^[a-zA-Z- ]*$/", $_POST["installation"])){
           $installationERR = "Ce champ ne peut recevoir que de chiffres et des lettres.";
         } else {
           $installation=testInput($_POST["installation"]);
         }
      }

      if(empty($_POST["departement"])){
         $departementERR = "Ce champ doit être renseigné.";
      } else {
         if(!preg_match("/^[a-zA-Z- ]*$/", $_POST["departement"])){
           $departementERR = "Ce champ ne peut recevoir que de chiffres et des lettres.";
         } else {
           $departement=testInput($_POST["departement"]);
         }
      }
  
      if(empty($_POST["commune"])){
         $communeERR = "Ce champ doit être renseigné.";
      } else {
         if(!preg_match("/^[a-zA-Z- ]*$/", $_POST["commune"])){
           $communeERR = "Ce champ ne peut recevoir que de chiffres et des lettres.";
         } else {
           $commune=testInput($_POST["commune"]);
         }
      }

      if(empty($_POST["ville"])){
         $villeERR = "Ce champ doit être renseigné.";
      } else {
         if(!preg_match("/^[a-zA-Z- ]*$/", $_POST["ville"])){
           $villeERR = "Ce champ ne peut recevoir que de chiffres et des lettres.";
         } else {
           $ville=testInput($_POST["ville"]);
         }
      }

      if(empty($_POST["latitude"])){
         $latitudeERR = "Ce champ doit être renseigné.";
      } else {
         if(!is_numeric($_POST["latitude"])){
           $latitudeERR = "Ce champ ne peut recevoir que de chiffres.";
         } else {
           $latitude=testInput($_POST["latitude"]);
         }
      }
   
      if(empty($_POST["longitude"])){
         $longitudeERR = "Ce champ doit être renseigné.";
      } else {
         if(!is_numeric($_POST["longitude"])){
           $longitudeERR = "Ce champ ne peut recevoir que de chiffres";
         } else {
           $longitude=testInput($_POST["longitude"]);
         }
      }

   if((!empty($_POST["installation"])) && (!empty($_POST["departement"]))  && (!empty($_POST["commune"])) && (!empty($_POST["ville"])) && (!empty($_POST["latitude"])) && (!empty($_POST["longitude"]))) {
         include("scripts/dbconnect.php"); 
         $departs = strval($_POST["departement"]);
         $sql = "SELECT deptID FROM departments WHERE Name='" . $departs . "'";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
             $deptID = $row["deptID"];
            }
         } else {
           echo "No result";
         }
         $commu = strval($_POST["commune"]);
         $sql = "SELECT communeID FROM communes WHERE Nom='" . $commu . "'";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
             $communeID = $row["communeID"];
            }
         } else {
           echo "No result";
         }
         $ville = strval($_POST["ville"]);
         $sql = "SELECT villeID FROM villes WHERE townName='" . $ville . "'";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
             $villeID = $row["villeID"];
            }
         } else {
           echo "No result";
         }
         $sql = "UPDATE installations SET instName = '". $_POST["installation"] ."',deptID = '". $deptID ."',communeID =  '". $communeID ."', villeID = '". $villeID ."',latitude = '". $_POST["latitude"] ."',longitude = '". $_POST["longitude"] ."' WHERE instID = '" . $_COOKIE["ID"] ."'";
         $result = $conn->query($sql);
         $conn->close();
         echo '<script> alert("Centre de santé modifié.");  </script>';
         header("Location:listInstallation.php");
      }
   }
?>