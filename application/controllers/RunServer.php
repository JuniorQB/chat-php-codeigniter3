<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe reponsável por iniciar o sever
 */
class RunServer extends CI_Controller
{

    /**
     * Carrega os pacotes websocket
     * inicia o server
     */
    public function index()
    {
        
        $this->load->add_package_path(FCPATH . 'vendor/takielias/codeigniter-websocket');
        $this->load->library('Codeigniter_websocket');
        $this->load->remove_package_path(FCPATH . 'vendor/takielias/codeigniter-websocket');

        
        $this->codeigniter_websocket->set_callback('auth', array($this, '_auth'));
        $this->codeigniter_websocket->set_callback('event', array($this, '_event'));
        $this->codeigniter_websocket->run();
    }


    /**
     * 
     * Método responsável por verificar os requisitps para o login do usuário
     * 
     */
    public function _auth($datas = null)
    {
        
        return (!empty($datas->user_id)) ? $datas->user_id : false;
    }

    /**
     * Método para tratar das mensagens recebidas
     */
    public function _event($datas = null)
    {
        
        echo 'Hey ! I\'m an EVENT callback' . PHP_EOL;
    }

}
