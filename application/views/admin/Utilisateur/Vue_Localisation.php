<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Localisation</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
      <br>
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">Nom du produit</th>
      <th scope="col">Local</th>
      <th scope="col">Déplacement</th>
      <th scope="col">Etagère</th>
      <th scope="col">Position</th>
    </tr>
  </thead>
  <tbody>
        <tr>
        <td><?php echo $Nom[0][0] ?></td>
        <td><?php echo $Local[0][0] ?></td>
        <td><?php echo $Déplacement[0][0] ?></td>
        <td><?php echo $Etagère[0][0] ?></td>
        <td><?php echo $Position[0][0] ?></td>
        </tr>
  </tbody>
</table>