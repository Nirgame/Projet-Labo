<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ajout Utilisateur</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php $this->load->view('admin/headeradm'); ?>
        <h1> Ajout Utilisateur </h1>
        <div class="but">
        <div class="mx-auto" style="width: 400px;">

        <form action="<?=site_url("/C_Administrator/viewAddUser")?>" method="post" >

            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Nom" placeholder="Nom" value="" /></div>
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Prenom" placeholder="Prénom" value="" /></div>
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Poste" placeholder="Poste" value="" /></div>
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Password" placeholder="Password" value="" /></div>
            <select class="form-select" aria-label="multiple select example" name="Carte">
                    <option selected hidden>Sélectionner une carte</option>
                    <?php 
                    for($i=1; $i< $IDCarte; $i++){?>
                      <option value= <?php echo $idCarte[$i][0] ?> > numéro : <?php echo $identifiantCarte[$i][0] ?> , code : <?php echo $nomCarte[$i][0] ?> </option> <?php
                    } ?>
            <select> 
            <select class="form-select" aria-label="multiple select example" name="Autho">
                    <option selected hidden>Sélectionner un niveau d'authorisation</option>
                    <?php 
                    for($j=0; $j<8 ;$j++){ ?>
                        <option value= <?php echo $j+1 ?> > <?php echo $j+1 ?> </option> <?php
                    } ?>
            </select>
            
            <input type="submit" id="Add" value="Ajouter" name="Add" class="btn btn-primary"/>
        </form>
</div></div>
        <?php $this->load->view('footer'); ?>
    </body>
</html>