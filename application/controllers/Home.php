<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/Util.php';

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        /*
          $data['projeto'] = $this->db->order_by("idprojeto","desc")->get_where('projeto', array('publicar' => 1), 4, 0)->result();
          $data['projeto2'] = $this->db->order_by("idprojeto","desc")->get_where('projeto', array('publicar' => 1), 4, 4)->result();
         */

        $data['projeto'] = $this->db->order_by("idprojeto", "desc")->get_where('projeto', array('publicar' => 1), 4, 0)->result();
        $data['projeto2'] = $this->db->order_by("idprojeto", "desc")->get_where('projeto', array('publicar' => 1), 4, 4)->result();

        $data['devs'] = $this->db->order_by("idusuario", "desc")->get_where('usuario', array('nivel' => 2, 'foto !=' => null), 32)->result();

        $this->load->view('home', $data);
    }

    public function view_login() {
        $this->load->view('site/view_login');
    }

    public function fazer_login() {
        $email = $this->input->post('email');
        $senha = sha1($this->input->post('senha'));
        if ($data['usuario_logado'] = $this->db->get_where('usuario', array('email' => $email, 'senha' => $senha))->result()) {
            self::iniciar_sessao($data);
        } else {
            $this->load->library('session');
            $this->session->set_userdata('SESSION_FALHA_LOGIN', $data);
            header("Location: ideias-disponiveis");
        }
    }

    public function iniciar_sessao($data) {
        //echo $data['usuario_logado'][0]->nome;
        $this->load->library('session');

        $data = array(
            'id_usuario' => $data['usuario_logado'][0]->idusuario,
            'nome' => $data['usuario_logado'][0]->nome,
            'nivel' => $data['usuario_logado'][0]->nivel,
            'id_equipe' => $data['usuario_logado'][0]->id_equipe,
            'foto' => $data['usuario_logado'][0]->foto,
            'candidato_projeto_id' => $data['usuario_logado'][0]->candidato_projeto_id
        );

        $this->session->set_userdata('SESSION_USUARIO', $data);

        if (isset($_SESSION['SESSION_ENVIAR_IDEIA'])) {
            header("Location: cadastrar-ideia");
        } else {
            header("Location: ideias-disponiveis");
        }
    }

    public function logoff() {
        $this->load->library('session');
        $this->session->unset_userdata('SESSION_USUARIO');
        $this->session->unset_userdata('SESSION_CHAT');
        header("Location: home");
    }
    
    public function view_sac(){
        $data['sac'] = $this->db->order_by("id", "desc")->get('sac', 10, 0)->result();  
        $this->load->view('sistema/sac', $data);
    }        

    public function sac() {
        
        $data = array(
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'mensagem' => $this->input->post('mensagem')
        );

        if ($this->db->insert('sac', $data)) {
            $this->session->set_userdata('SESSION_ENVIOU_SAC', 'MESAGEM_ENVIADA');
            header("Location: home#contato");
        }
    }

}
