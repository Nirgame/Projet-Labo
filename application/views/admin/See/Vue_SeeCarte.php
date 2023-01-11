<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Visualiser Carte</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <?php $this->load->view('admin/headeradm'); ?>
    <h1> Visualiser Carte </h1>
      <br>
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">Numéro de la carte</th>
      <th scope="col">Code de la carte</th>
    </tr>
  </thead>
  <tbody>
      <?php for($i=1; $i< $ID;$i++){ ?>
        <tr>
        <td><?php echo $Identifiant[$i][0] ?></td>
        <td><?php echo $Num[$i][0] ?></td>
        </tr>
      <?php } ?>
  </tbody>
</table>