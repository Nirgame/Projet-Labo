<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Accueil extends CI_Controller {

    function viewAccueil()
	{
		$this->load->view('Vue_Accueil');
	}

    function viewAdmin()
    {
        $this->load->view('admin/Vue_Admin');
    }

}