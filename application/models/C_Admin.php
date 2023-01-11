<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Admin extends CI_Model {

    function BDD_Carte()
    {
        $query = $this->db->query("SELECT * FROM carte");
        $data = $query->result_array();
        return $data;
    }

    function BDD_User()
    {
        $query = $this->db->query("SELECT * FROM personne");
        $data = $query->result_array();
        return $data;
    }

    function BDD_UserCarte()
    {
        $query = $this->db->query("SELECT * FROM personne INNER JOIN carte ON idcarte = carte_idcarte");
        $data = $query->result_array();
        return $data;
    }

    function BDD_Local()
    {
        $query = $this->db->query("SELECT * FROM local");
        $data = $query->result_array();
        return $data;
    }

    function BDD_Cont()
    {
        $query = $this->db->query("SELECT * FROM bouteille");
        $data = $query->result_array();
        return $data;
    }

    function BDD_Localisation()
    {
        $query = $this->db->query("SELECT * FROM localisation");
        $data = $query->result_array();
        return $data;
    }

    function AjoutUser($add_data)
    {
        $this->db->query("INSERT INTO personne(nom, prenom, poste, carte_idcarte, password, authorisation, identifiant)
        VALUES ('".$add_data['Nom']."','".$add_data['Prenom']."','".$add_data['Poste']."','".$add_data['Carte']."','".$add_data['Password']."','".$add_data['Autho']."','".$add_data['login']."')");

    }

    function AjoutCarte($add_data)
    {
        $this->db->query("INSERT INTO carte(numero, identifiant_carte)
        VALUES ('".$add_data['Code']."',".$add_data['Num'].")");
    }
    
    function AjoutLocalisation($add_data)
    {
        $this->db->query("INSERT INTO localisation(etagere, position)
        VALUES (".$add_data['Etagere'].",".$add_data['Position'].")");
    }

    function AjoutLocal($add_data)
    {
        $this->db->query("INSERT INTO local(Nom, indice_danger, niveau_acces)
        VALUES ('".$add_data['Nom']."',".$add_data['Danger'].",".$add_data['Acces'].")");
    }
    
    function AjoutContenant($add_data)
    {
        $this->db->query("INSERT INTO bouteille(Nom_Bouteille, poids_sans_produit, poids_max)
        VALUES ('".$add_data['Nom']."',".$add_data['Poids'].",".$add_data['Max'].")");
    }
    
    function ModifUserSelect($PersonneModif)
    {
        $query = $this->db->query("SELECT *
         FROM personne INNER JOIN carte ON personne.carte_idcarte = carte.idcarte
         WHERE idpersonne ='$PersonneModif'");  
       $data = $query->result_array();
       return $data;
    }

    function ModifUser($newdata)
    {
        $this->db->query("UPDATE personne
        SET nom='".$newdata['Nom']."', prenom='".$newdata['Prenom']."', poste='".$newdata['Poste']."', carte_idcarte=".$newdata['Carte'].", authorisation=".$newdata['Autho']."
        WHERE idpersonne =".$newdata['IDPersonne']);

        if (($newdata['OldMDP'] != "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855") && ($newdata['NewMDP'] != "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"))
        { 
        $data = $this->db->query("SELECT idpersonne from personne where password ='".$newdata['OldMDP']."' AND idpersonne ='".$newdata['IDPersonne']."'");
        $mdp = $data->result_array();
        if ($mdp != NULL) 

        {
            $this->db->query("UPDATE personne
            SET password='".$newdata['NewMDP']."'
            WHERE idpersonne =".$newdata['IDPersonne']);
            ?>
            <script>
                alert('mot de passe modifié avec succès');
            </script>
            <?php
        }

        else { ?> <script> alert('Mot de passe faux'); </script> <?php }
        }

    }
    
    function ModifCarteSelect($CarteModif)
    {
        $query = $this->db->query("SELECT *
         FROM carte 
         WHERE idcarte ='$CarteModif'");  
       $data = $query->result_array();
       return $data;
    }

    function ModifCarte($newdata)
    {
        $this->db->query("UPDATE carte
        SET numero='".$newdata['Numero']."', identifiant_carte='".$newdata['Identifiant']."'
        WHERE idcarte =".$newdata['IDCarte']);
    }

    function ModifLocalSelect($LocalModif)
    {
        $query = $this->db->query("SELECT *
         FROM local
         WHERE idlocal ='$LocalModif'");  
       $data = $query->result_array();
       return $data;
    }

    function ModifLocal($newdata)
    {
        $this->db->query("UPDATE local
        SET Nom='".$newdata['Nom']."', indice_danger='".$newdata['Danger']."', niveau_acces='".$newdata['Acces']."'
        WHERE idlocal =".$newdata['IDLocal']);
    }

    function ModifContenantSelect($ContModif)
    {
        $query = $this->db->query("SELECT *
         FROM bouteille
         WHERE idbouteille ='$ContModif'");  
       $data = $query->result_array();
       return $data;
    }

    function ModifContenant($newdata)
    {
        $this->db->query("UPDATE bouteille
        SET Nom_Bouteille='".$newdata['Nom']."', poids_sans_produit='".$newdata['Poids']."', poids_max='".$newdata['Max']."'
        WHERE idbouteille =".$newdata['IDCont']);
    }

    function VerifDelUser($verif)
    {
        for ($i=0;$i <= $verif['ID']-1;$i++){
        $idp = $verif['Id'][$i][0];
        $query = $this->db->query("SELECT *
        FROM personne
        WHERE idpersonne = ".$idp);
        $data = $query->result_array();
        $datas[] = $data;
        }
        return $datas;
    }

    function DelUser($del, $Count)
    {
        for ($i=0; $i<$Count; $i++){
            $this->db->query("DELETE FROM `personne_has_local` WHERE personne_idpersonne = ".$del['id'][$i][0]);
            $this->db->query("DELETE FROM `personne` WHERE idpersonne = ".$del['id'][$i][0]);
        }
        
    }

    function VerifDelCarte($verif)
    {
        for ($i=0;$i <= $verif['ID']-1;$i++){
        $idp = $verif['Id'][$i][0];
        $query = $this->db->query("SELECT *
        FROM carte
        WHERE idcarte = ".$idp);
        $data = $query->result_array();
        $datas[] = $data;
        }
        return $datas;
    }

    function DelCarte($del, $Count)
    {
        for ($i=0; $i<$Count; $i++){
            $value = $this->db->query("UPDATE personne SET carte_idcarte= 1 WHERE carte_idcarte =".$del['id'][$i][0]);
            $this->db->query("DELETE FROM `carte` WHERE idcarte = ".$del['id'][$i][0]);
        }
        
    }

    function VerifDelLocalisation($verif)
    {
        for ($i=0;$i <= $verif['ID']-1;$i++){
        $idp = $verif['Id'][$i][0];
        $query = $this->db->query("SELECT *
        FROM localisation
        WHERE idlocalisation = ".$idp);
        $data = $query->result_array();
        $datas[] = $data;
        }
        return $datas;
    }

    function DelLocalisation($del, $Count)
    {
        for ($i=0; $i<$Count; $i++){
            $value = $this->db->query("UPDATE produits_has_localisation SET localisation_idlocalisation = 1 WHERE localisation_idlocalisation =".$del['id'][$i][0]);
            $this->db->query("DELETE FROM `localisation` WHERE idlocalisation = ".$del['id'][$i][0]);
        }
        
    }

    function VerifDelLocal($verif)
    {
        for ($i=0;$i <= $verif['ID']-1;$i++){
        $idp = $verif['Id'][$i][0];
        $query = $this->db->query("SELECT *
        FROM local
        WHERE idlocal = ".$idp);
        $data = $query->result_array();
        $datas[] = $data;
        }
        return $datas;
    }

    function DelLocal($del, $Count)
    {
        for ($i=0; $i<$Count; $i++){
            $value = $this->db->query("UPDATE produits SET local_idlocal= 1 WHERE local_idlocal =".$del['id'][$i][0]);
            $this->db->query("DELETE FROM `personne_has_local` WHERE local_idlocal = ".$del['id'][$i][0]);
            $this->db->query("DELETE FROM `local` WHERE idlocal = ".$del['id'][$i][0]);
        }
        
    }

    function VerifDelContenant($verif)
    {
        for ($i=0;$i <= $verif['ID']-1;$i++){
        $idp = $verif['Id'][$i][0];
        $query = $this->db->query("SELECT *
        FROM bouteille
        WHERE idbouteille = ".$idp);
        $data = $query->result_array();
        $datas[] = $data;
        }
        return $datas;
    }

    function DelContenant($del, $Count)
    {
        for ($i=0; $i<$Count; $i++){
            $value = $this->db->query("UPDATE produits_has_bouteille SET bouteille_idbouteille = 1 WHERE bouteille_idbouteille =".$del['id'][$i][0]);
            $this->db->query("DELETE FROM `bouteille` WHERE idbouteille = ".$del['id'][$i][0]);
        }
        
    }
}
