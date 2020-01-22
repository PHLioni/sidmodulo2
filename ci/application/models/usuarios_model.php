<?php

class Usuarios_model extends CI_Model
{
    public function buscaUser($user, $senha)
    {
        $this->db->where('login', $user);
        $this->db->where('senha', $senha);
        $usuario = $this->db->get('tecnicos')->row_array();
        return $usuario;
    }

    public function cadastraUsuario( $senha)
    {
        $dados = array(
            'senha' => md5($senha)
        );
        return $this->db->update('tecnicos', $dados);
    }

    public function verificaUser()
    {
        return $this->db->query("SELECT usuario FROM usuarios")->result_array();
    }
}
