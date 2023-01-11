<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Maj extends C_Stock {

    function ModifProduit($newdata)
    {
        $this->db->query("UPDATE produits
        SET poids=".$newdata['poids'].", dangeureux=".$newdata['danger'].", local_idlocal=".$newdata['local']."
        WHERE idproduits =".$newdata['IDProduit']);

        $this->db->query("UPDATE produits_has_bouteille
        SET bouteille_idbouteille=".$newdata['contenant'].", quantité_bouteille=".$newdata['quantité']."
        WHERE produits_idproduits = ".$newdata['IDProduit']);
        
        $this->db->query("UPDATE produits_has_localisation
        SET localisation_idlocalisation=".$newdata['position']."
        WHERE produits_idproduits = ".$newdata['IDProduit']);

    }

    function AjoutProd($add_data)
    {
        $this->db->query("INSERT INTO produits(nom, poids, dangeureux, local_idlocal)
        VALUES ('".$add_data['Nom']."',".$add_data['Poids'].",".$add_data['Danger'].",".$add_data['Local'].")");

        $nomprod = $add_data['Nom'];

          $IDP = $this->db->query("SELECT `idproduits` FROM `produits` WHERE produits.nom ='$nomprod'");
          $data = $IDP->result_array();
          $idprod = (int) $data[0]['idproduits'];

        $this->db->query("INSERT INTO `produits_has_localisation`(localisation_idlocalisation, produits_idproduits)
        VALUES (".$add_data['Position'].",".$idprod.")");

        $this->db->query("INSERT INTO `produits_has_bouteille`(`produits_idproduits`, `bouteille_idbouteille`, `quantité_bouteille`)
        VALUES (".$idprod.",".$add_data['Contenant'].",".$add_data['Quantité'].")");
    }

    function Modifselect($ProduitMaj)
    {
        $query = $this->db->query("SELECT produits.idproduits, produits.nom, produits.poids, produits.dangeureux, produits_has_bouteille.quantité_bouteille, produits_has_bouteille.bouteille_idbouteille, local.Nom, local.idlocal, produits_has_localisation.localisation_idlocalisation, localisation.etagere, localisation.position, bouteille.Nom_Bouteille
         FROM produits INNER JOIN produits_has_localisation ON produits.idproduits = produits_has_localisation.produits_idproduits
         INNER JOIN local ON produits.local_idlocal = local.idlocal
         INNER JOIN localisation ON produits_has_localisation.localisation_idlocalisation = localisation.idlocalisation
         INNER JOIN produits_has_bouteille ON produits.idproduits = produits_has_bouteille.produits_idproduits 
         INNER JOIN bouteille ON bouteille.idbouteille = produits_has_bouteille.bouteille_idbouteille
         WHERE produits.idproduits =".$ProduitMaj);  
       $data = $query->result_array();
       
       return $data;
    }

    function selectmajbout()
    {
      $query = $this->db->query("SELECT * FROM bouteille");
      $data = $query->result_array();
      return $data;
    }

    function selectmajlocalis()
    {
      $query = $this->db->query("SELECT * FROM localisation");
      $data = $query->result_array();
      return $data;
    }
}