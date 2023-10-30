<?php
              $conn = new mysqli("localhost","root","","cartographie");
              if ($conn->connect_error) {
                echo "Connection failed: ". $conn->connect_error ;
              } 
              $sql = "SELECT Name FROM departments";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                  echo '<option value="'. $row["Name"] .'">'. $row["Name"] .'</option>';
                }
              } else {
                echo "result found";
              }
              $conn->close();
?>