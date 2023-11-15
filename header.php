<?php
  session_start();
  if($_SESSION["role"] == "Administrateur") {
    echo "<header>";
    echo "<nav>";
    echo '<div class="navbar">';
    echo '<a href="#"> Côte d&#39Ivoire <a>';
    echo '<a id="dashboard" href="dashboard.php"> Tableau de bord </a>';
    echo '<a id="combinedMaps" href="combinedMaps.php"> Cartes Combinées </a>';
    echo '<div class="dropdown">';
    echo '<button class="dropbtn" id="dataManagement"> Gestion de données &#9660</button>';
    echo '<div class="dropdown-content">';
    echo '<a href="addTown.php"> Ajout des agglomérations </a>';
    echo '<a href="listTown.php"> Liste des agglomérations </a>';
    echo '<a href="addInstallation.php"> Ajout des installations </a>';
    echo '<a href="listInstallation.php"> Liste des installations </a>';
    echo '</div>';
    echo '</div>';
    echo '<div class="dropdown">';
    echo '<button class="dropbtn" id="administration"> Administration &#9660</button>';
    echo '<div class="dropdown-content">';
    echo '<a href="addUser.php"> Ajout des utilisateurs </a>';
    echo '<a href="listUser.php"> Liste des utilisateurs </a>';
    echo '</div>';
    echo '</div>';
    echo '<a href="deconnexion.php" style="float: right;"> Déconnexion <a>';
    echo '</div>';
    echo "</nav>";
    echo "</header>";
  } else if ($_SESSION["role"] == "Editeur") {
    echo "<header>";
    echo "<nav>";
    echo '<div class="navbar">';
    echo '<a href="#"> Côte d&#39Ivoire <a>';
    echo '<a id="dashboard" href="dashboard.php"> Tableau de bord </a>';
    echo '<a id="combinedMaps" href="combinedMaps.php"> Cartes Combinées </a>';
    echo '<div class="dropdown">';
    echo '<button class="dropbtn" id="dataManagement"> Gestion de données &#9660</button>';
    echo '<div class="dropdown-content">';
    echo '<a href="addTown.php"> Ajout des agglomérations </a>';
    echo '<a href="listTown.php"> Liste des agglomérations </a>';
    echo '<a href="addInstallation.php"> Ajout des installations </a>';
    echo '<a href="listInstallation.php"> Liste des installations </a>';
    echo '</div>';
    echo '</div>';
    echo '<a href="deconnexion.php" style="float: right;"> Déconnexion <a>';
    echo '</div>';
    echo "</nav>";
    echo "</header>";
  } else {
    echo "<header>";
    echo "<nav>";
    echo '<div class="navbar">';
    echo '<a href="#"> Côte d&#39Ivoire <a>';
    echo '<a id="dashboard" href="dashboard.php"> Tableau de bord </a>';
    echo '<a id="combinedMaps" href="combinedMaps.php"> Cartes Combinées </a>';
    echo '<a href="deconnexion.php" style="float: right;"> Déconnexion <a>';
    echo '</div>';
    echo "</nav>";
    echo "</header>";
  }
?>