<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<header>

<?php $this->load->helper('url'); ?> 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/labo/C_Accueil/viewAccueil">
      <img src="https://www.chorege.com/wp-content/uploads/2021/06/kisspng-astrazeneca-pharmaceutical-industry-medical-scienc-5ae3aefbf0c596.6194306615248709079862.png" alt="" width="60" height="48" class="d-inline-block align-text-top">
    </a>        
    <a class="navbar-brand" href="/labo/C_Accueil/viewAccueil">Astra Zeneca</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="/labo/C_View/viewMaj">Mise à jour</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/labo/C_View/viewAjout">Ajout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/labo/C_View/viewStock">Stock</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/labo/C_View/viewLocal">Localisation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/labo/C_View/viewHistorique">Historique</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/labo/C_View/logout">Déconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</header>
</html>