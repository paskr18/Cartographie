<?php 
  $user=$password="";
  $userERR=$passwordERR="";

  function testInput($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return($data);
   }

   if($_SERVER["REQUEST_METHOD"] == "POST"){
     if (empty($_POST["user"])) {
        $userERR="Ce champ doit être renseigné";
     } else {
       if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST["user"])){
         $userERR="Seuls les lettres et les chiffres sont permis";
       } else {
         $user=testInput($_POST["user"]);
       }
     }
     if (empty($_POST["password"])) {
        $passwordERR="Ce champ doit être renseigné";
     } else {
       if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST["password"])){
         $passwordERR="Seuls les lettres et les chiffres sont permis";
       } else {
         $password=testInput($_POST["password"]);
       }
     }
   }
?>