<?php


defined('BASEPATH') OR exit ('Ação não permitida!');

class Cadastro extends CI_Controller{
    
    public function __construct3() {
        parent::__construct3();
    }
    
 
    public function index(){
        $this->load->view('cadastro/index');
    }
    
}


