<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    
    public function index() {
        $this->load->view('menuSup');
        $this->load->view('home');
        
    }
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

