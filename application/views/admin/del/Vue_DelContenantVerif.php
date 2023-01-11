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
        <div class="check">
        <div class="mx-auto" style="width: 400px;">
            <form action="<?=site_url("/C_Administrator/viewDelContenant")?>" method="POST" >
            <ul class="list-group">
            <li class="list-group-item list-group-item-danger"> Etes vous sur de vouloir supprimer ses contenants</li>
            <?php for($i=0; $i< $ID;$i++){ ?>        
            <li class="list-group-item">
            <input type="hidden" id="Suppr" name="Suppr<?php echo $i; ?>" value="<?php echo $id[$i][0] ?>"> <?php echo $nom[$i][0] ?>
            </li>
                    <?php } 
                    ?>
                    
                    <input type="hidden" id="count" name="count" value="<?php echo $ID ?>">
                    
                    <input type="submit" id="Val" value="Oui" name="Val" class="btn btn-success"/>
                    <input type="submit" id="Ref" value="Non" name="Ref" class="btn btn-danger"/>
            
                </form>
        </div></div>
        <?php $this->load->view('footer'); ?>
    </body>
</html>