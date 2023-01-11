<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Administrator extends CI_Controller {
	function __construct() 

	{
				   parent::__construct(); 
				   $this->load->helper('url'); 
	}

//---------------------------------------------Fonction pour modifier la BDD--------------------------------------------
	function viewMaj()
	{
		
		// ----- modifier la BDD -----
		$this->load->model('C_Stock');
		$this->load->model('C_Maj');
		$stockagemaj=$this->C_Stock->RecupTout();
		$datas['ID'] = count($stockagemaj);
				for($i=0; $i < $datas['ID'];$i++){
					$datas['IDProduits'][] = array($stockagemaj[$i][0]['idproduits']);
					$datas['Nom'][] = array($stockagemaj[$i][0]['nom']);
					}

		if (isset($_POST['SaveModif'])){
			$newdata['IDProduit'] = (int) $_POST["IDprod"];
			$ProduitMaj = $_POST["IDprod"];
			$newdata['poids'] = (int) $_POST["Poids"];
			$newdata['danger'] = (int) $_POST["Danger"];
			$newdata['quantité'] = (int) $_POST["Quantité"];
			$newdata['contenant'] = (int) $_POST["Contenant"];
			$newdata['local'] = (int) $_POST["Local"];
			$newdata['position'] = (int) $_POST["Position"];
			$ProduitMajs = $this->C_Maj->ModifProduit($newdata);
			// ------------------------- retour a la page une fois modifier ------------------------
					$produitval=$this->C_Maj->Modifselect($ProduitMaj);
					$localval=$this->C_Stock->Local();
					$bouteilleval=$this->C_Maj->selectmajbout();
					$localiseval=$this->C_Maj->selectmajlocalis();
					
						$data['idproduit'] = $produitval[0]['idproduits'];
						$data['Nom'] = $produitval[0]['nom'];
						$data['Poids'] = $produitval[0]['poids'];
						$data['Danger'] = $produitval[0]['dangeureux'];
						$data['Quantité'] = $produitval[0]['quantité_bouteille'];
						$data['idContenant'] = (int) $produitval[0]['bouteille_idbouteille'];
						$data['Contenant'] = $produitval[0]['Nom_Bouteille'];
						$data['idLocal'] = (int) $produitval[0]['idlocal'];
						$data['Local'] = $produitval[0]['Nom'];
						$data['idLocalisation'] = (int) $produitval[0]['localisation_idlocalisation'];
						$data['Etagère'] = $produitval[0]['etagere'];
						$data['Position'] = $produitval[0]['position'];
					// -------------- Initialiser tous les locaux --------------------
							$data['IDloc'] = count($localval);
							for($j=0; $j < $data['IDloc']; $j++){
								$data['idlocal'][]=array($localval[$j]['idlocal']);
								$data['nomlocal'][]=array($localval[$j]['Nom']);
							}
					// -------------- Initialiser toutes les localisations --------------------
							$data['IDlocalis'] = count($localiseval);
							for($k=0; $k < $data['IDlocalis']; $k++){
								$data['idlocalis'][]=array($localiseval[$k]['idlocalisation']);
								$data['etagerelocalis'][]=array($localiseval[$k]['etagere']);
								$data['positionlocalis'][]=array($localiseval[$k]['position']);
							}
					// -------------- Initialiser tous les contenants --------------------
							$data['IDbout'] = count($bouteilleval);
							for($l=0; $l < $data['IDbout']; $l++){
								$data['idbout'][]=array($bouteilleval[$l]['idbouteille']);
								$data['nombout'][]=array($bouteilleval[$l]['Nom_Bouteille']);
							}
				?>
				<script>
				alert('Modification faite');
				</script>
				<?php
			$this->load->view('admin/Utilisateur/Vue_Maj', $datas);
			$this->load->view('admin/Utilisateur/Vue_Maj_Modif',$data);


		}

		else if ($this->input->post('ProduitMaj') != 0){
			$ProduitMaj = $this->input->post('ProduitMaj');
			$produitval=$this->C_Maj->Modifselect($ProduitMaj);
			$localval=$this->C_Stock->Local();
			$bouteilleval=$this->C_Maj->selectmajbout();
			$localiseval=$this->C_Maj->selectmajlocalis();
			
				$data['idproduit'] = $produitval[0]['idproduits'];
				$data['Nom'] = $produitval[0]['nom'];
				$data['Poids'] = $produitval[0]['poids'];
				$data['Danger'] = $produitval[0]['dangeureux'];
				$data['Quantité'] = $produitval[0]['quantité_bouteille'];
				$data['idContenant'] = (int) $produitval[0]['bouteille_idbouteille'];
				$data['Contenant'] = $produitval[0]['Nom_Bouteille'];
				$data['idLocal'] = (int) $produitval[0]['idlocal'];
				$data['Local'] = $produitval[0]['Nom'];
				$data['idLocalisation'] = (int) $produitval[0]['localisation_idlocalisation'];
				$data['Etagère'] = $produitval[0]['etagere'];
				$data['Position'] = $produitval[0]['position'];
			// -------------- Initialiser tous les locaux --------------------
					$data['IDloc'] = count($localval);
					for($j=0; $j < $data['IDloc']; $j++){
						$data['idlocal'][]=array($localval[$j]['idlocal']);
						$data['nomlocal'][]=array($localval[$j]['Nom']);
					}
			// -------------- Initialiser toutes les localisations --------------------
					$data['IDlocalis'] = count($localiseval);
					for($k=0; $k < $data['IDlocalis']; $k++){
						$data['idlocalis'][]=array($localiseval[$k]['idlocalisation']);
						$data['etagerelocalis'][]=array($localiseval[$k]['etagere']);
						$data['positionlocalis'][]=array($localiseval[$k]['position']);
					}
			// -------------- Initialiser tous les contenants --------------------
					$data['IDbout'] = count($bouteilleval);
					for($l=0; $l < $data['IDbout']; $l++){
						$data['idbout'][]=array($bouteilleval[$l]['idbouteille']);
						$data['nombout'][]=array($bouteilleval[$l]['Nom_Bouteille']);
					}

			$this->load->view('admin/Utilisateur/Vue_Maj', $datas);
			$this->load->view('admin/Utilisateur/Vue_Maj_Modif',$data);		
		}
		else {
		$this->load->view('/admin/Utilisateur/Vue_Maj', $datas);
		}
	}

//---------------------------------------------Fonction pour le stockage--------------------------------------------
	public function viewStock()
	{
		$this->load->model('C_Stock');
		$local=$this->C_Stock->Local();
		$dataloc['IDloc'] = count($local);
		for($j=0; $j < $dataloc['IDloc']; $j++){
			$dataloc['idlocal'][]=array($local[$j]['idlocal']);
			$dataloc['nomlocal'][]=array($local[$j]['Nom']);
		}
            // ----- si local sélectonné -----
		if ($this->input->post('localS') != 0)
		{
            	// ----- si on ne demande pas tout -----
			if ($this->input->post('localS') != 810){
				$localS = $this->input->post('localS');
				$stockageloc=$this->C_Stock->RecupLocal($localS);
				$this->load->view('admin/Utilisateur/Vue_Stock',$dataloc);
				if ($stockageloc != NULL){		
				$data['ID'] = count($stockageloc);
				for($i=0; $i < $data['ID'];$i++){
					$data['Nom'][] = array($stockageloc[$i][0]['nom']);
					$data['Poids'][] = array($stockageloc[$i][0]['poids']);
					$data['Dangeureux'][] = array($stockageloc[$i][0]['dangeureux']);
					$data['Quantité'][] = array($stockageloc[$i][0]['quantité_bouteille']);
					$data['Local'][] = array($stockageloc[$i][0]['Nom']);
					}
				$this->load->view('admin/Utilisateur/Vue_Stockage', $data);
				}
			}
            	// ----- si on demande tout -----
			else{
				$stockageloc=$this->C_Stock->RecupTout();
				$this->load->view('admin/Utilisateur/Vue_Stock',$dataloc);		
				$data['ID'] = count($stockageloc);
				for($i=0; $i < $data['ID'];$i++){
					$data['Nom'][] = array($stockageloc[$i][0]['nom']);
					$data['Poids'][] = array($stockageloc[$i][0]['poids']);
					$data['Dangeureux'][] = array($stockageloc[$i][0]['dangeureux']);
					$data['Quantité'][] = array($stockageloc[$i][0]['quantité_bouteille']);
					$data['Local'][] = array($stockageloc[$i][0]['Nom']);
					}
				$this->load->view('admin/Utilisateur/Vue_Stockage', $data);
				}
			}
		// ----- envoie de base -----
		else
		{
		$this->load->view('admin/Utilisateur/Vue_Stock',$dataloc);
		}

	}

//---------------------------------------------Fonction pour la localisation--------------------------------------------
	function viewLocal()
	{
		$this->load->model('C_Stock');
		$this->load->model('C_Local');
		$local=$this->C_Stock->Local();
		$dataloc['IDloc'] = count($local);
		for($j=0; $j < $dataloc['IDloc']; $j++){
			$dataloc['idlocal'][]=array($local[$j]['idlocal']);
			$dataloc['nomlocal'][]=array($local[$j]['Nom']);
		}
			// ----- local sélectionné -----
		if ($this->input->post('localL') != 0)
		{
			$localL = $this->input->post('localL');
			$localiseloc=$this->C_Stock->RecupLocal($localL);
			$this->load->view('admin/Utilisateur/Vue_Local',$dataloc);		
			if ($localiseloc != NULL) {
			$data['ID'] = count($localiseloc);
			for($i=0; $i < $data['ID'];$i++){
				$data['idproduit'][] = array($localiseloc[$i][0]['idproduits']);
				$data['Nom'][] = array($localiseloc[$i][0]['nom']);
				}
			$this->load->view('admin/Utilisateur/Vue_Localise', $data);
			}
		}
			// ----- produit sélectionné -----
		elseif ($this->input->post('produitL') !=0)
		{
			$produitL = $this->input->post('produitL');
			$localiseprod=$this->C_Local->ProduitDemand($produitL);
			$this->load->view('admin/Utilisateur/Vue_Local',$dataloc);	
				$data['idproduit'][] = array($localiseprod[0]['idproduits']);
				$data['Nom'][] = array($localiseprod[0]['nom']);
				$data['Local'][] = array($localiseprod[0]['Nom']);
				$data['Déplacement'][] = array($localiseprod[0]['date_deplacement']);
				$data['Etagère'][] = array($localiseprod[0]['etagere']);
				$data['Position'][] = array($localiseprod[0]['position']);
			$this->load->view('admin/Utilisateur/Vue_Localisation', $data);
		}
			// ----- envoie de base -----
		else
		{
			$this->load->view('admin/Utilisateur/Vue_Local',$dataloc);
		}

	}

//---------------------------------------------Fonction pour l'historique--------------------------------------------
	function viewHistorique()
	{
		$this->load->model('C_Stock');
		$this->load->model('C_Historique');
		$local=$this->C_Stock->Local();
		$dataloc['IDloc'] = count($local);
		for($j=0; $j < $dataloc['IDloc']; $j++){
			$dataloc['idlocal'][]=array($local[$j]['idlocal']);
			$dataloc['nomlocal'][]=array($local[$j]['Nom']);
		}

		if ($this->input->post('localL') != 0)
		{
			$localL = $this->input->post('localL');
			$histo=$this->C_Historique->historique($localL);
			$this->load->view('admin/Utilisateur/Vue_Historique',$dataloc);		
			$data['ID'] = count($histo);
			for($i=0; $i < $data['ID'];$i++){
				$data['Nom'][] = array($histo[$i]['nom']);
				$data['Prenom'][] = array($histo[$i]['prenom']);
				$data['Heure_E'][] = array($histo[$i]['heure_E']);
				$data['Heure_S'][] = array($histo[$i]['heure_S']);
				$data['Local'][] = array($histo[$i]['Nom']);
				}
			$this->load->view('admin/Utilisateur/Vue_Histo', $data);
			
		}
		else {
		$this->load->view('admin/Utilisateur/Vue_Historique',$dataloc);
		}
	}

//---------------------------------------------Fonction pour l'ajout dans la BDD--------------------------------------------
	function viewAjout()
	{

		$this->load->model('C_Stock');
		$this->load->model('C_Maj');
			// ----- ajout -----
		$localval=$this->C_Stock->Local();
		$bouteilleval=$this->C_Maj->selectmajbout();
		$localiseval=$this->C_Maj->selectmajlocalis();

			// -------------- Initialiser tous les locaux --------------------
				$data['IDloc'] = count($localval);
				for($j=0; $j < $data['IDloc']; $j++){
					$data['idlocal'][]=array($localval[$j]['idlocal']);
					$data['nomlocal'][]=array($localval[$j]['Nom']);
				}
			// -------------- Initialiser toutes les localisations --------------------
				$data['IDlocalis'] = count($localiseval);
				for($k=0; $k < $data['IDlocalis']; $k++){
					$data['idlocalis'][]=array($localiseval[$k]['idlocalisation']);
					$data['etagerelocalis'][]=array($localiseval[$k]['etagere']);
					$data['positionlocalis'][]=array($localiseval[$k]['position']);
				}
			// -------------- Initialiser tous les contenants --------------------
				$data['IDbout'] = count($bouteilleval);
				for($l=0; $l < $data['IDbout']; $l++){
					$data['idbout'][]=array($bouteilleval[$l]['idbouteille']);
					$data['nombout'][]=array($bouteilleval[$l]['Nom_Bouteille']);
				}

		if (isset($_POST['Add'])){

			$add_data['Nom'] = $_POST["Nom"];
			$add_data['Poids'] = (int) $_POST["Poids"];
			$add_data['Danger'] = (int) $_POST["Danger"];
			$add_data['Quantité'] = (int) $_POST["Quantité"];
			$add_data['Contenant'] = (int) $_POST["Contenant"];
			$add_data['Local'] = (int) $_POST["Local"];
			$add_data['Position'] = (int) $_POST["Position"];

			$this->C_Maj->AjoutProd($add_data);

			?>
				<script>
				alert('Ajout fait');
				</script>
				<?php


		}

		$this->load->view('admin/Utilisateur/Vue_Ajout', $data);
	
	}

	function viewAddUser()
	{
		$this->load->model('C_Admin');
		$carteval=$this->C_Admin->BDD_Carte();

		$data['IDCarte'] = count($carteval);
			for($j=0; $j < $data['IDCarte']; $j++){
				$data['idCarte'][]=array($carteval[$j]['idcarte']);
				$data['nomCarte'][]=array($carteval[$j]['numero']);
				$data['identifiantCarte'][]=array($carteval[$j]['identifiant_carte']);
			}
		
			if (isset($_POST['Add'])){

				$add_data['Nom'] = $_POST["Nom"];
				$add_data['Prenom'] = $_POST["Prenom"];
				$add_data['Poste'] = $_POST["Poste"];
				$add_data['Password'] = hash('sha256',$_POST["Password"]);
				$add_data['Carte'] = $_POST["Carte"];
				$add_data['Autho'] = $_POST["Autho"];
				$add_data['login'] = $_POST["Nom"].'.'.$_POST["Prenom"];
	
				$this->C_Admin->AjoutUser($add_data);
	
				?>
					<script>
					alert('Ajout fait');
					</script>
					<?php
	
	
			}

		$this->load->view('admin/Ajout/Vue_AddUser', $data);
	}

	function viewAddCarte()
	{
		$this->load->model('C_Admin');
		$carteval=$this->C_Admin->BDD_Carte();
		
			if (isset($_POST['Add'])){

				$add_data['Num'] = $_POST["Num"];
				$add_data['Code'] = $_POST["Code"];
	
				$this->C_Admin->AjoutCarte($add_data);
	
				?>
					<script>
					alert('Ajout fait');
					</script>
					<?php
	
	
			}

		$this->load->view('admin/Ajout/Vue_AddCarte');
	}

	function viewAddLocalisation()
	{
		$this->load->model('C_Admin');
		
			if (isset($_POST['Add'])){

				$add_data['Etagere'] = (int) $_POST["Etagere"];
				$add_data['Position'] = (int) $_POST["Position"];
	
				$this->C_Admin->AjoutLocalisation($add_data);
	
				?>
					<script>
					alert('Ajout fait');
					</script>
					<?php
	
	
			}

		$this->load->view('admin/Ajout/Vue_AddLocalisation');
	}

	function viewAddlocal()
	{
		$this->load->model('C_Admin');
		
			if (isset($_POST['Add'])){

				$add_data['Nom'] = $_POST["Nom"];
				$add_data['Danger'] = (int) $_POST["Danger"];
				$add_data['Acces'] = (int) $_POST["Acces"];
	
				$this->C_Admin->AjoutLocal($add_data);
	
				?>
					<script>
					alert('Ajout fait');
					</script>
					<?php
	
	
			}

		$this->load->view('admin/Ajout/Vue_AddLocal');
	}

	function viewAddContenant()
	{
		$this->load->model('C_Admin');
		
			if (isset($_POST['Add'])){

				$add_data['Nom'] = $_POST["Nom"];
				$add_data['Poids'] = (int) $_POST["Poids"];
				$add_data['Max'] = (int) $_POST["Max"];
	
				$this->C_Admin->AjoutContenant($add_data);
	
				?>
					<script>
					alert('Ajout fait');
					</script>
					<?php
	
	
			}

		$this->load->view('admin/Ajout/Vue_AddContenant');
	}

	function viewModifUser()
	{
		$this->load->model('C_Admin');
		$personnemaj=$this->C_Admin->BDD_User();
		$datas['ID'] = count($personnemaj);
				for($i=0; $i < $datas['ID'];$i++){
					$datas['IDPersonne'][] = array($personnemaj[$i]['idpersonne']);
					$datas['Nom'][] = array($personnemaj[$i]['nom']);
					$datas['Prenom'][] = array($personnemaj[$i]['prenom']);
					}

		if (isset($_POST['SaveModif'])){
			$newdata['IDPersonne'] = (int) $_POST["IDPersonne"];
			$PersonneModif = $_POST["IDPersonne"];
			$newdata['Nom'] = $_POST["Nom"];
			$newdata['Prenom'] = $_POST["Prenom"];
			$newdata['Poste'] = $_POST["Poste"];
			$newdata['Carte'] = (int) $_POST["Carte"];
			$newdata['OldMDP'] = hash('sha256',$_POST["OldMDP"]);
			$newdata['NewMDP'] = hash('sha256',$_POST["NewMDP"]);
			$newdata['Autho'] = (int) $_POST["Autho"];
			$this->C_Admin->ModifUser($newdata);
			// ------------------------- retour a la page une fois modifier ------------------------
				$personneval=$this->C_Admin->ModifUserSelect($PersonneModif);
				$carteval=$this->C_Admin->BDD_Carte();
				
					$data['idpersonne'] = $personneval[0]['idpersonne'];
					$data['Nom'] = $personneval[0]['nom'];
					$data['Prenom'] = $personneval[0]['prenom'];
					$data['Poste'] = $personneval[0]['poste'];
					$data['idCarte'] = $personneval[0]['carte_idcarte'];
					$data['NomCarte'] = $personneval[0]['identifiant_carte'];
					$data['NumCarte'] = $personneval[0]['numero'];
					$data['Password'] = $personneval[0]['password'];
					$data['Autho'] = $personneval[0]['authorisation'];
						
					// -------------- Initialiser toutes les cartes --------------------
					$data['IDcarte'] = count($carteval);
					for($j=0; $j < $data['IDcarte']; $j++){
						$data['idcarte'][]=array($carteval[$j]['idcarte']);
						$data['nomcarte'][]=array($carteval[$j]['identifiant_carte']);
						$data['numcarte'][]=array($carteval[$j]['numero']);
					}
					?>
				<script>
				alert('Modification faite');
				</script>
				<?php
			$this->load->view('admin/Modif/Vue_ModifUser', $datas);
			$this->load->view('admin/Modif/Vue_ModifUserTab',$data);


		}

		else if ($this->input->post('PersonneModif') != 0){
			$PersonneModif = $this->input->post('PersonneModif');
			$personneval=$this->C_Admin->ModifUserSelect($PersonneModif);
			$carteval=$this->C_Admin->BDD_Carte();
			
				$data['idpersonne'] = $personneval[0]['idpersonne'];
				$data['Nom'] = $personneval[0]['nom'];
				$data['Prenom'] = $personneval[0]['prenom'];
				$data['Poste'] = $personneval[0]['poste'];
				$data['idCarte'] = $personneval[0]['carte_idcarte'];
				$data['NomCarte'] = $personneval[0]['identifiant_carte'];
				$data['NumCarte'] = $personneval[0]['numero'];
				$data['Password'] = $personneval[0]['password'];
				$data['Autho'] = $personneval[0]['authorisation'];
				
			// -------------- Initialiser toutes les cartes --------------------
					$data['IDcarte'] = count($carteval);
					for($j=0; $j < $data['IDcarte']; $j++){
						$data['idcarte'][]=array($carteval[$j]['idcarte']);
						$data['nomcarte'][]=array($carteval[$j]['identifiant_carte']);
						$data['numcarte'][]=array($carteval[$j]['numero']);
					}

			$this->load->view('admin/Modif/Vue_ModifUser', $datas);
			$this->load->view('admin/Modif/Vue_ModifUserTab',$data);		
		}
		else {
		$this->load->view('/admin/Modif/Vue_ModifUser', $datas);
		}
	}

	function viewModifCarte()
	{
		$this->load->model('C_Admin');
		$cartemaj=$this->C_Admin->BDD_Carte();
		$datas['ID'] = count($cartemaj);
				for($i=0; $i < $datas['ID'];$i++){
					$datas['IDCarte'][] = array($cartemaj[$i]['idcarte']);
					$datas['Numero'][] = array($cartemaj[$i]['numero']);
					$datas['Identifiant'][] = array($cartemaj[$i]['identifiant_carte']);
					}
		if (isset($_POST['SaveModif'])){
			$newdata['IDCarte'] = (int) $_POST["IDCarte"];
			$CarteModif = $_POST["IDCarte"];
			$newdata['Identifiant'] = $_POST["Identifiant"];
			$newdata['Numero'] = $_POST["Numero"];
			$this->C_Admin->ModifCarte($newdata);
			// ------------------------- retour a la page une fois modifier ------------------------
				$carteval=$this->C_Admin->ModifCarteSelect($CarteModif);
				
				$data['idcarte'] = $carteval[0]['idcarte'];
				$data['Numero'] = $carteval[0]['numero'];
				$data['Identifiant'] = $carteval[0]['identifiant_carte'];
					
					?>
				<script>
				alert('Modification faite');
				</script>
				<?php

			$this->load->view('admin/Modif/Vue_ModifCarte', $datas);
			$this->load->view('admin/Modif/Vue_ModifCarteTab',$data);


		}

		else if ($this->input->post('CarteModif') != 0){
			$CarteModif = $this->input->post('CarteModif');
			$carteval=$this->C_Admin->ModifCarteSelect($CarteModif);
			
				$data['idcarte'] = $carteval[0]['idcarte'];
				$data['Numero'] = $carteval[0]['numero'];
				$data['Identifiant'] = $carteval[0]['identifiant_carte'];

			$this->load->view('admin/Modif/Vue_ModifCarte', $datas);
			$this->load->view('admin/Modif/Vue_ModifCarteTab',$data);		
		}
		else {
		$this->load->view('/admin/Modif/Vue_ModifCarte', $datas);
		}
	}

	function viewModifLocal()
	{
		$this->load->model('C_Admin');
		$localmaj=$this->C_Admin->BDD_Local();
		$datas['ID'] = count($localmaj);
				for($i=0; $i < $datas['ID'];$i++){
					$datas['IDLocal'][] = array($localmaj[$i]['idlocal']);
					$datas['Nom'][] = array($localmaj[$i]['Nom']);
					$datas['Danger'][] = array($localmaj[$i]['indice_danger']);
					$datas['Acces'][] = array($localmaj[$i]['niveau_acces']);
					}
		if (isset($_POST['SaveModif'])){
			$newdata['IDLocal'] = (int) $_POST["IDLocal"];
			$LocalModif = $_POST["IDLocal"];
			$newdata['Nom'] = $_POST["Nom"];
			$newdata['Danger'] = $_POST["Danger"];
			$newdata['Acces'] = $_POST["Acces"];
			$this->C_Admin->ModifLocal($newdata);
			// ------------------------- retour a la page une fois modifier ------------------------
				$localval=$this->C_Admin->ModifLocalSelect($LocalModif);
				
				$data['idlocal'] = $localval[0]['idlocal'];
				$data['Nom'] = $localval[0]['Nom'];
				$data['Danger'] = $localval[0]['indice_danger'];
				$data['Acces'] = $localval[0]['niveau_acces'];
					
					?>
				<script>
				alert('Modification faite');
				</script>
				<?php

			$this->load->view('admin/Modif/Vue_ModifLocal', $datas);
			$this->load->view('admin/Modif/Vue_ModifLocalTab',$data);


		}

		else if ($this->input->post('LocalModif') != 0){
			$LocalModif = $this->input->post('LocalModif');
			$localval=$this->C_Admin->ModifLocalSelect($LocalModif);
			
			$data['idlocal'] = $localval[0]['idlocal'];
			$data['Nom'] = $localval[0]['Nom'];
			$data['Danger'] = $localval[0]['indice_danger'];
			$data['Acces'] = $localval[0]['niveau_acces'];

			$this->load->view('admin/Modif/Vue_ModifLocal', $datas);
			$this->load->view('admin/Modif/Vue_ModifLocalTab',$data);		
		}
		else {
		$this->load->view('/admin/Modif/Vue_ModifLocal', $datas);
		}
	}

	function viewModifContenant()
	{
		$this->load->model('C_Admin');
		$contmaj=$this->C_Admin->BDD_Cont();
		$datas['ID'] = count($contmaj);
				for($i=0; $i < $datas['ID'];$i++){
					$datas['IDCont'][] = array($contmaj[$i]['idbouteille']);
					$datas['Nom'][] = array($contmaj[$i]['Nom_Bouteille']);
					$datas['Poids'][] = array($contmaj[$i]['poids_sans_produit']);
					$datas['Max'][] = array($contmaj[$i]['poids_max']);
					}
		if (isset($_POST['SaveModif'])){
			$newdata['IDCont'] = (int) $_POST["IDCont"];
			$ContModif = $_POST["IDCont"];
			$newdata['Nom'] = $_POST["Nom"];
			$newdata['Poids'] = $_POST["Poids"];
			$newdata['Max'] = $_POST["Max"];
			$this->C_Admin->ModifContenant($newdata);
			// ------------------------- retour a la page une fois modifier ------------------------
				$contval=$this->C_Admin->ModifContenantSelect($ContModif);
				
				$data['IDCont'] = $contval[0]['idbouteille'];
				$data['Nom'] = $contval[0]['Nom_Bouteille'];
				$data['Poids'] = $contval[0]['poids_sans_produit'];
				$data['Max'] = $contval[0]['poids_max'];
					
					?>
				<script>
				alert('Modification faite');
				</script>
				<?php

			$this->load->view('admin/Modif/Vue_ModifContenant', $datas);
			$this->load->view('admin/Modif/Vue_ModifContenantTab',$data);


		}

		else if ($this->input->post('ContModif') != 0){
			$ContModif = $this->input->post('ContModif');
			$contval=$this->C_Admin->ModifContenantSelect($ContModif);
				
				$data['IDCont'] = $contval[0]['idbouteille'];
				$data['Nom'] = $contval[0]['Nom_Bouteille'];
				$data['Poids'] = $contval[0]['poids_sans_produit'];
				$data['Max'] = $contval[0]['poids_max'];

			$this->load->view('admin/Modif/Vue_ModifContenant', $datas);
			$this->load->view('admin/Modif/Vue_ModifContenantTab',$data);		
		}
		else {
		$this->load->view('/admin/Modif/Vue_ModifContenant', $datas);
		}
	}

	function viewDelUser()
	{
		$this->load->model('C_Admin');
		$personnedel=$this->C_Admin->BDD_User();
		$datas['ID'] = count($personnedel);
				for($i=0; $i < $datas['ID'];$i++){
					$datas['IDPersonne'][] = array($personnedel[$i]['idpersonne']);
					$datas['Nom'][] = array($personnedel[$i]['nom']);
					$datas['Prenom'][] = array($personnedel[$i]['prenom']);
					}

		if (isset($_POST['Del'])){
			$DelUser = $this->input->post('DelUser');
			for ( $j=0; $j<$datas['ID']; $j++){
				if (isset($DelUser[$j])){
					$verif['Id'][] = array($DelUser[$j]);
				}
			}
			$verif['ID'] = count($DelUser);
			$personneverif=$this->C_Admin->VerifDelUser($verif);
			$data['ID'] = count($personneverif);
			for ($k=0; $k<$data['ID']; $k++){
				$data['id'][] = array($personneverif[$k][0]['idpersonne']);
				$data['nom'][] = array($personneverif[$k][0]['nom']);
				$data['prenom'][] = array($personneverif[$k][0]['prenom']);
			}
			$this->load->view('admin/del/Vue_DelUserVerif', $data);
		}
		else if (isset($_POST['Val'])){
			$Count = $this->input->post('count');
			for ( $l=0; $l<$Count; $l++){
				$suppr = $this->input->post("Suppr$l");
				$del['id'][] = array($suppr);
			}
			$this->C_Admin->DelUser($del, $Count);

			?> <script>
					alert('Suppression faite');
				</script> <?php

				$newpersonnedel=$this->C_Admin->BDD_User();
				$newdatas['ID'] = count($newpersonnedel);
						for($i=0; $i < $newdatas['ID'];$i++){
							$newdatas['IDPersonne'][] = array($newpersonnedel[$i]['idpersonne']);
							$newdatas['Nom'][] = array($newpersonnedel[$i]['nom']);
							$newdatas['Prenom'][] = array($newpersonnedel[$i]['prenom']);
							}

			$this->load->view('admin/del/Vue_DelUser', $newdatas);

		}
		else if (isset($_POST['Ref'])){
			$this->load->view('admin/del/Vue_DelUser', $datas);
		}
		else {
		$this->load->view('admin/del/Vue_DelUser', $datas);
		}
	}

	function viewDelCarte()
	{
		$this->load->model('C_Admin');
		$cartedel=$this->C_Admin->BDD_Carte();
		$datas['ID'] = count($cartedel);
				for($i=0; $i < $datas['ID'];$i++){
					$datas['IDCarte'][] = array($cartedel[$i]['idcarte']);
					$datas['Num'][] = array($cartedel[$i]['numero']);
					$datas['Identifiant'][] = array($cartedel[$i]['identifiant_carte']);
					}

		if (isset($_POST['Del'])){
			$DelCarte = $this->input->post('DelCarte');
			for ( $j=0; $j<$datas['ID']; $j++){
				if (isset($DelCarte[$j])){
					$verif['Id'][] = array($DelCarte[$j]);
				}
			}
			$verif['ID'] = count($DelCarte);
			$carteverif=$this->C_Admin->VerifDelCarte($verif);
			$data['ID'] = count($carteverif);
			for ($k=0; $k<$data['ID']; $k++){
				$data['id'][] = array($carteverif[$k][0]['idcarte']);
				$data['num'][] = array($carteverif[$k][0]['numero']);
				$data['identifiant'][] = array($carteverif[$k][0]['identifiant_carte']);
			}
			$this->load->view('admin/del/Vue_DelCarteVerif', $data);
		}
		else if (isset($_POST['Val'])){
			$Count = $this->input->post('count');
			for ( $l=0; $l<$Count; $l++){
				$suppr = $this->input->post("Suppr$l");
				$del['id'][] = array($suppr);
			}
			$this->C_Admin->DelCarte($del, $Count);

			?> <script>
					alert('Suppression faite n oubliez pas de modifier le/les utilisateur(s) ayant cette/ces carte(s)');
				</script> <?php

				$newcartedel=$this->C_Admin->BDD_Carte();
				$newdatas['ID'] = count($newcartedel);
						for($i=0; $i < $newdatas['ID'];$i++){
							$newdatas['IDCarte'][] = array($newcartedel[$i]['idcarte']);
							$newdatas['Num'][] = array($newcartedel[$i]['numero']);
							$newdatas['Identifiant'][] = array($newcartedel[$i]['identifiant_carte']);
							}

			$this->load->view('admin/del/Vue_DelCarte', $newdatas);

		}
		else if (isset($_POST['Ref'])){
			$this->load->view('admin/del/Vue_DelCarte', $datas);
		}
		else {
		$this->load->view('admin/del/Vue_DelCarte', $datas);
		}
	}

	function viewDelLocalisation()
	{
		$this->load->model('C_Admin');
		$localisationdel=$this->C_Admin->BDD_Localisation();
		$datas['ID'] = count($localisationdel);
				for($i=0; $i < $datas['ID'];$i++){
					$datas['IDLocalisation'][] = array($localisationdel[$i]['idlocalisation']);
					$datas['Etagere'][] = array($localisationdel[$i]['etagere']);
					$datas['Position'][] = array($localisationdel[$i]['position']);
					}

		if (isset($_POST['Del'])){
			$DelLocalisation = $this->input->post('DelLocalisation');
			for ( $j=0; $j<$datas['ID']; $j++){
				if (isset($DelLocalisation[$j])){
					$verif['Id'][] = array($DelLocalisation[$j]);
				}
			}
			$verif['ID'] = count($DelLocalisation);
			$localisationverif=$this->C_Admin->VerifDelLocalisation($verif);
			$data['ID'] = count($localisationverif);
			for ($k=0; $k<$data['ID']; $k++){
				$data['id'][] = array($localisationverif[$k][0]['idlocalisation']);
				$data['etagere'][] = array($localisationverif[$k][0]['etagere']);
				$data['position'][] = array($localisationverif[$k][0]['position']);
			}
			$this->load->view('admin/del/Vue_DelLocalisationVerif', $data);
		}
		else if (isset($_POST['Val'])){
			$Count = $this->input->post('count');
			for ( $l=0; $l<$Count; $l++){
				$suppr = $this->input->post("Suppr$l");
				$del['id'][] = array($suppr);
			}
			$this->C_Admin->DelLocalisation($del, $Count);

			?> <script>
					alert('Suppression faite n oubliez pas de modifier le/les produit(s) ayant cette/ces localisation(s)');
				</script> <?php

				$newlocalisationdel=$this->C_Admin->BDD_Localisation();
				$newdatas['ID'] = count($newlocalisationdel);
						for($i=0; $i < $newdatas['ID'];$i++){
							$newdatas['IDLocalisation'][] = array($newlocalisationdel[$i]['idlocalisation']);
							$newdatas['Etagere'][] = array($newlocalisationdel[$i]['etagere']);
							$newdatas['Position'][] = array($newlocalisationdel[$i]['position']);
							}

			$this->load->view('admin/del/Vue_DelLocalisation', $newdatas);

		}
		else if (isset($_POST['Ref'])){
			$this->load->view('admin/del/Vue_DelLocalisation', $datas);
		}
		else {
		$this->load->view('admin/del/Vue_DelLocalisation', $datas);
		}
	}

	function viewDelLocal()
	{
		$this->load->model('C_Admin');
		$localdel=$this->C_Admin->BDD_Local();
		$datas['ID'] = count($localdel);
				for($i=0; $i < $datas['ID'];$i++){
					$datas['IDLocal'][] = array($localdel[$i]['idlocal']);
					$datas['Nom'][] = array($localdel[$i]['Nom']);
					}

		if (isset($_POST['Del'])){
			$DelLocal = $this->input->post('DelLocal');
			for ( $j=0; $j<$datas['ID']; $j++){
				if (isset($DelLocal[$j])){
					$verif['Id'][] = array($DelLocal[$j]);
				}
			}
			$verif['ID'] = count($DelLocal);
			$localverif=$this->C_Admin->VerifDelLocal($verif);
			$data['ID'] = count($localverif);
			for ($k=0; $k<$data['ID']; $k++){
				$data['id'][] = array($localverif[$k][0]['idlocal']);
				$data['nom'][] = array($localverif[$k][0]['Nom']);
			}
			$this->load->view('admin/del/Vue_DelLocalVerif', $data);
		}
		else if (isset($_POST['Val'])){
			$Count = $this->input->post('count');
			for ( $l=0; $l<$Count; $l++){
				$suppr = $this->input->post("Suppr$l");
				$del['id'][] = array($suppr);
			}
			$this->C_Admin->DelLocal($del, $Count);

			?> <script>
					alert('Suppression faite n oubliez pas de modifier le/les produits(s) étant dans ce/ces local(s)');
				</script> <?php

				$newlocaldel=$this->C_Admin->BDD_Local();
				$newdatas['ID'] = count($newlocaldel);
						for($i=0; $i < $newdatas['ID'];$i++){
							$newdatas['IDLocal'][] = array($newlocaldel[$i]['idlocal']);
							$newdatas['Nom'][] = array($newlocaldel[$i]['Nom']);
							}

			$this->load->view('admin/del/Vue_DelLocal', $newdatas);

		}
		else if (isset($_POST['Ref'])){
			$this->load->view('admin/del/Vue_DelLocal', $datas);
		}
		else {
		$this->load->view('admin/del/Vue_DelLocal', $datas);
		}
	}

	function viewDelContenant()
	{
		$this->load->model('C_Admin');
		$contenantdel=$this->C_Admin->BDD_Cont();
		$datas['ID'] = count($contenantdel);
				for($i=0; $i < $datas['ID'];$i++){
					$datas['IDContenant'][] = array($contenantdel[$i]['idbouteille']);
					$datas['Nom'][] = array($contenantdel[$i]['Nom_Bouteille']);
					}

		if (isset($_POST['Del'])){
			$DelContenant = $this->input->post('DelContenant');
			for ( $j=0; $j<$datas['ID']; $j++){
				if (isset($DelContenant[$j])){
					$verif['Id'][] = array($DelContenant[$j]);
				}
			}
			$verif['ID'] = count($DelContenant);
			$contenantverif=$this->C_Admin->VerifDelContenant($verif);
			$data['ID'] = count($contenantverif);
			for ($k=0; $k<$data['ID']; $k++){
				$data['id'][] = array($contenantverif[$k][0]['idbouteille']);
				$data['nom'][] = array($contenantverif[$k][0]['Nom_Bouteille']);
			}
			$this->load->view('admin/del/Vue_DelContenantVerif', $data);
		}
		else if (isset($_POST['Val'])){
			$Count = $this->input->post('count');
			for ( $l=0; $l<$Count; $l++){
				$suppr = $this->input->post("Suppr$l");
				$del['id'][] = array($suppr);
			}
			$this->C_Admin->DelContenant($del, $Count);

			?> <script>
					alert('Suppression faite n oubliez pas de modifier le/les produits(s) étant dans ce/ces contenant(s)');
				</script> <?php

				$newcontenantdel=$this->C_Admin->BDD_Cont();
				$newdatas['ID'] = count($newcontenantdel);
						for($i=0; $i < $newdatas['ID'];$i++){
							$newdatas['IDContenant'][] = array($newcontenantdel[$i]['idbouteille']);
							$newdatas['Nom'][] = array($newcontenantdel[$i]['Nom_Bouteille']);
							}

			$this->load->view('admin/del/Vue_DelContenant', $newdatas);

		}
		else if (isset($_POST['Ref'])){
			$this->load->view('admin/del/Vue_DelContenant', $datas);
		}
		else {
		$this->load->view('admin/del/Vue_DelContenant', $datas);
		}
	}

	function viewSeeUser()
	{
		$this->load->model('C_Admin');
		$usersee=$this->C_Admin->BDD_UserCarte();	
				$data['ID'] = count($usersee);
				for($i=0; $i < $data['ID'];$i++){
					$data['Nom'][] = array($usersee[$i]['nom']);
					$data['Prenom'][] = array($usersee[$i]['prenom']);
					$data['Poste'][] = array($usersee[$i]['poste']);
					$data['Autho'][] = array($usersee[$i]['authorisation']);
					$data['Id'][] = array($usersee[$i]['identifiant']);
					$data['Num'][] = array($usersee[$i]['numero']);
					$data['Identifiant'][] = array($usersee[$i]['identifiant_carte']);
				}
				$this->load->view('admin/See/Vue_SeeUser',$data);
	}

	function viewSeeLocal()
	{
		$this->load->model('C_Admin');
		$localsee=$this->C_Admin->BDD_Local();	
				$data['ID'] = count($localsee);
				for($i=0; $i < $data['ID'];$i++){
					$data['Nom'][] = array($localsee[$i]['Nom']);
					$data['Danger'][] = array($localsee[$i]['indice_danger']);
					$data['Acces'][] = array($localsee[$i]['niveau_acces']);
				}
				$this->load->view('admin/See/Vue_SeeLocal',$data);
	}

	function viewSeeCarte()
	{
		$this->load->model('C_Admin');
		$cartesee=$this->C_Admin->BDD_Carte();	
				$data['ID'] = count($cartesee);
				for($i=0; $i < $data['ID'];$i++){
					$data['Num'][] = array($cartesee[$i]['numero']);
					$data['Identifiant'][] = array($cartesee[$i]['identifiant_carte']);
				}
				$this->load->view('admin/See/Vue_SeeCarte',$data);
	}

	function viewSeeLocalisation()
	{
		$this->load->model('C_Admin');
		$localisationsee=$this->C_Admin->BDD_Localisation();	
				$data['ID'] = count($localisationsee);
				for($i=0; $i < $data['ID'];$i++){
					$data['Etagere'][] = array($localisationsee[$i]['etagere']);
					$data['Position'][] = array($localisationsee[$i]['position']);
				}
				$this->load->view('admin/See/Vue_SeeLocalisation',$data);
	}

	function viewSeeContenant()
	{
		$this->load->model('C_Admin');
		$contenantsee=$this->C_Admin->BDD_Cont();	
				$data['ID'] = count($contenantsee);
				for($i=0; $i < $data['ID'];$i++){
					$data['Nom'][] = array($contenantsee[$i]['Nom_Bouteille']);
					$data['Poids'][] = array($contenantsee[$i]['poids_sans_produit']);
					$data['Max'][] = array($contenantsee[$i]['poids_max']);
				}
				$this->load->view('admin/See/Vue_SeeContenant',$data);
	}


}