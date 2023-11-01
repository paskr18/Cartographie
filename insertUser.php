<?php
  $firstName=$lastName=$user=$password=$passwordConfirm=$email="";
  $firstNameERR=$lastNameERR=$userERR=$passwordERR=$passwordConfirmERR=$emailERR="";

  function testInput($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return($data);
   }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["firstName"])){
       $firstNameERR = "Ce champ doit être renseigné.";
    } else {
      if(!preg_match("/^[a-zA-Z- ]*$/", $_POST["firstName"])){
        $firstNameERR = "Seuls les lettres et les chiffres sont acceptés.";
      } else {
        $firstName=testInput($_POST["firstName"]);
      }
    }

    if(empty($_POST["lastName"])){
       $lastNameERR = "Ce champ doit être renseigné.";
    } else {
      if(!preg_match("/^[a-zA-Z- ]*$/", $_POST["lastName"])){
        $lastNameERR = "Seuls les lettres et les chiffres sont acceptés.";
      } else {
        $lastName=testInput($_POST["lastName"]);
      }
    }

    if(empty($_POST["user"])){
       $userERR = "Ce champ doit être renseigné.";
    } else {
      if(!preg_match("/^[a-zA-Z0-9- ]*$/", $_POST["user"])){
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
      if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $_POST["email"])){
        $emailERR = "Format incorrect.";
      } else {
        $email=testInput($_POST["email"]);
      }
    }
    if((isset($_POST["firstName"])) && (isset($_POST["lastName"]))  && (isset($_POST["user"]))  && (isset($_POST["role"]))) {
      echo '<script> confirm("Valeurs insérées : '. $_POST["firstName"] .' \n ' .$_POST["lastName"].  ' \n ' . $_POST["user"] . ' \n ' . $_POST["role"] . '"); </script>';
    }
  } 
  
?>