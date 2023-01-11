<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Historique extends C_Stock {

    function historique($localL)
    {
        $query = $this->db->query("SELECT personne.nom, personne.prenom, personne_has_local.heure_E, personne_has_local.heure_S, local.Nom
        FROM personne_has_local 
        INNER JOIN personne ON personne.idpersonne = personne_has_local.personne_idpersonne
        INNER JOIN local ON local.idlocal = personne_has_local.local_idlocal
        WHERE personne_has_local.local_idlocal =".$localL);  
       $data = $query->result_array();
       
       return $data;
    }

}