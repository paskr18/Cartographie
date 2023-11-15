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
     if((!empty($_POST["user"]))  &&  (!empty($_POST["password"]))) {
       include "dbconnect.php";
       include "encryptDecrypt.php";
       $sql = "SELECT * FROM users WHERE user = '" . $_POST["user"] . "'";
       $result=$conn->query($sql);
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
           $_SESSION["role"] = $row["role"] ;
           $_SESSION["password"] = decryptData($row["password"]) ;
           $_SESSION["fname"] = $row["first_name"] ;
           $_SESSION["lname"] = $row["last_name"] ;
           $_SESSION["login_time_stamp"] = time() ;
         }
       }
       $conn->close();
       if ($_SESSION["password"] == $_POST["password"]) {
          header("Location:dashboard.php");
       } else {
         $userERR=$passwordERR="Utilisateur ou mot de passe incorrects.";
         $user=$password="";
      }
     }
   }
?>