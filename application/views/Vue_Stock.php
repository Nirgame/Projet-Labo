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
        <?php $this->load->view('header'); ?>
        <h1> Stock </h1>
        <div class="but">
        <div class="mx-auto" style="width: 400px;">
            <form action="<?=site_url("/C_View/viewStock")?>" method="post" >
            <select class="form-select" aria-label="multiple select example" name="localS">
                <option selected>Veuillez sélectionnez un local</option>
                <option value="810">Tout</option>
                    <?php for($i=0; $i< $IDloc;$i++){ ?>
                       <option value= <?php echo $idlocal[$i][0] ?> > <?php echo $nomlocal[$i][0] ?> </option> <?php
                    } ?>
            </select>
            <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div></div>
        <?php $this->load->view('footer'); ?>
    </body>
</html>