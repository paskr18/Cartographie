<?php 
  $host = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname ="cartographie"; 
  $conn = new mysqli($host,$dbuser,$dbpassword,$dbname);
  if ($conn->connect_error) {
    echo "Connection failed: ". $conn->connect_error ;
  }
?>