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

    if((!empty($_POST["firstName"])) && (!empty($_POST["lastName"]))  && (!empty($_POST["user"])) && (!empty($_POST["password"])) && (!empty($_POST["role"]))  && (!empty($_POST["email"])) && (($_POST["password"]) == ($_POST["passwordConfirm"])) ) {
      include("scripts/encryptDecrypt.php");
      $motdepasse = encryptData($_POST["password"]);
      include("scripts/dbconnect.php"); 
      $sql = "INSERT INTO users(first_name,last_name,user,password,email,date,role) VALUES ('". $_POST["firstName"] ."','". $_POST["lastName"] ."','".  $_POST["user"]."','". $motdepasse ."','". $_POST["email"] ."','". date("Y-m-d h:i:sa") ."','". $_POST["role"] ."')";
      $result = $conn->query($sql);
      $conn->close();
      $firstName=$lastName=$user=$password=$passwordConfirm=$email="";
      echo '<script> alert("Utilisateur créé.");</script>';
      header("Location:listUser.php");
    }
  } 
  
?>