<?php
  $email=$emailERR="";

  function testInput($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return($data);
   }

   if($_SERVER["REQUEST_METHOD"] == "POST"){
     if(empty($_POST["email"])) {
        $emailERR= "Ce champ doit être renseigné.";
     } else {
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          $emailERR= "Le format de l'adresse email est incorrect.";
        } else {
          $email=testInput($_POST["email"]);
        }
     }
   }
?>