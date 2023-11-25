<?php
  echo '<script>';
  echo 'function removeInstallation(clickedID){';
  echo 'clickedID = clickedID.replace("ID","");';
  echo 'document.cookie = "ID=" + clickedID;';
  echo '}';
  echo '</script>';
  include "scripts/dbconnect.php";
  $sql = "DELETE FROM installations WHERE instID = '" .$_COOKIE["ID"]. "'";
  $result = $conn->query($sql);
  $conn->close();
  //echo '<script> alert("Installation supprimée."); </script>';
?>