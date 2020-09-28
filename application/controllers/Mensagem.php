<?php
/**
 * Class Mensagem
 * Classe trata as mensagens do chat
 */
class Mensagem extends CI_Controller

{

    /**
     * Construtor Class Mensagem
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('MensagemModel', 'mensagem');
    }

   

    
    /**
     * Método salva as mensagens enviadas pelo chat - View: conversa
     * @access public
     */
    public function salvarMensagem(){
        $dados = array();
        $dados['iduser_from'] = $this->input->post('iduser_from');
        $dados['iduser_to'] = $this->input->post('iduser_to'); 
        $dados['mensagem'] = $this->input->post('mensagem'); 

        echo $this->mensagem->save($dados);
        
    }

    /**
     * Método exclui as mensagens do chat - View: conversa
     * @access public
     */
    public function excluirMensagem(){
      
      $idmensagem = $this->input->post('idmensagem'); 

      echo $this->mensagem->delete($idmensagem);
      
  }
}