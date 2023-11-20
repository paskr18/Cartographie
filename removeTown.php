<?php
  echo '<script>';
  echo 'function removeTown(clickedID){';
  echo 'clickedID = clickedID.replace("ID","");';
  echo 'document.cookie = "ID=" + clickedID;';
  echo '}';
  echo '</script>';
  include "scripts/dbconnect.php";
  $sql = "DELETE FROM villes WHERE villeID = '" .$_COOKIE["ID"]. "'";
  $result = $conn->query($sql);
  $conn->close();
  //echo '<script> alert("Agglomération supprimée."); </script>';
?>