<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Principal 
 * 
 */
class Principal extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('UserModel', 'user');
    }

    /**
     * Carrega a view principal. View principal para escolha do nickname
     * @access public
     */
    public function index()
    {
        $this->template->load('template_padrao', 'principal');
    }


    /**
     * Método para verificar o nickname recebido da view principal.
     * Se o nickname está cadastrado, retorna o ID para iniciar o chat, 
     * se não está cadastrado, salva o nickname e retorna o id cadastrado
     * @access public 
     */
    public function verificar_nickname()
    {

        $this->form_validation->set_rules('nickname', 
			'Nickname', 
			'required|min_length[4]|max_length[15]|callback_verifica_nickname');


            if($this->form_validation->run()==FALSE){
                
                $this->template->load('template_padrao', 'principal');
            } else {
                $dados = array();
                $dados['nickname'] = strtoupper ($this->input->post('nickname'));
                $verificaNickName = $this->user->findByNickName($dados['nickname']);

                if($verificaNickName){
                    
                    redirect('Principal/selecionarConversa/'.$verificaNickName[0]->iduser); 
                } else {
                    $registro = $this->user->save($dados);
                    redirect('Principal/selecionarConversa/'.$registro); 
                }
            }

        
    }

    /**
     * Método responsável por listar outros usuários cadsatrados no banco de dados
     * do chat.
     * @access public 
     */
    public function selecionarConversa() {
        $meuid = $this->uri->segment(3);
        $dados = $this->user->getAll();
        
        $this->template->load('template_padrao', 'selecionarconversa', 
            array(
                'dados'=>$dados,
                'meuid' => $meuid
        ));
    }


    /**
     * Método Callback para verificar se o nickname contém espaços
     * @param mixed $value - Valor do input contendo o nickname
     * @access public 
     * 
     * @return boolean
     */
    public function verifica_nickname($value){
        $partes = explode(" ", $value);
		if(sizeof(array_filter($partes)) > 1){
			$this->form_validation->set_message('verifica_nickname', 'Nickname incorreto');
			return FALSE;
		} else {
			return TRUE;
		}
    }
}
