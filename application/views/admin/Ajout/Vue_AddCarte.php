<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ajout Carte</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php $this->load->view('admin/headeradm'); ?>
        <h1> Ajout Carte </h1>
        <div class="but">
        <div class="mx-auto" style="width: 400px;">

        <form action="<?=site_url("/C_Administrator/viewAddCarte")?>" method="post" >

            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Code" placeholder="Code de la carte" value="" /></div>
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Num" placeholder="Numéro de la carte" value="" /></div>
            
            <input type="submit" id="Add" value="Ajouter" name="Add" class="btn btn-primary"/>
        </form>
</div></div>
        <?php $this->load->view('footer'); ?>
    </body>
</html>