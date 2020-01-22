<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autenticar extends CI_Controller
{
    public function logar()
    {
        $this->load->model('usuarios_model');
        $user = $this->input->post('usuario');
        $senha = md5($this->input->post('senha'));
        $usuario = $this->usuarios_model->buscaUser($user, $senha);

        $this->load->model('tecnicos_model');
        $tecnico = $this->tecnicos_model->buscaTodos($user);
     
        if ($tecnico['login'] == strtoupper($user) && $tecnico['senha'] == null ) {
            redirect('cadastro/criaCadastro');
        } elseif ($usuario) {
            $this->session->set_userdata('usuario_log', $usuario);
            redirect('home/index');
        } else {
            $this->session->set_flashdata('danger', 'Usuario ou senha inválido!');

            redirect('/');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('usuario_log');
        redirect('/');
    }

    public function cadastrar()
    {
        $this->load->model('usuarios_model');      
        $senha = $this->input->post('senha');     

        $this->load->model('usuarios_model');
        $verificaUser = $this->usuarios_model->verificaUser();


        if ($senha == null) {
            $this->session->set_flashdata('danger', 'Todos os campos devem estar preenchidos!');
            redirect('cadastro/criaCadastro');
        } else {           
            $this->session->set_flashdata('success', 'Usuario cadastrado com sucesso!');
            $usuario = $this->usuarios_model->cadastraUsuario($senha);
            redirect('/');
        }
    }
}
