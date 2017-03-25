<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
//require_once(APPPATH.'controllers/Home.php');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['lista-de-projetos'] = "Projeto/lista";
$route['filtrar'] = "Projeto/search";
$route['perfil'] = "Usuario/perfil";
$route['teste'] = "Ideia/teste";
$route['davi'] = "Ideia/davi";

$route['enviar-ideia'] = "Ideia/view_formulario";
$route['enviar'] = "Ideia/inserir";
$route['ideias-disponiveis'] = "Ideia/ideias_disponiveis";
$route['aceitar-aluno'] = "Usuario/aceitar_aluno";
$route['aceitar-ideia'] = "Projeto/aceitar_ideia";
$route['recusar-ideia'] = "Ideia/recusar_ideia";
$route['mensagem-de-feedback'] = "Ideia/view_mensagem_feedback";
$route['projetos-lista'] = "Projeto/lista_sistema";
$route['detalhes-projeto'] = "Projeto/eliminar_session_detalhes";
$route['edicao-projeto'] = "Projeto/devs_detalhes_sistema";
$route['visualizar-projeto'] = "Projeto/eliminar_session_detalhes_visualizar";
$route['visualizar-projeto-editado'] = "Projeto/eliminar_session_detalhes_visualizar";
$route['lista-de-alunos'] = "Usuario/lista_alunos";
$route['definir-orientador'] = "Usuario/lista_professores";
$route['definir-lider'] = "Usuario/definir_lider";
$route['adicionar-aluno-projeto'] = "Usuario/adicionar_a_projeto";
$route['candidatar'] = "Usuario/candidatar";
$route['recusar-aluno-projeto'] = "Usuario/recusar_a_projeto";
$route['atualizar-projeto'] = "Projeto/atualizar";

$route['chat'] = "Projeto/chat";
$route['mensagem'] = "Projeto/mensagem";

$route['adicionar-informacao'] = "Projeto/view_adicionar_informacao";
$route['add-informacao'] = "Projeto/add_informacao";
$route['adicionar-iteracao'] = "Projeto/view_adicionar_iteracao";
$route['add-iteracao'] = "Projeto/add_iteracao";

$route['excluir-aluno'] = "Usuario/tirar_aluno_do_projeto";
$route['publicar-projeto'] = "Projeto/publicar_projeto";

$route['baixar-arquivo'] = "Projeto/baixar_arquivo";

$route['login'] = "Home/view_login";
$route['enviar-ideia'] = "Ideia/view_formulario";
$route['detalhes-do-projeto'] = "Projeto/detalhes";

$route['meu-projeto'] = "Projeto/resgatar_id_projeto";
$route['minha-ideia'] = "Projeto/minha_ideia";

$route['projeto-concluido'] = "Projeto/projeto_concluido";

$route['efetuar-login'] = "Home/fazer_login";
$route['logoff'] = "Home/logoff";

$route['login'] = "Home/view_login";
$route['enviar-ideia'] = "Ideia/view_formulario";
$route['detalhes-do-projeto'] = "Projeto/detalhes";
$route['efetuar-login'] = "Home/fazer_login";
$route['ideias-disponiveis'] = "Ideia/ideias_disponiveis";
$route['cadastro'] = "Usuario/view_cadastrar";
$route['cadastrar-ideia'] = "Ideia/inserir";
$route['cadastrar-usuario'] = "Usuario/inserir";
$route['editar-dados'] = "Usuario/view_editar_dados";
$route['alterar-meus-dados'] = "Usuario/editar_dados";
$route['filtrar-usuario'] = "Usuario/filtrar";
$route['filtrar-professor'] = "Usuario/filtrar_professor";
$route['entrar-em-contato'] = "Home/sac";
$route['mensagens-para-o-fases'] = "Home/view_sac";
$route['definir-orientador-do-projeto'] = "Usuario/definir_orientador";

