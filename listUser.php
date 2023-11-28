<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
     <?php include "header.php"; ?>
     <script>
       const myConstant = document.getElementById("administration");
       myConstant.style.backgroundColor="#00FF00";
     </script>
     <h1> Liste des utilisateurs </h1>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
       <label for="user"> Utilisateur </label>
       <input type="text" id="user" name="user">
       <label for="firstname"> Prénom </label>
       <input type="text" id="firstname" name="firstname">
       <label for="lastname"> Nom </label>
       <input type="text" id="lastname" name="lastname">
       <label for="role"> Rôle </label>
       <select id="role" name="role">
         <option value="none" selected disabled hidden> Choisissez le rôle </option>
         <option value="Administrateur">Administrateur</option>
         <option value="Editeur">Editeur</option>
         <option value="Visualisateur">Visualisateur</option>
       </select>
       <input type="submit" value="Rechercher">
     </form>
     <table id="listTable">
     <tr><th> Utilisateur </th> <th> Prénom </th> <th> Nom </th> <th> Rôle </th> <th> Modifier </th> <th> Supprimer </th></tr>
     <?php
       include("scripts/dbconnect.php");
       $sql = "SELECT * FROM users ORDER BY user, first_name, last_name, role";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()){
            echo "<tr>" ;
            echo '<td>' . $row["user"]. '</td>';
            echo '<td>' . $row["first_name"]. '</td>';
            echo '<td>' . $row["last_name"]. '</td>';
            echo '<td>' . $row["role"]. '</td>';
            echo '<td> <button class="edit" id="ID'. $row["ID"] .'" onClick="getID(this.id)"> Modifier </button> </td>';
            echo '<td> <button class="delete" id="ID'. $row["ID"] .'" onClick="removeUser(this.id)"> - </button> </td>';
            echo "</tr>" ;     
         }
       } else {
         echo "result found";
       }
       $conn->close();
     ?>
     <?php include("scripts/searchUser.php"); ?>
     </table>
     <script>
        function getID(clickedID){
           clickedID = clickedID.replace("ID","");
           document.cookie = "ID=" + clickedID;
           window.location.href = "editUser.php";
        }
     </script>
     <?php include "scripts/removeUser.php"; ?>
  </body>
</html>