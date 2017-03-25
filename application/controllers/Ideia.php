<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ideia
 *
 * @author Thiago A
 */
class Ideia extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function view_formulario() {
        $this->load->view('site/cadastrar_ideia2');
    }

    public function inserir() {
        $this->load->library('session');

        if (isset($_SESSION['SESSION_ENVIAR_IDEIA'])) {
            $data = array(
                'vinculada' => $_SESSION['SESSION_ENVIAR_IDEIA']['vinculada'],
                'categoria' => $_SESSION['SESSION_ENVIAR_IDEIA']['categoria'],
                'plataforma' => $_SESSION['SESSION_ENVIAR_IDEIA']['plataforma'],
                'publico' => $_SESSION['SESSION_ENVIAR_IDEIA']['publico'],
                'motivo' => $_SESSION['SESSION_ENVIAR_IDEIA']['motivo'],
                'sobre' => $_SESSION['SESSION_ENVIAR_IDEIA']['sobre'],
                'palavras_chaves' => $_SESSION['SESSION_ENVIAR_IDEIA']['palavras_chaves'],
                'status' => "0",
                'id_usuario' => $_SESSION['SESSION_USUARIO']['id_usuario']
            );
            
            $this->db->insert('ideia', $data);
            
            //$this->session->unset_userdata('SESSION_ENVIAR_IDEIA');
            header("Location: minha-ideia");
            
        } else {

            $vinculado = $this->input->post('vinculada');

            $categoria_form = $this->input->post('categoria[]');
            $outra_categoria = $this->input->post('outra_categoria');

            $plataforma_form = $this->input->post('plataforma');
            $outra_plataforma = $this->input->post('outra_plataforma');

            $publico_form = $this->input->post('publico');
            $outro_publico = $this->input->post('outro_publico');

            $categoria = '';
            $plataforma = '';
            $publico = '';

            for ($i = 0; $i < count($categoria_form); $i++) {
                if ($i == 0) {
                    $categoria .= $categoria_form[$i];
                } else {
                    if ($categoria_form[$i] == "outraCategoria") {
                        $categoria .= ", " . $outra_categoria;
                    } else {
                        $categoria .= ", " . $categoria_form[$i];
                    }
                }
            }


            for ($i = 0; $i < count($plataforma_form); $i++) {
                if ($i == 0) {
                    $plataforma .= $plataforma_form[$i];
                } else {
                    if ($plataforma_form[$i] == "outraPlataforma") {
                        $plataforma .= ", " . $outra_plataforma;
                    } else {
                        $plataforma .= ", " . $plataforma_form[$i];
                    }
                }
            }


            for ($i = 0; $i < count($publico_form); $i++) {
                if ($i == 0) {
                    $publico .= $publico_form[$i];
                } else {
                    if ($publico_form[$i] == "outroPublico") {
                        $publico .= ", " . $outro_publico;
                    } else {
                        $publico .= ", " . $publico_form[$i];
                    }
                }
            }

            $motivo = $this->input->post('motivo');
            $sobre = $this->input->post('sobre');
            $palavras_chaves = $this->input->post('palavras_chaves');

            //echo $vinculado . "<br>" . $categoria . "<br>" . $plataforma . "<br>" . $publico . "<br>" . $motivo . "<br>" . $sobre . "<br>" . $palavras_chaves;

            /*
              echo $categoria;
              echo '<br>';
              echo $plataforma;
              echo '<br>';
              echo $publico; */
            $id_usuario = 0;
            $this->load->library('session');
            
            if (isset($_SESSION['SESSION_USUARIO'])) {
                $id_usuario = $_SESSION['SESSION_USUARIO']['id_usuario']; //ta logado
            }
            //isset($_SESSION['SESSION_USUARIO'])

            $data = array(
                'vinculada' => $vinculado,
                'categoria' => $categoria,
                'plataforma' => $plataforma,
                'publico' => $publico,
                'motivo' => $motivo,
                'sobre' => $sobre,
                'palavras_chaves' => $palavras_chaves,
                'status' => "0",
                'id_usuario' => $id_usuario
            );
            
            $this->load->library('session');

            if (isset($_SESSION['SESSION_USUARIO'])) {
                $this->db->insert('ideia', $data);
                //$this->session->set_userdata('SESSION_ENVIAR_IDEIA', $data_session);
                header("Location: minha-ideia");
            } else {
                //$this->load->library('session');
                
                //iniciei a seção com os dados para, depois do login, recuperalos e inserir

                $data_session = array(
                    'vinculada' => $vinculado,
                    'categoria' => $categoria,
                    'plataforma' => $plataforma,
                    'publico' => $publico,
                    'motivo' => $motivo,
                    'sobre' => $sobre,
                    'palavras_chaves' => $palavras_chaves,
                    'status' => "0",
                    'id_usuario' => $id_usuario
                );

                $this->session->set_userdata('SESSION_ENVIAR_IDEIA', $data_session);

                $this->load->view('site/view_login');
            }
            
            //header("Location: minha-ideia");
        }
    }

    public function avaliar() {
        $data['ideia'] = $this->db->get_where('ideia', array('status' => "1"))->result();
        $this->load->view('sistema/avaliar_ideia', $data);
    }

    public function aprovar() {
        $ideia = $_GET['email'];

        $data = array(
            'status' => "0"
        );

        $this->db->set('status', "0")->where('email', $ideia)->update('ideia');

        self::avaliar();
    }

    public function ideias_disponiveis() {
        //$data['ideias'] = $this->db->order_by("id","desc")->get_where('ideia', array('status' => "0"))->result();
        $data['ideias'] = $this->db->order_by("id", "desc")->get('ideia')->result();
        $this->load->view('sistema/ideias_disponiveis', $data);
    }

    public function teste() {
        $this->load->view('teste');
    }

    public function davi() {
        $this->load->view('davi');
    }

    public function view_mensagem_feedback() {
        $this->load->view('sistema/mensagem_ideia');
    }

    public function recusar_ideia() {
        $id_ideia = $this->input->post('id_ideia');
        $feedback = $this->input->post('feedback');
        $array = array('status' => 1, 'feedback' => $feedback);
        $this->db->set($array)->where('id', $id_ideia)->update('ideia');
        header("Location: ideias-disponiveis");
    }

}
