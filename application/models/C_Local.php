<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Local extends C_Stock {

    function ProduitDemand($produitL)
    {
            $query = $this->db->query("SELECT produits.idproduits, produits.nom, local.Nom, produits_has_localisation.localisation_idlocalisation, produits_has_localisation.date_deplacement, localisation.etagere, localisation.position
             FROM produits INNER JOIN produits_has_localisation ON produits.idproduits = produits_has_localisation.produits_idproduits
             INNER JOIN local ON produits.local_idlocal = local.idlocal
             INNER JOIN localisation ON produits_has_localisation.localisation_idlocalisation = localisation.idlocalisation
             WHERE produits.idproduits =".$produitL);  
            $data = $query->result_array();
            
            return $data;
    }

}