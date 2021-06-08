<?php

define('BASEPATH') OR exit('Ação não permitida');

class Core_model extends CI_Model{
    
    public function get_all($tabela = NULL, $condicao = NULL) {
        
        if($tabela){
            
            if(is_array($condicao)){
                
                $this->db->where($condicao);
                
            }
            
            return $this->db->get($tabela)->result();
        }else{
            return FALSE;
        }
        
    }
    
    public function get_by_id($tabela = NULL, $condicao = NULL) {
        
        if($tabela && is_array($condicao)){
            
            $this->db->where-($condicao);
            $this->db->limit(1);
            
            return $this->db->get($tabela)->row();
        }else{
            return FALSE;
        }
        
    }
    
}