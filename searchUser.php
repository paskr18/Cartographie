<?php
  $user=$fname=$lname="";
  if ((empty($_POST["user"])) && (empty($_POST["firstname"]))  && (empty($_POST["lastname"])) && (empty($_POST["role"]))) {
    echo "Entrez vos critères pour la recherche";
  } else {
    echo "<script>"; 
    echo 'var x = document.getElementById("listTable").rows.length;';
    echo 'for (let i = 1; i< x; i++) {';
    echo 'document.getElementById("listTable").deleteRow(1);';
    echo '}';
    echo "</script>";
    $user = $_POST["user"];
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    include("scripts/dbconnect.php");
    if((!empty($_POST["user"])) && (empty($_POST["firstname"])) && (empty($_POST["lastname"])) && (empty($_POST["role"]))) {
      $sql = "SELECT * FROM users WHERE user LIKE '%". $_POST["user"] ."%'";
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
      }
    } else if((!empty($_POST["user"])) && (!empty($_POST["firstname"])) && (empty($_POST["lastname"])) && (empty($_POST["role"]))) {
       $sql = "SELECT * FROM users WHERE user LIKE '%". $_POST["user"] ."%' AND first_name LIKE '%". $_POST["firstname"] ."%'";
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
       }
    } else if((!empty($_POST["user"])) && (!empty($_POST["firstname"])) && (!empty($_POST["lastname"])) && (empty($_POST["role"]))) {
       $sql = "SELECT * FROM users WHERE user LIKE '%". $_POST["user"] ."%' AND first_name LIKE '%". $_POST["firstname"] ."%' AND last_name = '". $_POST["lastname"] ."'";
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
       }
    }
    $conn->close();
    echo '<script>';
    echo 'var x = document.getElementById("user");';
    echo 'x.value = "'. $user .'";';
    echo 'var y = document.getElementById("firstname");';
    echo 'y.value = "' . $fname . '";';
    echo 'var z = document.getElementById("lastname");';
    echo 'z.value = "' . $lname . '";';
    //echo 'var w = document.getElementById("role");';
    //echo 'w.value = "'. $_POST["role"] .'";';
    echo '</script>';
  }
?>