<?php
/**
 * Class User
 */
class User extends CI_Controller

{

    /**
     * Construtor Classe User
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('UserModel', 'user');
        $this->load->model('MensagemModel', 'mensagem');
    }

    /**
     * Método para entrar no Chat. 
     * Recebe o id do usuário que envia 
     * Recebe o id do usuário que será envido a mensagem
     * 
     * View: Conversa
     * 
     * @access public
     */
    public function entrarChat()
    {
        
        $user_id = $this->input->post('user_id');
        $user_id_conversa = $this->input->post('user_id_conversa');
        $dados = array();
        $dados = $this->user->findById($user_id);
        $userconversa = $this->user->findById($user_id_conversa);
        $mensagens = $this->mensagem->getAll($user_id, $user_id_conversa);
        
        $this->template->load('template_padrao', 'conversa', 
        array(
            'dados'=>$dados, 
            'userconversa' => $userconversa,
            'mensagens' => $mensagens
        ));
    }

}