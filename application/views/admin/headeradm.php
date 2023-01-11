<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<header>

<?php $this->load->helper('url'); ?> 

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="/labo/C_Accueil/viewAdmin">
      <img src="https://www.chorege.com/wp-content/uploads/2021/06/kisspng-astrazeneca-pharmaceutical-industry-medical-scienc-5ae3aefbf0c596.6194306615248709079862.png" alt="" width="60" height="48" class="d-inline-block align-text-top">
    </a>        
    <a class="navbar-brand" href="/labo/C_Accueil/viewAdmin">Astra Zeneca</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
                      <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Ajout
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="/labo/C_Administrator/viewAddUser"><center>Utilisateur</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewAddCarte"><center>Carte</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewAddLocalisation"><center>Localisation</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewAddLocal"><center>Local</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewAddContenant"><center>Contenant</center></a>
                      </div>
                  </li>
        <li class="nav-item dropdown">
                      <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Modification
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="/labo/C_Administrator/viewModifUser"><center>Utilisateur</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewModifCarte"><center>Carte</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewModifLocal"><center>Local</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewModifContenant"><center>Contenant</center></a>
                      </div>
                  </li>
        <li class="nav-item dropdown">
                      <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Supprimer
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="/labo/C_Administrator/viewDelUser"><center>Utilisateur</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewDelCarte"><center>Carte</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewDelLocalisation"><center>Localisation</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewDelLocal"><center>Local</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewDelContenant"><center>Contenant</center></a>
                      </div>
                  </li>
          <li class="nav-item dropdown">
                      <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Visualiser
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="/labo/C_Administrator/viewSeeUser"><center>Utilisateur</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewSeeCarte"><center>Carte</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewSeeLocalisation"><center>Localisation</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewSeeLocal"><center>Local</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewSeeContenant"><center>Contenant</center></a>
                      </div>
                  </li>
        <li class="nav-item dropdown">
                  <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Vue utilisateur
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="/labo/C_Administrator/viewMaj"><center>Mise à jour</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewStock"><center>Stock</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewLocal"><center>Localisation</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewAjout"><center>Ajout produit</center></a>
                          <a class="dropdown-item" href="/labo/C_Administrator/viewHistorique"><center>Historique</center></a>
                      </div>
                  </li>
        <li class="nav-item">
          <a class="nav-link active" href="/labo/C_View/logout">Déconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</header>
</html>