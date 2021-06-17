<?php

define('BASEPATH') OR exit('Ação não permitida');

class Core_model extends CI_Model{
    
    //função responsável por coletar todos os dados de uma determinada tabela
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
    
    //função responsável por coletar todos os dados por ID
    public function get_by_id($tabela = NULL, $condicao = NULL) {
        
        if($tabela && is_array($condicao)){
            
            $this->db->where-($condicao);
            $this->db->limit(1);
            
            return $this->db->get($tabela)->row();
            
        }else{
            return FALSE;
        }
        
    }
    
    //função responsável por inserir dados em uma tabela
    public function insert($tabela = NULL, $data = NULL, $get_last_id = NULL) {
        
        if($tabela && is_array($data)){
            
            $this->db->insert($tabela, $data);
            
            if($get_last_id){
                
                $this->session->set_userdata('last_id', $this->db->insert_id());
                
            }
            
            if($this->db->affected_rows()>0){
                
                $this->session->set_flashdata('sucesso', 'Dados Salvos com sucesso!');
                
            }else{
                
                $this->session->set_flashdata('error', 'Erro ao salvar dados!');
            
                
            }
            
        }else{
            
        }
        
    }
    
    //função responsável por alterar dados em uma tabela
    public function update($tabela = NULL, $data = NULL, $condicao = NULL) {
        
        if($tabela && is_array($data) && is_array($condicao)){
            
            if($this->db->update($tabela, $data, $condicao)){
                
                $this->session->set_flashdata('sucesso', 'Dados Alterados com sucesso!');
                
            }else{
                
                $this->session->set_flashdata('error', 'Erro ao atualizar dados!');
                
            }
            
        }else{
            
            return FALSE;
        }
        
    }
    
    public function delete($tabela = NULL, $condicao = NULL) {
        
        $this->db->db_debug = FALSE;
        
        if($tabela && is_array($condicao)){
            
            $status = $this->db->delete($tabela, $condicao);
            
            $error = $this->db->error();
            
            if(!$status){
                
                foreach($error as $code){
                    if($code == 1451){
                        
                        $this->session->set_flashdata('error', 'Esse registro está sendo utilizado e não pode ser excluído!');
                        
                    }
                }
                
            }else{
                
                $this->session->set_flashdata('sucesso', 'O item foi excluído!');
                
            }
            
            $this->db->db_debug = TRUE;
            
        }else{
            
            return FALSE;
            
        }
        
    }
    
}