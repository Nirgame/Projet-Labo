<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php $this->load->view('header'); ?>
        <h1> Accueil </h1>
        <div class="position-absolute top-50 start-50 translate-middle">
            <center><img src="https://www.chorege.com/wp-content/uploads/2021/06/kisspng-astrazeneca-pharmaceutical-industry-medical-scienc-5ae3aefbf0c596.6194306615248709079862.png" alt="" width="300" height="240" class="d-inline-block align-text-top"></center>
            <br><font color=white size='6'>Bienvenue sur le site d'Astra Zeneca</font>
        </div>
        <?php $this->load->view('footer'); ?>
    </body>
</html>