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
        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$_POST["email"])) {
          $emailERR= "Le format de l'adresse email est incorrect.";
        } else {
          $email=testInput($_POST["email"]);
        }
     }
   }
?>