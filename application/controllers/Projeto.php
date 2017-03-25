<?php

class Projeto extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function detalhes() {
        $id_projeto = $_GET['token'];
        $devs['devs'] = $this->db->get_where('usuario_projeto', array('id_projeto' => $id_projeto))->result();
        self::detalhes2($devs['devs']);
    }

    public function detalhes2($users) {
        $id_projeto = $_GET['token'];
        $data['projeto'] = $this->db->get_where('projeto', array('idprojeto' => $id_projeto))->result();
        $data['informacoes'] = $this->db->get_where('informacao', array('id_projeto' => $id_projeto))->result();

        $data['devs'] = [];
        for ($i = 0; $i < count($users); $i++) {
            //echo $users[$i]->id_usuario;        
            array_push($data['devs'], $this->db->get_where('usuario', array('idusuario' => $users[$i]->id_usuario))->result());
        }

        $this->load->view('site/ver_projeto', $data);
    }

    public function lista() {
        $data['projeto'] = $this->db->order_by("idprojeto", "desc")->get_where('projeto', array('publicar' => 1))->result();
        $this->load->view('site/projetos', $data);
    }

    public function lista_sistema() {
        $data['projetos'] = $this->db->order_by("idprojeto", "desc")->get('projeto')->result();
        $this->load->view('sistema/lista_sistema', $data);
    }

    public function search() {
        $palavraFiltro = $_POST['palavra'];
        $this->db->or_like(array('nome' => $palavraFiltro, 'categoria' => $palavraFiltro, 'plataforma' => $palavraFiltro, 'publico' => $palavraFiltro, 'palavras_chaves' => $palavraFiltro));
        $data['projeto'] = $this->db->order_by("idprojeto", "desc")->get('projeto')->result();

        $this->load->view('site/filtro', $data);
    }

    public function aceitar_ideia() {
        $id_ideia = $this->input->post('id_ideia');
        $data = array(
            'categoria' => $this->input->post('categoria'),
            'plataforma' => $this->input->post('plataforma'),
            'publico' => $this->input->post('publico'),
            'sobre' => $this->input->post('sobre'),
            'vinculada' => $this->input->post('vinculada'),
            'motivo' => $this->input->post('motivo'),
            'palavras_chaves' => $this->input->post('palavras_chaves'),
            'id_ideia' => $id_ideia
        );

        if ($this->db->set('status', 2)->where('id', $id_ideia)->update('ideia')) {
            if ($this->db->insert('projeto', $data)) {
                $data['projeto'] = $this->db->get_where('projeto', array('id_ideia' => $id_ideia))->result();
                self::insere_usuario_projeto($data['projeto']);
            }
        }
    }

    public function insere_usuario_projeto($projeto) {
        $data = array(
            'id_usuario' => $this->input->post('id_usuario'),
            'id_projeto' => $projeto[0]->idprojeto
        );

        if ($this->db->insert('usuario_projeto', $data)) {
            header('Location: ideias-disponiveis');
        }
    }

    public function eliminar_session_detalhes() {
        /*
         * Controle de sessão
         */
        $this->load->library('session');
        if (isset($_SESSION['SESSION_PROJETO'])) {
            $this->session->unset_userdata('SESSION_PROJETO');
        }
        self::devs_detalhes_sistema();
    }

    public function eliminar_session_detalhes_visualizar() {
        /*
         * Controle de sessão
         */
        $this->load->library('session');
        if (isset($_SESSION['SESSION_PROJETO_VISUALIZAR'])) {
            $this->session->unset_userdata('SESSION_PROJETO_VISUALIZAR');
        }
        self::resgatar_usuario_projeto();
    }

    public function devs_detalhes_sistema() {
        $this->load->library('session');
        $id_projeto = 0;

        if (isset($_SESSION['SESSION_PROJETO'])) {
            //echo $_SESSION['SESSION_PROJETO']['id_projeto'];
            $id_projeto = $_SESSION['SESSION_PROJETO']['id_projeto'];
        } else {
            $id_projeto = $this->input->post('id_projeto');
            /*
             * Iniciando uma session para continuar editando o projeto
             */
            $data = array('id_projeto' => $id_projeto);
            $this->session->set_userdata('SESSION_PROJETO', $data);
        }


        $users['users'] = $this->db->get_where('usuario_projeto', array('id_projeto' => $id_projeto))->result();
        self::detalhes_sistema($users['users']);
    }

    public function detalhes_sistema($users) {
        $this->load->library('session');
        $id_projeto = 0;

        if (isset($_SESSION['SESSION_PROJETO'])) {
            $id_projeto = $_SESSION['SESSION_PROJETO']['id_projeto'];
        } else {
            $id_projeto = $this->input->post('id_projeto');
        }

        $data['projetos'] = $this->db->get_where('projeto', array('idprojeto' => $id_projeto))->result();

        $data['devs'] = [];
        for ($i = 0; $i < count($users); $i++) {
            array_push($data['devs'], $this->db->get_where('usuario', array('idusuario' => $users[$i]->id_usuario))->result());
        }
        $data['informacoes'] = $this->db->get_where('informacao', array('id_projeto' => $id_projeto))->result();
        $data['iteracoes'] = $this->db->get_where('iteracao', array('id_projeto' => $id_projeto))->result();

        $this->load->view('sistema/detalhes_sistema', $data);
    }

    public function resgatar_usuario_projeto() {
        $this->load->library('session');
        $id_projeto = 0;

        if (isset($_SESSION['SESSION_PROJETO_VISUALIZAR'])) {
            //echo $_SESSION['SESSION_PROJETO']['id_projeto'];
            $id_projeto = $_SESSION['SESSION_PROJETO_VISUALIZAR']['id_projeto'];
        } else {
            /*
             * Query para resgatar os ids dos usuário que tem o mesmo id de projeto na table a usuario_projeto;
             */
            $id_projeto = $this->input->post('id_projeto');
            $data = array('id_projeto' => $id_projeto);
            $this->session->set_userdata('SESSION_PROJETO_VISUALIZAR', $data);
        }

        $users['users'] = $this->db->get_where('usuario_projeto', array('id_projeto' => $id_projeto))->result();
        /*
         * Agora chama a função passando apenas os usuários daquele projeto
         */
        self::visualizar_projeto($users['users']);
    }

    public function visualizar_projeto($users) {
        $this->load->library('session');
        $id_projeto = 0;

        if (isset($_SESSION['SESSION_PROJETO_VISUALIZAR'])) {
            //echo $_SESSION['SESSION_PROJETO']['id_projeto'];
            $id_projeto = $_SESSION['SESSION_PROJETO_VISUALIZAR']['id_projeto'];
        } else {
            $id_projeto = $this->input->post('id_projeto');
        }

        $data['devs'] = [];
        /*
         * Faço um for para acessar o id de cada um dos usuários passados
         */
        for ($i = 0; $i < count($users); $i++) {
            //echo $users[$i]->id_usuario;        
            array_push($data['devs'], $this->db->get_where('usuario', array('idusuario' => $users[$i]->id_usuario))->result());
        }

        $data['projetos'] = $this->db->get_where('projeto', array('idprojeto' => $id_projeto))->result();

        $data['informacoes'] = $this->db->get_where('informacao', array('id_projeto' => $id_projeto))->result();
        $data['iteracoes'] = $this->db->get_where('iteracao', array('id_projeto' => $id_projeto))->result();

        $this->load->view('sistema/visualizar_projeto', $data);
    }

    public function atualizar() {
        $id_projeto = $this->input->post('id_projeto');

        $logo = $_FILES['logo']['tmp_name'];
        $tamanho = $_FILES['logo']['size'];
        $tipo = $_FILES['logo']['type'];
        $nome = $_FILES['logo']['name'];

        if ($logo != null) {
            $fp = fopen($logo, "rb");
            $conteudo = fread($fp, $tamanho);
            fclose($fp);

            $data = array(
                'logo' => $conteudo,
                'nome' => $this->input->post('nome'),
                'categoria' => $this->input->post('categoria'),
                'plataforma' => $this->input->post('plataforma'),
                'publico' => $this->input->post('publico'),
                'sobre' => $this->input->post('sobre'),
                'vinculada' => $this->input->post('vinculada'),
                'motivo' => $this->input->post('motivo'),
                'palavras_chaves' => $this->input->post('palavras_chaves'),
                'texto_inicial' => $this->input->post('texto_inicial'),
                'descricao' => $this->input->post('descricao'),
            );

            if ($this->db->update('projeto', $data, "idprojeto = $id_projeto")) {
                header('Location: edicao-projeto');
            }
        } else {
            $data = array(
                'nome' => $this->input->post('nome'),
                'categoria' => $this->input->post('categoria'),
                'plataforma' => $this->input->post('plataforma'),
                'publico' => $this->input->post('publico'),
                'sobre' => $this->input->post('sobre'),
                'vinculada' => $this->input->post('vinculada'),
                'motivo' => $this->input->post('motivo'),
                'palavras_chaves' => $this->input->post('palavras_chaves'),
                'texto_inicial' => $this->input->post('texto_inicial'),
                'descricao' => $this->input->post('descricao'),
            );

            if ($this->db->update('projeto', $data, "idprojeto = $id_projeto")) {
                header('Location: edicao-projeto');
            }
        }
    }

    public function chat() {
        $this->load->library('session');
        $id_projeto = 0;

        if (isset($_SESSION['SESSION_CHAT'])) {
            $id_projeto = $_SESSION['SESSION_CHAT']['id_projeto'];
            $this->session->unset_userdata('SESSION_CHAT');
        } else {
            $id_projeto = $this->input->post('token');
        }

        $data['chat'] = $this->db->get_where('chat', array('id_projeto' => $id_projeto))->result();
        self::usuario_mensagem($data);
    }

    public function usuario_mensagem($data) {
        $id_projeto = $this->input->post('token');
        $chat['foto'] = 0;
        $chat['mensagem'] = 0;

        $fotos = array();
        $mensagens = array();

        foreach ($data['chat'] as $row) {
            $this->db->select('foto');
            array_push($fotos, $this->db->get_where('usuario', array('idusuario' => $row->id_usuario))->result());
            array_push($mensagens, $row->mensagem);
        }

        $chat['foto'] = $fotos;
        $chat['mensagem'] = $mensagens;
        $chat['id_projeto'] = $id_projeto;

        $this->load->view('sistema/chat', $chat);
    }

    public function mensagem() {
        $id_projeto = $this->input->post('token');
        echo $id_projeto;

        if ($id_projeto != 0) {

            $this->load->library('session');
            $data_session = array(
                'id_projeto' => $id_projeto,
            );

            $this->session->set_userdata('SESSION_CHAT', $data_session);

            $data = array(
                'mensagem' => $this->input->post('mensagem'),
                'id_projeto' => $id_projeto,
                'id_usuario' => $_SESSION['SESSION_USUARIO']['id_usuario']
            );

            $this->db->insert('chat', $data);
            self::chat();
        } else {
            header('Location: meu-projeto');
        }
    }

    public function view_adicionar_informacao() {
        $data['id_projeto'] = $_GET['token'];
        $this->load->view('sistema/adicionar_informacao', $data);
    }

    public function add_informacao() {
        $imagem = $_FILES['imagem']['tmp_name'];
        $tamanho = $_FILES['imagem']['size'];
        $tipo = $_FILES['imagem']['type'];
        $nome = $_FILES['imagem']['name'];

        if ($imagem != null) {
            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            //$conteudo = addslashes($conteudo);
            fclose($fp);

            $data = array(
                'texto' => $this->input->post('texto'),
                'id_projeto' => $this->input->post('id_projeto'),
                'foto' => $conteudo
            );

            $this->db->insert('informacao', $data);
        } else {
            $data = array(
                'texto' => $this->input->post('texto'),
                'id_projeto' => $this->input->post('id_projeto'),
            );

            $this->db->insert('informacao', $data);
        }
        header("Location: edicao-projeto");
    }

    public function view_adicionar_iteracao() {
        $data['id_projeto'] = $_GET['id'];
        $this->load->view('sistema/adicionar_iteracao', $data);
    }

    public function baixar_arquivo() {
        echo $arquivo = $_GET["arquivo"];
    }

    public function add_iteracao() {

        if (isset($_FILES['arquivo'])) {

            /* $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
              if($extensao == ".pdf"){
              $arquivo = $_FILES['arquivo']['name'];
              $diretorio = "assets/arquivos_pdf/";
              move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$arquivo);
              } */


            date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

            $ext = strtolower(substr($_FILES['arquivo']['name'], -4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = 'assets/arquivos_pdf/'; //Diretório para uploads

            move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo            

            $data = array(
                'arquivo' => $new_name,
                'titulo' => $this->input->post('titulo'),
                'id_projeto' => $this->input->post('id_projeto'),
                'data' => date("Y-m-d")
            );

            $this->db->insert('iteracao', $data);
            header("Location: edicao-projeto");
        } else {

            $data = array(
                'titulo' => $this->input->post('titulo'),
                'id_projeto' => $this->input->post('id_projeto'),
                'data' => date("Y-m-d")
            );

            $this->db->insert('iteracao', $data);
            header("Location: edicao-projeto");
        }
    }

    public function publicar_projeto() {
        $idprojeto = $this->input->post('id_projeto_publicar');
        if ($this->db->set('publicar', "1")->where('idprojeto', $idprojeto)->update('projeto')) {
            header("Location: edicao-projeto");
        }
    }

    public function resgatar_id_projeto() {
        $id_usuario = $_SESSION['SESSION_USUARIO']['id_usuario'];
        $projetos['projetos'] = $this->db->get_where('usuario_projeto', array('id_usuario' => $id_usuario))->result();
        self::meu_projeto($projetos['projetos']);
    }

    public function meu_projeto($projetos) {
        $data['projetos'] = [];
        for ($i = 0; $i < count($projetos); $i++) {
            array_push($data['projetos'], $this->db->get_where('projeto', array('idprojeto' => $projetos[$i]->id_projeto))->result());
        }

        $this->load->view('sistema/meus_projetos', $data);
    }

    public function minha_ideia() {
        if (isset($_SESSION['SESSION_USUARIO'])) {
            $id_usuario = $_SESSION['SESSION_USUARIO']['id_usuario'];
            $data['ideias'] = $this->db->get_where('ideia', array('id_usuario' => $id_usuario))->result();
            $this->load->view('sistema/minha_ideia', $data);
        } else {
            header("Location: login");
        }
    }

    public function projeto_concluido() {
        $idprojeto = $this->input->post('id_projeto_concluido');
        if ($this->db->set('concluido', "1")->where('idprojeto', $idprojeto)->update('projeto')) {
            header("Location: projetos-lista");
        }
    }

}
