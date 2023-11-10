<!DOCTYPE html>

<html lang="fr-FR">
  <head>
    <link rel="stylesheet" type="text/css" href="cartographie.css">
    <meta name="author" content="Salnave Kenny Robert Philippe-Auguste">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>

  <body>
     <form method="get">
       <label for="departement" style="width:150px;"> District </label>
        <select id="departement" name="departement">
             <option value="none" selected disabled hidden> Choisissez le district </option>
            <?php include "scripts/districtsDropdown.php" ?>;
        </select> <br>
        <label for="commune" style="width:150px;"> Region </label>
        <select id="commune" name="commune">
           <?php include "scripts/regionsDropdown.php" ?>;  
        </select> <br>
        <label for="agglomeration" style="width:150px;"> Agglomération </label>
        <select id="agglomeration" name="agglomeration">
             
        </select> <br>
     </form>
  </body>
</html>