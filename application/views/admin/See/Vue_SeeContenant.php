<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Visualiser contenant</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <?php $this->load->view('admin/headeradm'); ?>
    <h1> Visualiser contenant </h1>
      <br>
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">Nom du contenant</th>
      <th scope="col">Poids sans produit</th>
      <th scope="col">Poids maximum</th>
    </tr>
  </thead>
  <tbody>
      <?php for($i=1; $i< $ID;$i++){ ?>
        <tr>
        <td><?php echo $Nom[$i][0] ?></td>
        <td><?php echo $Poids[$i][0] ?></td>
        <td><?php echo $Max[$i][0] ?></td>
        </tr>
      <?php } ?>
  </tbody>
</table>