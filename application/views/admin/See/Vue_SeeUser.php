<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Visualiser utilisateur</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <?php $this->load->view('admin/headeradm'); ?>
    <h1> Visualiser utilisateur </h1>  
    <br>
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">Utilisateur</th>
      <th scope="col">Poste</th>
      <th scope="col">Carte</th>
      <th scope="col">Authorisation</th>
      <th scope="col">Identifiant</th>
    </tr>
  </thead>
  <tbody>
      <?php for($i=0; $i< $ID;$i++){ ?>
        <tr>
        <td><?php echo $Nom[$i][0] ?> <?php echo $Prenom[$i][0] ?></td>
        <td><?php echo $Poste[$i][0] ?></td>
        <td>Num: <?php echo $Num[$i][0] ?>, Série: <?php echo $Identifiant[$i][0] ?></td>
        <td><?php echo $Autho[$i][0] ?></td>
        <td><?php echo $Id[$i][0] ?></td>
        </tr>
      <?php } ?>
  </tbody>
</table>