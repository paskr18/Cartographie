<?php
  echo '<script>';
  echo 'function removeUser(clickedID){';
  echo 'clickedID = clickedID.replace("ID","");';
  echo 'document.cookie = "ID=" + clickedID;';
  echo '}';
  echo '</script>';
  include "scripts/dbconnect.php";
  $sql = "DELETE FROM users WHERE ID = '" .$_COOKIE["ID"]. "'";
  $result = $conn->query($sql);
  $conn->close();
  //echo '<script> alert("Utilisateur supprimé."); </script>';
?>