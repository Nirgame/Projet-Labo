<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Stock</title>
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
      <th scope="col">Employé</th>
      <th scope="col">Heure entrée</th>
      <th scope="col">Heure sortie</th>
      <th scope="col">Local</th>
    </tr>
  </thead>
  <tbody>
      <?php for($i=0; $i< $ID;$i++){ ?>
        <tr>
        <th scope="row"><?php echo $i+1 ?></th>
        <td><?php echo $Nom[$i][0] ?> <?php echo $Prenom[$i][0] ?></td>
        <td><?php echo $Heure_E[$i][0] ?></td>
        <td><?php echo $Heure_S[$i][0] ?></td>
        <td><?php echo $Local[$i][0] ?></td>
        </tr>
      <?php } ?>
  </tbody>
</table>