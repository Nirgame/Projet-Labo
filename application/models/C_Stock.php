<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Stock extends CI_Model {

    public function Local()
    {
        $query = $this->db->query("SELECT * FROM local");
        $data = $query->result_array();
        return $data;
    }

    public function RecupTout()
    {
        $IDP = $this->db->query('SELECT idproduits FROM produits');
        $IDproduits = $IDP->result_array();
        $count = count($IDproduits);
        for ($i=0;$i <= $count-1;$i++){
            $idp = $IDproduits[$i]['idproduits'];
            $query = $this->db->query("SELECT produits.idproduits,produits.nom,produits.poids,produits.dangeureux,produits_has_bouteille.quantité_bouteille,local.Nom
             FROM produits INNER JOIN produits_has_bouteille ON produits.idproduits = produits_has_bouteille.produits_idproduits 
             INNER JOIN local ON produits.local_idlocal = local.idlocal
             WHERE produits.idproduits ='$idp'");  
            $data = $query->result_array();
            $datas[] = $data;
        }
        return $datas;
    }

    public function RecupLocal($localS)
    {
        $IDP = $this->db->query('SELECT idproduits FROM produits WHERE local_idlocal = '.$localS);
        $IDproduits = $IDP->result_array();
        if ($IDproduits != NULL) {
        $count = count($IDproduits);
        for ($i=0;$i <= $count-1;$i++){
            $idp = $IDproduits[$i]['idproduits'];
            $query = $this->db->query("SELECT produits.idproduits,produits.nom,produits.poids,produits.dangeureux,produits_has_bouteille.quantité_bouteille,local.Nom
             FROM produits INNER JOIN produits_has_bouteille ON produits.idproduits = produits_has_bouteille.produits_idproduits
             INNER JOIN local ON produits.local_idlocal = local.idlocal
             WHERE produits.idproduits ='$idp'");  
            $data = $query->result_array();
            $datas[] = $data;
        }
            return $datas;
        }
        else {
            ?> <script>
                alert('Aucun produit dans ce local');
            </script> <?php
    }
}
}