<?php

class Login {

	private $ci;
	public $usuario = null;
	private $mensagem = '';
	public $logado = false;

	 function __construct($param=array()) {
		$this->ci = & get_instance();
		$this->ci->load->model('Usuario_model', 'Usuario');
//		if(empty($_SESSION['SITEDEORIGEM'])){
//			$_SESSION['SITEDEORIGEM'] = $_SERVER['HTTP_REFERER'];
//			$_SESSION['LANDINGPAGE'] = $_SERVER['REQUEST_URI'];
//		}
		if ($this->ci->input->get('ag') != '') {
			$_SESSION['ag'] = $this->ci->input->get('ag');
		}


		$login = $this->ci->input->post_get('login');
		$senha = md5($this->ci->input->post_get('senha'));
		$loginD = $this->ci->input->post_get('loginD');
		$loginC = $this->ci->input->cookie('lgD');

		if ($login != '') {
			$this->login($login, $senha);
		} elseif ($loginD != '') {
			$this->loginD($loginD);
		} elseif (isset($_SESSION['usuarioLogado']) && isset($_SESSION['user'])) {//MANUTENÇÃO DO LOGIN
			if ($logado = $this->ci->db->get_where('usuario', array('user' => $_SESSION['user'],'bloqueado'=>0))->row_array()) {
			//	print_r(["login logado"=>$logado]);
				$this->loginEfetivado($logado);
			} else {
				$this->deslogar();
			}
		} elseif ($loginC != '') {
			$this->loginD($loginC);
		} elseif (isset($param['login'])) {
            $_SESSION['usuarioLogado'] = false;
            redirect(base_url('Site/index'));
        }
	}
	
	function updateLogin($idempresa, $idusuario = null) {
		$return = false;
		$TIME_NOW = time();
		$DATE_NOW = strtotime('Today 00:00:00');

		if ($user = $this->ci->db->get_where(TABLEEMPRESA, [IDEMPRESA => $idempresa])->row_array()) {
			$dadosIntegracao=$this->ci->db->get_where('integracoes', [IDEMPRESA => $idempresa])->row_array();
			$user['plataforma'] = $dadosIntegracao['plataforma'];
			$this->isLoggedIn = true;
			$this->logado = true;
			$this->user = $user;
			$this->usuario = $user;

			$user['lang'] = 'pt-br';
			$user['dateformat'] = 'd/m/Y';
			if ($this->ci->config->item('language') != $user['lang']) {
				$this->ci->config->set_item('language', $user['lang']);
				$this->ci->lang->load(array('dictionary'));
			}

			//$_SESSION['access_token'] = $access_token;
			//$_SESSION['shop'] = $user['shop'];
			$_SESSION['user'] = $user[IDEMPRESA];
			$_SESSION['login_idempresa'] = $idempresa;
			$_SESSION['login_iduser'] = $idusuario;
			$_SESSION['logado'] = true;

			if (!$this->admUser) {
				$this->ci->db->update(TABLEEMPRESA, array('acesso' => $TIME_NOW), array(IDEMPRESA => $user[IDEMPRESA]));
				$this->ci->db->query("INSERT INTO ip_login( user, ip,dia, primeiroacesso, ultimoacesso,impressao )VALUES (?, ?, ?, ?, ?,1)
                ON DUPLICATE KEY UPDATE impressao = impressao + 1, ultimoacesso = ?", array($user[IDEMPRESA], $this->ci->input->ip_address(), $DATE_NOW, $TIME_NOW, $TIME_NOW, $TIME_NOW));
			}
			$return = true;
		} else {
			$this->deslogar();
		}
		return $return;
	}

	function loginEfetivado($logado) {
//		GLOBAL $PERMISSAO;
		GLOBAL $AGORA;
		global $HOJE;
		$this->logado = true;
		$this->usuario = $logado;
		$this->ci->db->update('usuario', array('acesso' => $AGORA), array('user' => $logado['user']));
		$this->ci->db->query("INSERT INTO ip_login( user, ip,dia, primeiroacesso, ultimoacesso,impressao )VALUES (?, ?, ?, ?, ?,1)
                ON DUPLICATE KEY UPDATE impressao = impressao + 1, ultimoacesso = ?", array($logado['user'], $this->ci->input->ip_address(), $HOJE, $AGORA, $AGORA, $AGORA));
		$this->veririficaVencimento($logado);
	}
	
	function veririficaVencimento($dados){
		
		$pagina=$_SERVER['REQUEST_URI'];
//		if(str_replace('/','',$pagina) != 'assinatura'){			
//			if($dados['credVencimento'] < strtotime('+2 days',time())){				
//				redirect(base_url('assinatura'));
//			}
//		}
		
	}

	function login($login, $senha) {
		global $AGORA;
		if ($logado = $this->ci->db->get_where('usuario', array('email' => $login,'bloqueado'=>0))->row_array()) {
			
			if ($logado['senha'] == $senha) {
				$_SESSION['user'] = $logado['user'];
				$_SESSION['usuarioLogado'] = true;
				$this->loginEfetivado($logado);
				$this->ci->input->set_cookie('lgD', codifica($login . '|' . $senha), 31536000); //auto login por um ano
				
			} else {
				$this->mensagem = 'Nome de usuário ou senha está incorreto.';
			}
		} else {
			$this->mensagem = 'Nome de usuário ou senha está incorreto.';
		}
	}

	function deslogar() {
		unset($_SESSION['user']);
		$_SESSION['usuarioLogado'] = false;
		$this->ci->input->set_cookie('lgD', '', 1); //auto login por um ano
		$this->usuario = null;
	}

	/**
	 * Login usando hash no URL ou Cookie
	 * @param type $hash
	 */
	function loginD($hash) {
		//$this->ci->load->helper('geral');
		list($login, $senha) = explode('|', decodifica($hash), 2);
		$this->login($login, md5($senha));
	}

	function getMensagem() {
		return $this->mensagem;
	}

}
