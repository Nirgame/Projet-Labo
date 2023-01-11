<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modifier Utilisateur</title>
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
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Poste</th>
      <th scope="col">Carte</th>
      <th scope="col">Ancien Mot de passe (facultatif)</th>
      <th scope="col">Nouveau Mot de passe (facultatif)</th>
      <th scope="col">authorisation</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <form action="<?=site_url("/C_Administrator/viewModifUser")?>" method="post" >

        <td><input type="text" id="IDPersonne" name="IDPersonne" size="1" value="<?php echo $idpersonne ?>" required readonly="readonly"></td>
        <td><input type="text" id="Nom" name="Nom" size="10" value="<?php echo $Nom ?>" required></td>
        <td><input type="text" id="Prenom" name="Prenom" size="10" value="<?php echo $Prenom ?>" required></td>
        <td><input type="text" id="Poste" name="Poste" size="10" value="<?php echo $Poste ?>" required></td>

        <td><select class="form-select" aria-label="multiple select example" name="Carte">
                    <option value=" <?php echo $idCarte ?>" selected hidden > numéro : <?php echo $NomCarte ?> , code : <?php echo $NumCarte ?> </option>
                        <?php 
                        for($i=1; $i< $IDcarte; $i++){?>
                          <option value= <?php echo $idcarte[$i][0] ?> > numéro : <?php echo $nomcarte[$i][0] ?> , code : <?php echo $numcarte[$i][0] ?> </option> <?php
                        } ?>
                    </select></td>

        <td><input type="text" id="OldMDP" name="OldMDP" size="20" value=""></td>
        <td><input type="text" id="NewMDP" name="NewMDP" size="20" value=""></td>
        <td><input type="text" id="Autho" name="Autho" size="10" value="<?php echo $Autho ?>" required></td>
        
        </tr>
  </tbody>
</table>

        <div class="but">
        <div class="mx-auto" style="width: 400px;">
              <input type="submit" id="SaveModif" value="Modifier" name="SaveModif" class="btn btn-primary"/></div></div>
        </form>

    </body>
</html>