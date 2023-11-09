<?php
       include "scripts/dbconnect.php";
       $sql = "SELECT * FROM villes";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
                echo '<script>';
                while ($row = $result->fetch_assoc()){
                  echo 'L.marker(['. floatval($row["latitude"]) . ','. floatval($row["longitude"]) . ']).addTo(layerTowns).bindPopup("'.$row["townName"].'");';
                }
                echo '</script>';
              } else {
                echo "result found";
              }
       $conn->close();
     ?> 