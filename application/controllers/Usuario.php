<?php


defined('BASEPATH') OR exit ('Ação não permitida!');

class Usuario extends CI_Controller{
    
    public function __construct2() {
        parent::__construct2();
    }
    
 
    public function index(){
        $this->load->view('usuario/index');
    }
    
}


