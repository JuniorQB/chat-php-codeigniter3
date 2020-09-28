<?php

/**
 * Método Model para tratar com a tabela users 
 */
class UserModel extends CI_Model
{
     private $user = 'users';

     /**
      * retorna todos os usuários cadastrados
      */
     public function getAll(){
      return $this->db->get($this->user)->result();
     }

     /**
      * @param string nickname
      * 
      * retorna cadastro do usuário
      */
     public function findByNickName($nickname){
        $this->db->where('nickname', $nickname);
        return $this->db->get($this->user)->result();
      }

      /**
      * @param int id do usuário
      * 
      * retorna cadastro do usuário
      */
      public function findById($iduser){
        $this->db->where('iduser', $iduser);
        return $this->db->get($this->user)->result();
      }

      /**
       * @param array $dados
       * 
       * Método para salvar o usuário
       */
      public function save($dados = array()){
        
        $this->db->insert($this->user, $dados);
        return $this->db->insert_id();
        
      }
      
}