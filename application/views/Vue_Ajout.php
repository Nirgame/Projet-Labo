<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ajout</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php $this->load->view('header'); ?>
        <h1> Ajout </h1>
        <div class="but">
        <div class="mx-auto" style="width: 400px;">

        <form action="<?=site_url("/C_View/viewAjout")?>" method="post" >

            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Nom" placeholder="Nom du produit" value="" /></div>
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Poids" placeholder="Poids" value="" /></div>
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Danger" placeholder="Niveau de dangerosité" value="" /></div>
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Quantité" placeholder="Quantité" value="" /></div>
            <select class="form-select" aria-label="multiple select example" name="Contenant">
                    <option selected hidden>Sélectionner un contenant</option>
                    <?php 
                    for($i=1; $i< $IDbout; $i++){?>
                      <option value= <?php echo $idbout[$i][0] ?> > <?php echo $nombout[$i][0] ?> </option> <?php
                    } ?>
            </select>
            <select class="form-select" aria-label="multiple select example" name="Local">
                    <option selected hidden>Sélectionner un local</option>
                    <?php 
                    for($j=1; $j< $IDloc;$j++){ ?>
                        <option value= <?php echo $idlocal[$j][0] ?> > <?php echo $nomlocal[$j][0] ?> </option> <?php
                    } ?>
            </select>
            <select class="form-select" aria-label="multiple select example" name="Position">
                    <option selected hidden>Sélectionner une position</option>
                    <?php 
                    for($k=1; $k< $IDlocalis;$k++){ ?>
                      <option value= <?php echo $idlocalis[$k][0] ?> >Etagére : <?php echo $etagerelocalis[$k][0] ?>, Position : <?php echo $positionlocalis[$k][0] ?></option> <?php
                    } ?>
            </select>
            <input type="submit" id="Add" value="Ajouter" name="Add" class="btn btn-primary"/>
        </form>
</div></div>
        <?php $this->load->view('footer'); ?>
    </body>
</html>