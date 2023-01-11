<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Login extends CI_Model {

    public function Login($login) {
        $log = $this->db->query("SELECT poste FROM personne WHERE identifiant = '".$login['id']."' AND password = '".$login['mdp']."'");
        $data = $log->result_array();
        return $data;
    }

}