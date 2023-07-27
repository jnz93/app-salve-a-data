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

if ($_SERVER["HTTP_HOST"] == 'cakepages.com.br') {



	$route['default_controller'] = 'Inicio';

	$route['404_override'] = '';

	$route['translate_uri_dashes'] = FALSE;



	$route['(img|js|css)/(.*)'] = 'Estatico/$1/$2';

	$route['inicio'] = 'Inicio/index';

	$route['vendas'] = 'Vendas/pageVendas';

	$route['mercado'] = 'Mercado/pageMercado';

	$route['produtos'] = 'Inicio/pageProdutos';

	$route['afiliado'] = 'Ajax/direcionaLink/';

	$route['carteira'] = 'Carteira/pageCarteira';

	$route['login'] = 'Inicio/pageLogin';

	$route['cadastro'] = 'Inicio/pageCadastro';

	$route['landing'] = 'Inicio/landingPage';

	$route['sair'] = 'Ajax/sair';



	$route['^(?:([a-zA-Z0-9\._@-]{3,})(?:/|$))?(?:([A-Z]{2})(?:/|$)(?:([a-zA-Z][a-zA-Z0-9%-]{2,})(?:/|$))?)?(?:([0-9]+)(?:/|$))?(?:([a-zA-Z0-9%-]+)\.htm)?$'] = function($area = '', $uf = '', $cid = '', $pg = '', $key = '') {

		//print_r(array($area,$uf,$cid,$pg,$key));

		if (substr($area, -4) == '.htm') {

			$key = substr($area, 0, -4);

			$area = '';

		}





		$areas = array(

			'alterarsenha' => 'Inicio/pagePreferenciasSenha',

			'preferencias' => 'Inicio/pagePreferencias',

			'inicio' => 'Inicio/index',

			'minhaspaginas' => 'Inicio/index',

			'integracoes' => 'Inicio/pgIntegracoes',

			'assinatura' => 'Inicio/pagePlanos',

			'dominios' => 'Inicio/pageDominios',

			'produtos' => 'Inicio/pageProdutos',

			'afiliado' => 'Ajax/direcionaLink',

			'carteira' => 'Carteira/pageCarteira',

			'extrato' => 'Carteira/pageExtrato',

			'login' => 'Inicio/pageLogin',

			'cadastro' => 'Inicio/pageCadastro',

			'recuperarsenha' => 'Inicio/pageRecSenha',

			'sair' => 'Ajax/sair'

		);







		if ($area == '' && $uf == '' && $cid == '' && $pg == '' && $key == '') {

			return "Inicio/index";

		} elseif (isset($areas[$area])) {

			if ($area == 'favoritos') {

				$comp = '/1';

			}

//		return "$areas[$area]/$uf/$cid/$pg/$key".$comp;

			return "$areas[$area]/$uf/$cid/$pg/$key";

		} else {

			if ($key == 'edit') {

				return "Perfil/perfiledit/$area";

			} else {

				return "Inicio/index/$area";

			}

		}

	};

} else {

	$route['default_controller'] = 'Inicio/paginaProducao';	

}







