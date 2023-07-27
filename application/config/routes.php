<?php

defined('BASEPATH') or exit('No direct script access allowed');

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

$route['default_controller'] = 'Site';
$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;

$route['(img|js|css)/(.*)'] = 'Estatico/$1/$2';
$route['sair'] = 'Ajax/sair';
$route['dashboard'] = 'Usuario/dashboard';
$route['cadastro'] = 'Usuario/cadastro';
$route['assinaturas'] = 'Usuario/assinaturas';
$route['visitas'] = 'Usuario/visitas';
$route['convidados'] = 'Usuario/convidados';
$route['mensagens'] = 'Usuario/mensagens';
$route['presentes'] = 'Usuario/presentes';
$route['configuracoes'] = 'Usuario/configuracoes';
$route['anfitrioes'] = 'Usuario/protagonistas';
$route['localevento'] = 'Usuario/localevento';
$route['listadepresentes'] = 'Usuario/listadepresentes';
$route['escolhaseulayout'] = 'Usuario/escolhaseulayout';
$route['dominiopersonalizado'] = 'Usuario/dominiopersonalizado';
$route['albunsmidia'] = 'Usuario/albunsmidia';
$route['album/(.*)'] = 'Usuario/midias/$1';
$route['anfitriao/(.*)'] = 'Usuario/protagonista/$1';
$route['introducao'] = 'Usuario/introducao';
$route['paginaspersonalizadas'] = 'Usuario/paginaspersonalizadas';
$route['contagemregressiva'] = 'Usuario/contagemregressiva';
$route['usuarios'] = 'Usuario/usuarios';
$route['cancelarevento'] = 'Usuario/cancelarevento';
$route['contato'] = 'Site/contato';
$route['site/(.*)/(.*)'] = 'Templates/siteCliente/$1/$2';
$route['site/(.*)'] = 'Templates/siteCliente/$1';
$route['lista/(.*)'] = 'Templates/lista/$1';
$route['checkout/(.*)/(.*)'] = 'Templates/checkout/$1/$2';
$route['success/(.*)/(.*)'] = 'Templates/checkoutsuccess/$1/$2';
$route['finalizarpagamento/(.*)/(.*)'] = 'Templates/finalizarPagamento/$1/$2';
$route['tema/(.*)'] = 'Templates/editarTemplate/$1';
$route['pagina/(.*)/(.*)'] = 'Templates/pagina/$1/$2';




