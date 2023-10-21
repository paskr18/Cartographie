<?php
  $user=$password=$passwordConfirm=$email="";
  $userERR=$passwordERR=$passwordConfirmERR=$emailERR="";

  function testInput($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return($data);
   }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["user"])){
       $userERR = "Ce champ doit être renseigné.";
    } else {
      if(!preg_match("/^[a-zA-Z- ]*$/", $_POST["user"])){
        $userERR = "Seuls les lettres et les chiffres sont acceptés.";
      } else {
        $user=testInput($_POST["user"]);
      }
    }

    if(empty($_POST["password"])){
      $passwordERR = "Ce champ doit être renseigné.";
    } else {
      if(!preg_match("/^[a-zA-Z0-9- _]*$/", $_POST["password"])){
        $passwordERR = "Seuls les lettres et les chiffres sont acceptés.";
      } else {
        $password=testInput($_POST["password"]);
      }
    }
 
    if(empty($_POST["passwordConfirm"])){
      $passwordConfirmERR = "Ce champ doit être renseigné.";
    } else {
      if(!preg_match("/^[a-zA-Z0-9- _]*$/", $_POST["passwordConfirm"])){
        $passwordConfirmERR = "Seuls les lettres et les chiffres sont acceptés.";
      } else {
        if(($_POST["password"]) != ($_POST["passwordConfirm"])) {
          $passwordConfirmERR = "Les mots de passe ne sont pas identiques.";
        } else {
          $passwordConfirm=testInput($_POST["passwordConfirm"]);
        }
      }
    }

    if(empty($_POST["email"])){
      $emailERR = "Ce champ doit être renseigné.";
    } else {
      if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $emailERR = "Format incorrect.";
      } else {
        $email=testInput($_POST["email"]);
      }
    }
  }
?>