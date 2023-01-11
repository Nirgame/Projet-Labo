<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_View extends CI_Controller {
	function __construct() 

	{
				   parent::__construct(); 
				   $this->load->helper('url'); 
	}

	public function index()
	{
				$this->load->view('login');
			
	}
	
	public function login()
	{
		$this->load->model('C_Login');
			$login['id'] = $_POST["identifiant"];
			$login['mdp'] = hash('sha256',$_POST["password"]);
			$result = $this->C_Login->Login($login);
			if ($result != NULL) {
			$log = $result[0]['poste'];
			
			if ($log == 'admin'){
				$this->load->view('admin/Vue_Admin');
			}
			else if ($log != NULL){
				$this->load->view('Vue_Accueil');
			}
		}
			else {
				?>
				<script>
					alert('Identifiants incorects');
				</script>
				<?php
				$this->load->view('login');
			}
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
			$this->C_Maj->ModifProduit($newdata);
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
			$this->load->view('Vue_Maj', $datas);
			$this->load->view('Vue_Maj_Modif',$data);


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

			$this->load->view('Vue_Maj', $datas);
			$this->load->view('Vue_Maj_Modif',$data);		
		}
		else {
		$this->load->view('Vue_Maj', $datas);
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
				$this->load->view('Vue_Stock',$dataloc);
				if ($stockageloc != NULL){		
				$data['ID'] = count($stockageloc);
				for($i=0; $i < $data['ID'];$i++){
					$data['Nom'][] = array($stockageloc[$i][0]['nom']);
					$data['Poids'][] = array($stockageloc[$i][0]['poids']);
					$data['Dangeureux'][] = array($stockageloc[$i][0]['dangeureux']);
					$data['Quantité'][] = array($stockageloc[$i][0]['quantité_bouteille']);
					$data['Local'][] = array($stockageloc[$i][0]['Nom']);
					}
				$this->load->view('Vue_Stockage', $data);
				}
			}
            	// ----- si on demande tout -----
			else{
				$stockageloc=$this->C_Stock->RecupTout();
				$this->load->view('Vue_Stock',$dataloc);		
				$data['ID'] = count($stockageloc);
				for($i=0; $i < $data['ID'];$i++){
					$data['Nom'][] = array($stockageloc[$i][0]['nom']);
					$data['Poids'][] = array($stockageloc[$i][0]['poids']);
					$data['Dangeureux'][] = array($stockageloc[$i][0]['dangeureux']);
					$data['Quantité'][] = array($stockageloc[$i][0]['quantité_bouteille']);
					$data['Local'][] = array($stockageloc[$i][0]['Nom']);
					}
				$this->load->view('Vue_Stockage', $data);
				}
			}
		// ----- envoie de base -----
		else
		{
		$this->load->view('Vue_Stock',$dataloc);
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
			$this->load->view('Vue_Local',$dataloc);		
			if ($localiseloc != NULL) {
			$data['ID'] = count($localiseloc);
			for($i=0; $i < $data['ID'];$i++){
				$data['idproduit'][] = array($localiseloc[$i][0]['idproduits']);
				$data['Nom'][] = array($localiseloc[$i][0]['nom']);
				}
			$this->load->view('Vue_Localise', $data);
			}
		}
			// ----- produit sélectionné -----
		elseif ($this->input->post('produitL') !=0)
		{
			$produitL = $this->input->post('produitL');
			$localiseprod=$this->C_Local->ProduitDemand($produitL);
			$this->load->view('Vue_Local',$dataloc);	
				$data['idproduit'][] = array($localiseprod[0]['idproduits']);
				$data['Nom'][] = array($localiseprod[0]['nom']);
				$data['Local'][] = array($localiseprod[0]['Nom']);
				$data['Déplacement'][] = array($localiseprod[0]['date_deplacement']);
				$data['Etagère'][] = array($localiseprod[0]['etagere']);
				$data['Position'][] = array($localiseprod[0]['position']);
			$this->load->view('Vue_Localisation', $data);
		}
			// ----- envoie de base -----
		else
		{
			$this->load->view('Vue_Local',$dataloc);
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
			$this->load->view('Vue_Historique',$dataloc);		
			$data['ID'] = count($histo);
			for($i=0; $i < $data['ID'];$i++){
				$data['Nom'][] = array($histo[$i]['nom']);
				$data['Prenom'][] = array($histo[$i]['prenom']);
				$data['Heure_E'][] = array($histo[$i]['heure_E']);
				$data['Heure_S'][] = array($histo[$i]['heure_S']);
				$data['Local'][] = array($histo[$i]['Nom']);
				}
			$this->load->view('Vue_Histo', $data);
			
		}
		else {
		$this->load->view('Vue_Historique',$dataloc);
	}}

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

		$this->load->view('Vue_Ajout', $data);
	
	}

	function logout() 
	{
        $this->load->view('login');
    } 


}
