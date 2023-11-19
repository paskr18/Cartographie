<?php
  $departement=$commune=$ville=$latitude=$longitude="";
  $departementERR=$communeERR=$villeERR=$latitudeERR=$longitudeERR="";
  
  function testInput($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return($data);
   }

   if($_SERVER["REQUEST_METHOD"] == "POST"){
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
      
      if ((!empty($_POST["departement"]))  && (!empty($_POST["commune"])) && (!empty($_POST["ville"])) && (!empty($_POST["latitude"])) && (!empty($_POST["longitude"]))) {
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
         $sql = "INSERT INTO villes(townName,deptID,communeID,latitude,longitude) VALUES ('". strval($ville) ."','". $deptID ."','". $communeID ."','". floatval($latitude) ."','". floatval($longitude) ."')";
         $result = $conn->query($sql);
         $conn->close();
         $departement=$commune=$ville=$latitude=$longitude="";
         echo '<script> alert("Agglomération créée.");  </script>';
         header("Location:listTown.php");
      }
   }
?>