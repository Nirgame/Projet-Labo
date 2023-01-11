<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modifier Carte</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
      <br>
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Numéro</th>
      <th scope="col">Code de la carte</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <form action="<?=site_url("/C_Administrator/viewModifCarte")?>" method="post" >

        <td><input type="text" id="IDCarte" name="IDCarte" size="1" value="<?php echo $idcarte ?>" required readonly="readonly"></td>
        <td><input type="text" id="Identifiant" name="Identifiant" size="10" value="<?php echo $Identifiant ?>" required></td>
        <td><input type="text" id="Numero" name="Numero" size="10" value="<?php echo $Numero?>" required></td>
        
        </tr>
  </tbody>
</table>

        <div class="but">
        <div class="mx-auto" style="width: 400px;">
              <input type="submit" id="SaveModif" value="Modifier" name="SaveModif" class="btn btn-primary"/></div></div>
        </form>

    </body>
</html>