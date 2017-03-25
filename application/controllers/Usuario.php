<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author Thiago A
 */
class Usuario extends CI_Controller {

    //put your code here

    public function inserir() {

        $tipo = $this->input->post('tipo_usuario');
        $nome = $this->input->post('nome');
        $idade = $this->input->post('idade');
        $email = $this->input->post('email');
        $senha = sha1($this->input->post('senha'));

        if ($this->input->post('matricula') != null) {
            $matricula = $this->input->post('matricula');

            if ($tipo == "professor") {
                $data = array(
                    'nome' => $nome,
                    'idade' => $idade,
                    'email' => $email,
                    'matricula' => $matricula,
                    'senha' => $senha,
                    'nivel' => 3
                );
                if ($this->db->insert('usuario', $data) == FALSE) {
                    $this->load->library('session');
                    $this->session->set_userdata('SESSION_ERRO_CADASTRO_USUARIO', $data);

                    header("Location: cadastro");
                } else {
                    $this->load->library('session');
                    $this->session->set_userdata('SESSION_FEZ_CADASTRO', $data);

                    header("Location: login");
                }
            } else {
                $data = array(
                    'nome' => $nome,
                    'idade' => $idade,
                    'email' => $email,
                    'matricula' => $matricula,
                    'senha' => $senha,
                    'nivel' => 2
                );

                if ($this->db->insert('usuario', $data) == FALSE) {

                    $this->load->library('session');
                    $this->session->set_userdata('SESSION_ERRO_CADASTRO_USUARIO', $data);

                    header("Location: cadastro");
                } else {
                    $this->load->library('session');
                    $this->session->set_userdata('SESSION_FEZ_CADASTRO', $data);

                    header("Location: login");
                }
            }
        } else {
            $data = array(
                'nome' => $nome,
                'idade' => $idade,
                'email' => $email,
                'senha' => $senha,
                'nivel' => 1
            );

            if ($this->db->insert('usuario', $data) == FALSE) {

                $this->load->library('session');
                $this->session->set_userdata('SESSION_ERRO_CADASTRO_USUARIO', $data);

                header("Location: cadastro");
            } else {
                $this->load->library('session');
                $this->session->set_userdata('SESSION_FEZ_CADASTRO', $data);

                header("Location: login");
            }
        }
    }

    public function perfil() {
        $nome = $_GET['nome'];

        $data['usuario'] = $this->db->get_where('usuario', array('nome' => $nome))->result();
        $this->load->view('site/perfil', $data);
    }

    public function aceitar_aluno() {
        $this->load->view('sistema/aceitar_aluno');
    }

    public function lista_alunos() {
        $id_projeto = $_GET['token'];

        $data['usuario'] = $this->db->get_where('usuario', array('nivel' => 2))->result();
        $data['users_projeto'] = $this->db->get_where('usuario_projeto', array('id_projeto' => $id_projeto))->result();
        
        $data['candidatos'] = $this->db->get_where('usuario', array('candidato_projeto_id' => $id_projeto))->result();
        

        $this->load->view('sistema/lista_usuarios_sistema', $data);
    }
    
    public function lista_professores(){
        $id_projeto = $_GET['token'];
        $data['usuario'] = $this->db->get_where('usuario', array('nivel' => 3))->result();
        $data['users_projeto'] = $this->db->get_where('usuario_projeto', array('id_projeto' => $id_projeto))->result();

        $this->load->view('sistema/lista_professores', $data);
    }

    public function adicionar_a_projeto() {
        $id_usuario = $this->input->post('id_usuario');
        $id_projeto = $this->input->post('id_projeto');
        //echo $id_usuario . ' \ ' . $id_equipe;


        $data = array(
            'id_usuario' => $id_usuario,
            'id_projeto' => $id_projeto
        );

        if ($this->db->insert('usuario_projeto', $data)) {
            header("Location: edicao-projeto");
        }
    }
    
    public function definir_orientador(){
        $idusuario = $this->input->post('id_usuario');
        $idprojeto = $this->input->post('id_projeto');
        
        if ($this->db->set('id_orientador', $idusuario)->where('idprojeto', $idprojeto)->update('projeto')) {
            //header("Location: meu-projeto");
            self::adicionar_a_projeto();
        }                
    }
    
    public function definir_lider(){
        $id_usuario = $_GET['token'];
        $id_projeto = $_GET['clue'];
        if ($this->db->set('id_lider', $id_usuario)->where('idprojeto', $id_projeto)->update('projeto')) {
            header("Location: edicao-projeto");
        }
    }

    public function recusar_a_projeto() {
        $id_usuario = $this->input->post('id_usuario');
        if ($this->db->set('candidato_projeto_id', 0)->where('idusuario', $id_usuario)->update('usuario')) {
            /*$data['projetos'] = $this->db->get('projeto')->result();
            $this->load->view('sistema/lista_sistema', $data);*/
            header("Location: edicao-projeto");
        }
    }

    public function candidatar() {

        $id_projeto = $this->input->post('id_projeto');
        $id_usuario = $_SESSION['SESSION_USUARIO']['id_usuario'];//$_SESSION['SESSION_USUARIO']['id_usuario']
        //$data['candidatos'] = $this->db->get_where('usuario', array('candidato_projeto_id' => $id_projeto))->result();

        if ($this->db->set('candidato_projeto_id', $id_projeto)->where('idusuario', $id_usuario)->update('usuario')) {
            $this->load->library('session');
            $_SESSION['SESSION_USUARIO']['candidato_projeto_id'] = $id_projeto;
            $data['projetos'] = $this->db->order_by("idprojeto", "desc")->get('projeto')->result();
            $this->load->view('sistema/lista_sistema', $data);
        }
    }

    public function tirar_aluno_do_projeto() {
        $id_usuario = $_GET["idusuario"];
        $id_projeto = $_GET["idprojeto"];

        if ($this->db->delete('usuario_projeto', array('id_usuario' => $id_usuario, 'id_projeto' => $id_projeto))) {
            //header("Location: projetos-lista");
            header("Location: edicao-projeto");
        }
    }

    public function view_cadastrar() {
        $this->load->view('site/cadastrar_usuario');
    }

    public function view_editar_dados() {
        $this->load->library('session');
        $id_usuario = $_SESSION['SESSION_USUARIO']['id_usuario'];
        $data['usuario'] = $this->db->get_where('usuario', array('idusuario' => $id_usuario))->result();
        $this->load->view('sistema/editar_dados_usuario', $data);
    }

    public function editar_dados() {

        $this->load->library('session');
        $id_usuario = $_SESSION['SESSION_USUARIO']['id_usuario'];

        $nova_senha = $this->input->post('nova_senha');
        $repetir_nova_senha = $this->input->post('repetir_nova_senha');

        $foto = $_FILES['foto']['tmp_name'];
        $tamanho = $_FILES['foto']['size'];
        $tipo = $_FILES['foto']['type'];
        $nome = $_FILES['foto']['name'];

        if ($foto != null) {
            $fp = fopen($foto, "rb");
            $conteudo = fread($fp, $tamanho);
            fclose($fp);

            if ($nova_senha != null && $repetir_nova_senha != null) {
                $data = array(
                    'foto' => $conteudo,
                    'nome' => $this->input->post('nome'),
                    'idade' => $this->input->post('idade'),
                    'email' => $this->input->post('email'),
                    'lattes' => $this->input->post('lattes'),
                    'github' => $this->input->post('github'),
                    'senha' => sha1($nova_senha)
                );

                if ($this->db->update('usuario', $data, "idusuario = $id_usuario")) {
                    header('Location: editar-dados');
                }
            } else {
                $data = array(
                    'foto' => $conteudo,
                    'nome' => $this->input->post('nome'),
                    'idade' => $this->input->post('idade'),
                    'email' => $this->input->post('email'),
                    'lattes' => $this->input->post('lattes'),
                    'github' => $this->input->post('github')
                );

                if ($this->db->update('usuario', $data, "idusuario = $id_usuario")) {
                    header('Location: editar-dados');
                }
            }
        } else {

            if ($nova_senha != null && $repetir_nova_senha != null) {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'idade' => $this->input->post('idade'),
                    'email' => $this->input->post('email'),
                    'lattes' => $this->input->post('lattes'),
                    'github' => $this->input->post('github'),
                    'senha' => sha1($nova_senha)
                );

                if ($this->db->update('usuario', $data, "idusuario = $id_usuario")) {
                    header('Location: editar-dados');
                }
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'idade' => $this->input->post('idade'),
                    'email' => $this->input->post('email'),
                    'lattes' => $this->input->post('lattes'),
                    'github' => $this->input->post('github')
                );

                if ($this->db->update('usuario', $data, "idusuario = $id_usuario")) {
                    header('Location: editar-dados');
                }
            }
        }
    }

    public function filtrar() {
        $palavraFiltro = $this->input->post('filtrar_usuario');

        $this->db->or_like(array('nome' => $palavraFiltro, 'email' => $palavraFiltro, 'matricula' => $palavraFiltro, 'lattes' => $palavraFiltro, 'github' => $palavraFiltro));
        $data['usuario'] = $this->db->get_where('usuario', array('nivel' => 2))->result();

        $this->load->view('sistema/usuario_filtrado', $data);
    }
    
    public function filtrar_professor() {
        $palavraFiltro = $this->input->post('filtrar_usuario');

        $this->db->or_like(array('nome' => $palavraFiltro, 'email' => $palavraFiltro, 'matricula' => $palavraFiltro, 'lattes' => $palavraFiltro, 'github' => $palavraFiltro));
        $data['usuario'] = $this->db->get_where('usuario', array('nivel' => 3))->result();

        $this->load->view('sistema/filtrar_professor', $data);
    }

}
