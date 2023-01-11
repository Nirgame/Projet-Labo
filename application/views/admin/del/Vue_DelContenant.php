<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Supprimer Contenant</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php $this->load->view('admin/headeradm'); ?>
        <h1> Supprimer Contenant </h1>
        <div class="check ">
        <div class="mx-auto" style="width: 400px;">
            <form action="<?=site_url("/C_Administrator/viewDelContenant")?>" method="post" >
            <ul class="list-group" >
            <li class="list-group-item list-group-item-danger"> Choisissez les contenants à supprimer </li>
            <?php for($i=1; $i< $ID;$i++){ ?>        
            <li class="list-group-item">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="DelContenant[]" value="<?php echo $IDContenant[$i][0] ?>">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?php echo $Nom[$i][0] ?>
                        </label>
                    </div></li>
                    <?php } ?>
                
                    <input type="submit" id="Del" value="Supprimer" name="Del" class="btn btn-primary"/>
            </form>
        </div></div>
        <?php $this->load->view('footer'); ?>
    </body>
</html>