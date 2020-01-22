<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estoque extends CI_Controller
{

    public function estoqueMiscelaneas()
    {
        $usuarioLogado = $this->session->userdata("usuario_log");
        if (!$usuarioLogado) {
            redirect("/");
        } else {
            $usuario = $this->session->userdata('usuario_log');

            $cidade = $this->input->get('selecionaCidade');

            $this->load->model('estoque_model');
            $estoque = $this->estoque_model->buscaMiscelaneas($cidade);

            $cidades = $this->estoque_model->cidadesEstoque($usuario['ddd']);

            $dados = array('estoque' => $estoque, 'cidades' => $cidades, 'cidadeEscolhida' => $cidade);

            $this->estoque_model->trataSaldoNegativo();
            $this->load->helper('formataMoeda');
            $this->load->template('telas/estoqueMiscelaneas', $dados);
        }
    }
}
