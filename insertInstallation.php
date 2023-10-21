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
   }
?>