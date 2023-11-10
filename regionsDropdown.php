<?php
  include("scripts/dbconnect.php");
  echo "<script>";
  echo '$(document).ready(function(){';
  echo '$("#departement").change(function(){';
  echo 'var hDepartments = ($(this).find(":selected").val());';
  echo '});';
  echo '});';
  echo "</script>";
  $conn->close();
?>