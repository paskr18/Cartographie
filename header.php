<?php
  echo "<header>";
  echo "<nav>";
  echo '<div class="navbar">';
  echo '<a href="#"> Côte d&#39Ivoire <a>';
  echo '<a id="dashboard" href="dashboard.php"> Tableau de bord </a>';
  echo '<a id="combinedMaps" href="combinedMaps.php"> Cartes Combinées </a>';
  echo '<div class="dropdown">';
  echo '<button class="dropbtn"> Gestion de données &#9660</button>';
  echo '<div class="dropdown-content">';
  echo '<a href="dataManagementTown.php"> Gestion des agglomérations </a>';
  echo '<a href="dataManagementInstallation.php"> Gestion des installations </a>';
  echo '</div>';
  echo '</div>';
  echo '<div class="dropdown">';
  echo '<button class="dropbtn"> Administration &#9660</button>';
  echo '<div class="dropdown-content">';
  echo '<a href="administration.php"> Gestion des utilisateurs </a>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo "</nav>";
  echo "</header>";
?>