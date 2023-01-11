<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="http://localhost/labo/assets/css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <h1>Login</h1>
    <div class="but">
    <div class="mx-auto" style="width: 400px;">
    <form action="<?=site_url("/C_View/login")?>" method="post" >
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="identifiant" placeholder="identifiant" value="" /></div>
            <div class="form-group">
            <input class="form-control" type="password" required="required" name="password" placeholder="mot de passe" value="" /></div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
    </div></div>
  </body>