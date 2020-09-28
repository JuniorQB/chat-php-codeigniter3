<?php

/**
 * Classe Model para mensagens 
 */
class MensagemModel extends CI_Model
{
     private $mensagem = 'mensagens';

     /**
      * @param mixed $user_id
      * @param mixed $user_to
      * 
      * retorna todos as mensagens enviadas e recebidas por um iduser
      */
     public function getAll($user_id, $user_to){
      $condicao1 = '(iduser_from='.$user_id .' and iduser_to='.$user_to.')';
      $condicao2 = '(iduser_from='.$user_to .' and iduser_to='.$user_id.')';
      $this->db->where($condicao1);
      $this->db->or_where($condicao2);
      $this->db->order_by('idmensagem');
      return $this->db->get($this->mensagem)->result();
     }

     
      /**
       * @param mixed $idmensagem
       * 
       * Método para buscar por id da mensagem
       */
      public function findById($idmensagem){
        $this->db->where('idmensagem', $idmensagem);
        return $this->db->get($this->mensagem)->result();
      }

      /**
       * @param array $dados enviado pelo Controller Mensagem
       * 
       * Método para salvar as mensagens
       */
      public function save($dados = array()){
        
        $this->db->insert($this->mensagem, $dados);
        return $this->db->insert_id();
      }

      /**
       * @param int id da mensagem
       * 
       * Método para excluir as mensagens
       */
      public function delete($idmensagem){
        $this->db->where('idmensagem', $idmensagem);
        return $this->db->delete($this->mensagem);
        
        
        
      }
      
}