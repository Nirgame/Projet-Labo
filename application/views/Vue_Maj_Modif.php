<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mise à jour</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
      <br>
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom du produit</th>
      <th scope="col">Poids</th>
      <th scope="col">Danger</th>
      <th scope="col">Quantité</th>
      <th scope="col">Contenant</th>
      <th scope="col">Local</th>
      <th scope="col">Position</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <form action="<?=site_url("/C_View/viewMaj")?>" method="post" >

        <td><input type="text" id="IDprod" name="IDprod" size="1" value="<?php echo $idproduit ?>" required readonly="readonly"></td>
        <td><input type="text" id="Nom" name="Nom" size="10" value="<?php echo $Nom ?>" required readonly="readonly"></td>
        <td><input type="text" id="Poids" name="Poids" size="10" value="<?php echo $Poids ?>" required></td>
        <td><input type="text" id="Danger" name="Danger" size="10" value="<?php echo $Danger ?>" required></td>
        <td><input type="text" id="Quantité" name="Quantité" size="10" value="<?php echo $Quantité ?>" required></td>

        <td><select class="form-select" aria-label="multiple select example" name="Contenant">
                    <option value=" <?php echo $idContenant ?>" selected hidden><?php echo $Contenant ?></option>
                        <?php 
                        for($i=1; $i< $IDbout; $i++){?>
                          <option value= <?php echo $idbout[$i][0] ?> > <?php echo $nombout[$i][0] ?> </option> <?php
                        } ?>
                    </select></td>

        <td><select class="form-select" aria-label="multiple select example" name="Local">
                    <option value=" <?php echo $idLocal ?>" selected hidden><?php echo $Local ?></option>
                    <?php for($j=1; $j< $IDloc;$j++){ ?>
                          <option value= <?php echo $idlocal[$j][0] ?> > <?php echo $nomlocal[$j][0] ?> </option> <?php
                        } ?>
                    </select></td>
                    
        <td><select class="form-select" aria-label="multiple select example" name="Position">
                    <option value=" <?php echo $idLocalisation ?>" selected hidden> Etagére : <?php echo $Etagère ?>, Position : <?php echo $Position ?> </option>
                    <?php for($k=1; $k< $IDlocalis;$k++){ ?>
                          <option value= <?php echo $idlocalis[$k][0] ?> >Etagére : <?php echo $etagerelocalis[$k][0] ?>, Position : <?php echo $positionlocalis[$k][0] ?></option> <?php
                        } ?>
                    </select></td>
        
        </tr>
  </tbody>
</table>

        <div class="but">
        <div class="mx-auto" style="width: 400px;">
              <input type="submit" id="SaveModif" value="Modifier" name="SaveModif" class="btn btn-primary"/></div></div>
        </form>

    </body>
</html>