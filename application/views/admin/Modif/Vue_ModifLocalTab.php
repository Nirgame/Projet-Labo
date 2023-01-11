<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modifier Local</title>
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
      <th scope="col">Local</th>
      <th scope="col">Indice de danger</th>
      <th scope="col">Niveau d'accès</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <form action="<?=site_url("/C_Administrator/viewModifLocal")?>" method="post" >

        <td><input type="text" id="IDLocal" name="IDLocal" size="1" value="<?php echo $idlocal ?>" required readonly="readonly"></td>
        <td><input type="text" id="Nom" name="Nom" size="10" value="<?php echo $Nom ?>" required></td>
        <td><input type="text" id="Danger" name="Danger" size="10" value="<?php echo $Danger ?>" required></td>
        <td><input type="text" id="Acces" name="Acces" size="10" value="<?php echo $Acces?>" required></td>
        
        </tr>
  </tbody>
</table>

        <div class="but">
        <div class="mx-auto" style="width: 400px;">
              <input type="submit" id="SaveModif" value="Modifier" name="SaveModif" class="btn btn-primary"/></div></div>
        </form>

    </body>
</html>