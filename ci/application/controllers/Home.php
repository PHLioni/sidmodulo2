<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $usuarioLogado = $this->session->userdata("usuario_log");
        if (!$usuarioLogado) {
            redirect("/");
        }
        $usuario = $this->session->userdata('usuario_log');
        $this->load->model('Pedidos_model');
        $pedidosHome = $this->Pedidos_model->pedidosHome($usuario['ddd'], $usuario['login']);
        $nome = $usuario['nome'];
        $dados = array('pedidosHome' => $pedidosHome, 'nome' => $nome);
        $this->load->helper('formataTextos');
        $this->load->helper('formataData');
        
        $this->load->template('telas/home', $dados);
    }
}
