<?php

function geraSelect($dados, $valor, $param = array()) {

	$s = '';



	$s = "<select";

	foreach ($param as $p => $v) {

		$s .= " $p='$v'";
	}

	$s .= ">";

	foreach ($dados as $p => $v) {

		$s .= "<option value='$p'" . ($p == $valor ? ' selected' : '') . ">$v</option>";
	}

	$s .= "</select>";

	return $s;
}

function createswitch($name, $label, $value, $check, $ent = array()) {

	static $ContSwitch = 0;

	$ContSwitch++;

	if (isset($ent['id']))
		$id = $ent['id'];
	else
		$id = "cb$ContSwitch";

	if ($ent['class'] != '')
		$class = ' ' . $ent['class'];

	$def = array('type' => 'checkbox', 'name' => $name, 'value' => $value, 'id' => $id, 'class' => "tgl tgl-light tgl-primary$class");

	$outros = array();

	foreach ($ent as $k => $v)
		if (isset($def[$k]))
			$def[$k] = $v;
		else
			$outros[$k] = $v;





	$s = '<div class="inline-middle">';

	$s .= "<input" . ($check ? ' checked' : '') . "";

	foreach ($def as $k => $v)
		$s .= " $k='$v'";

	foreach ($outros as $k => $v)
		$s .= " $k='$v'";

	$s .= "><label class='tgl-btn' for='$id'></label></div>$label";

	return $s;
}

//function createswitch($name, $label, $value, $check, $ent = array()){
//	$def = array('type'=>'checkbox', 'name'=>'', 'value'=>'');
//	$outros = array();
//	foreach($ent as $k=> $v)
//		if(isset($def[$k]))
//			$def[$k] = $v;
//		else
//			$outros[$k] = $v;
//	$s = '<label class="mb-0"><span class="switch">';
//	$s .= "<input type='$def[type]' name='$name' value='$value'".($check?' checked':'')."";
//	foreach($outros as $k=> $v)
//		$s .= " $k='$v'";
//	$s .= "><span class='slider round'></span></span> $label</label>";
//	return $s;
//}
//function random_str3($len){
//	return substr(md5(rand(1000, 9999).uniqid()), 0, $len);
//}
//function random_str2($len){
//	$pool = 'abcdefghijklmnopqrstuvwxyz0123456789';
//	$ceil = ceil($len / strlen($pool));
//	return substr(str_shuffle(str_repeat($pool, $ceil)), 0, $len);;
//}



function convertData($timestamp) {

	date_default_timezone_set('America/Sao_Paulo');

	return date('d/m/Y H:i', $timestamp); // Resultado: 12/03/2009
}

function convertDataN($timestamp) {
    date_default_timezone_set('America/Sao_Paulo');
    if($timestamp > 0){
        $data = date('d/m/Y', $timestamp);
    }else{
        $data = "••/••/••••";
    }
    return $data; // Resultado: 12/03/2009
}

function valida_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function random_str($size) {

	$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';

	$string = '';

	$max = 35; //strlen($characters) - 1;

	for ($i = 0; $i < $size; $i++) {

		$string .= $characters[mt_rand(0, $max)];
	}

	return $string;
}

function gerar_shorturl($size = 8) {

	$CI = &get_instance();

	$short = random_str($size);

	while ($row = $CI->db->query("select shorturl from enviados where shorturl='$short'")->row_array()) {

		$short = random_str($size);
	}

	return $short;
}

function persoMsg($texto, $d) {

	$tag = array(
		'{{name}}',
		'{{checkout}}',
		'{{product_name}}',
		'{{product_link}}',
		'{{total}}',
		'{{order_number}}',
		'{{boleto_pagseguro}}',
		'{{boleto_mercadopago}}',
		'[nome_cliente]',
		'[link_checkout]',
		'[nome_produtos]',
		'[valor_total]',
		'[link_boleto]',
		'[numero_pedido]',
		'[codigo_rastreamento]',
		'[situacao_entrega]'
	);



	$dados = array(
		$d['name'],
		$d['checkout'],
		$d['product_name'],
		$d['product_link'],
		$d['total'],
		$d['order'],
		$d['boleto'],
		$d['boleto'],
		$d['name'],
		$d['checkout'],
		$d['product_name'],
		$d['total'],
		$d['boleto'],
		$d['order'],
		$d['tracking'],
		$d['status_entrega'],
	);

	return str_replace($tag, $dados, $texto);
}

/**

 * 

 * @param string OR array $tira 

 * @return string

 */
function getget($tira) {

	$str = "";

	if (is_array($tira)) { //$tira é uma array com varios elementos
		foreach ($_GET as $k => $v) {

			if (!in_array($k, $tira)) {

				if (is_array($v)) {

					foreach ($v as $k2 => $v2) {

						$str .= $k . '[' . $k2 . "]=" . urlencode($v2) . "&";
					}
				} elseif ($v != '')
					$str .= "$k=" . urlencode($v) . "&";
			}
		}
	}else {//$tira é uma string de um elemento unico
		foreach ($_GET as $k => $v) {

			if ($k != $tira) {

				if (is_array($v)) {

					foreach ($v as $k2 => $v2) {

						$str .= $k . '[' . $k2 . "]=" . urlencode($v2) . "&";
					}
				} elseif ($v != '')
					$str .= "$k=" . urlencode($v) . "&";
			}
		}
	}

	$str = rtrim($str, '&');

	return $str;
}

function paginar($prefixo, $pg, $Itens, $itensPorPagina) {

	$CI = &get_instance();

	//$pg = $pg+1;
	//$limite = $limite+1;

	$limite = floor(($Itens - 1) / $itensPorPagina);

	$s = '';

	if ($limite > 0) {

		$pini = max($pg - 5, 0);

		$pfim = min($pini + 10, $limite);



		$s .= '<nav aria-label="..."><ul class="pagination justify-content-center">';

		if ($pg > 0)
			$s .= "<li class='page-item'><a class='page-link' href='$prefixo'>" . $CI->lang->line('pg_first') . "</a></li>";

		for ($i = $pini; $i <= $pfim; $i++) {

			$s .= "<li class='page-item" . ($i == $pg ? " active" : '') . "'><a class='page-link' href='$prefixo$i'>" . ($i + 1) . "</a></li>";
		}

		$i--;

		if ($pg < $i)
			$s .= "<li class='page-item'><a class='page-link' href='$prefixo" . ($limite) . "'>" . $CI->lang->line('pg_last') . "</a></li>";

		$s .= '</ul></nav>';
	}

	return $s;
}

function paginarSimples($prefixo, $pg, $Itens, $itensPorPagina) {

	//$pg = $pg+1;
	//$limite = $limite+1;

	$limite = floor(($Itens - 1) / $itensPorPagina);

	$s = '';

	if ($limite > 0) {

		$pini = max($pg - 5, 0);

		$pfim = min($pini + 10, $limite);



		$s .= '<div class="numPg">';

		if ($pg > 0)
			$s .= "<a href='$prefixo" . ($pg - 1) . "' title='Anterior'>&laquo;</a>";

		for ($i = $pini; $i <= $pfim; $i++) {

			$s .= "<a href='$prefixo$i' " . ($i == $pg ? " class='atual'" : '') . ">" . ($i + 1) . "</a>";
		}

		$i--;

		if ($pg < $i)
			$s .= "<a href='$prefixo" . ($pg + 1) . "' title='Próximo'>&raquo;</a>";

		$s .= '</div>';
	}

	return $s;
}

function paginarAjax($prefixo, $pg, $Itens, $itensPorPagina, $id_cat = '') {

	//$pg = $pg+1;
	//$limite = $limite+1;

	$limite = floor(($Itens - 1) / $itensPorPagina);

	$s = '';

	if ($limite > 0) {

		$pini = max($pg - 5, 0);

		$pfim = min($pini + 10, $limite);



		$s .= '<div class="numPg">';

		if ($pg > 0)
			$s .= "<a class='ajax' href='$prefixo" . ($pg - 1) . "' data-post='cat' data-contPost='$id_cat' title='Anterior'>&laquo;</a>";

		for ($i = $pini; $i <= $pfim; $i++) {

			$s .= "<a class='ajax' data-post='cat' data-contPost='$id_cat' href='$prefixo$i' " . ($i == $pg ? " class='atual'" : '') . ">" . ($i + 1) . "</a>";
		}

		$i--;

		if ($pg < $i)
			$s .= "<a class='ajax' data-post='cat' data-contPost='$id_cat' href='$prefixo" . ($pg + 1) . "' title='Próximo'>&raquo;</a>";

		$s .= '</div>';
	}

	return $s;
}

if (!function_exists('nf')) {



	/**

	 *

	 * Number Format: transforma em número no formato 1.000,00

	 * @param float	$n	Numero float a ser formtatado

	 * @param int	$precisao	Precisão, se omitido utiliza 2

	 * @return	string	numero formatado

	 */
	function nf($n, $precisao = 2) {

		return number_format($n, $precisao, NUM_DEC, NUM_SEP);
	}

}

function urlImage($url, $size, $crop, $raiz = true) {

	$url = "img/$size" . ($size != '0x0' && !empty($crop) ? 'c' . str_replace('|', 'c', $crop) : '') . '/' . $url;

	if ($raiz)
		$url = base_url_estatico($url);

	return $url;
}

function base_url_ajax($url) {

	$CI = &get_instance();

	return $CI->config->item('base_path') . ltrim($url, '/');
}

function base_url_estatico($url) {

	$CI = &get_instance();

	return $CI->config->item('base_estatico') . ltrim($url, '/');
}

function base_url_atual($url) {

	return base_url_estatico($url); //$_SERVER['REQUEST_SCHEME'].'://'. $_SERVER["HTTP_HOST"].'/'.ltrim($url,'/');
}

//function codifica($texto) {
//    $Enc = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, CHAVE_ENCRIPT, $texto, MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
//    $Enc = rtrim(base64_encode($Enc), '=');
//    return str_replace(array('+', '/'), array('-', '_'), $Enc);
//}
//

//function decodifica($textoEnc) {
//    $textoEnc = str_replace(array('-', '_'), array('+', '/'), $textoEnc);
//    $textoEnc = base64_decode($textoEnc);
//    return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, CHAVE_ENCRIPT, $textoEnc, MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"), "\0");
//}



function codifica($texto) {

	//$Enc = openssl_encrypt(MCRYPT_RIJNDAEL_128, CHAVE_ENCRIPT, $texto, MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");

	$Enc = openssl_encrypt($texto, 'aes-128-cfb', CHAVE_ENCRIPT, OPENSSL_ZERO_PADDING, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");

	$Enc = rtrim(base64_encode($Enc), '=');

	return str_replace(array('+', '/'), array('-', '_'), $Enc);
}

function decodifica($textoEnc) {

	$textoEnc = str_replace(array('-', '_'), array('+', '/'), $textoEnc);

	$textoEnc = base64_decode($textoEnc);

	// return rtrim(openssl_decrypt(MCRYPT_RIJNDAEL_128, CHAVE_ENCRIPT, $textoEnc, MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"), "\0");

	return rtrim(openssl_decrypt($textoEnc, 'aes-128-cfb', CHAVE_ENCRIPT, OPENSSL_ZERO_PADDING, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"), "\0");
}

if (!function_exists('encripta')) {



	function encripta($a) {

		return str_replace(array('+', '/'), array('-', '_'), rtrim(base64_encode($a), '='));
	}

	function decripta($a) {

		return base64_decode(str_replace(array('-', '_'), array('+', '/'), $a));
	}

}

function datanuvem($data) {

	$dataDivide = explode("/",$data);

	return $dataDivide[2]."-".$dataDivide[1]."-".$dataDivide[0];

}

function dia_xx_de_mes($time) {

	global $AGORA;

	$CI = &get_instance();

	$dia = date('d', $time);

	$mes = date('m', $time);

	$ano = date('Y', $time);

	$mes = $CI->lang->line('mes_' . $mes);

	if ($time > $AGORA + 31536000 || $time < $AGORA) {

		return sprintf($CI->lang->line('00_de_mes_de_ano'), $dia, $mes, $ano);
	} else {

		return sprintf($CI->lang->line('00_de_mes'), $dia, $mes);
	}
}

/**

 * 

 * @global int $AGORA unixtime

 * @global int $HOJE unixtime hoje às 00:00:00

 * @param int $data unixtime

 * @return string

 */
function tempoatras($data) {

	global $AGORA;

	global $HOJE;

	$CI = &get_instance();

	if ($data > $AGORA) {
		
	} elseif ($data == $AGORA) {

		return $CI->lang->line('agora');
	} elseif ($data > $AGORA - 60) {//1 min
		return sprintf($CI->lang->line('a_x_segundos'), floor($AGORA - $data)); //'à '.floor($AGORA-$data).' segundos';
	} elseif ($data > $AGORA - 3600) {//1 hora
		return sprintf($CI->lang->line('a_x_minutos'), floor(($AGORA - $data) / 60)); //'à '.floor(($AGORA-$data)/60).' minutos';
	} elseif ($data > $HOJE) {//hoje
		return sprintf($CI->lang->line('hoje_as_x'), date(DATE_HM_FORMAT, $data)); //'Hoje às '.date('H:i', $data);
	} elseif ($data > $HOJE - 86400) {//ontem
		return sprintf($CI->lang->line('ontem_as_x'), date(DATE_HM_FORMAT, $data));
	} else {

		//return sprintf($CI->lang->line('em_x'), date(DATE_DMY_HM_FORMAT, $data));

		return sprintf($CI->lang->line('a_x_dias'), floor(($AGORA - $data) / 86400));
	}
}

/**

 * 

 * @param type $int

 * @return string dd/mm/YYYY 

 */
function data_ddmmyyyy($int) {

	if ($int == '' || $int == 0)
		return '';
	else
		return date(DATE_DMY, $int);
}

/**

 * 

 * @param type $data

 * @param type $fim se true utiliza 23:59:59 se false 00:00:00

 * @return string

 */
function dataHumanToUnix($data, $fim = true) {

	$data = str_replace(array("\\", ".", ",", " "), "/", $data);

	$b = explode("/", $data);

	if (DATE_DMY == 'd/m/Y') {

		$im = 1;

		$id = 0;
	} else {

		$im = 0;

		$id = 1;
	}

	if (is_numeric($b[0]) && is_numeric($b[1]) && is_numeric($b[2]) && $b[2] > 1900 && checkdate($b[$im], $b[$id], $b[2]))
		return strtotime($b[2] . "-" . $b[$im] . "-" . $b[$id] . ' ' . ($fim ? "23:59:59" : '00:00:00'));
	else
		return "";
}

function iniAjax() {

	$CI = &get_instance();

	//$CI->load->library('Login', NULL, 'login');

	$CI->load->library('Jquery_php', NULL, 'jphp');

	$CI->lang->load('ajax');

	$CI->msgError = array(
		'required' => $CI->lang->line('o_campo_nao_em_branco'),
		'min_length' => $CI->lang->line('o_campo_no_minimo'),
		'max_length' => $CI->lang->line('o_campo_no_maximo'),
		'is_natural' => $CI->lang->line('valor_invalido'), //dados boleanos 1 ou 0
		'alpha_dash' => $CI->lang->line('apenas_alpha_num_dash_under'),
		'ilegaltag' => $CI->lang->line('conteudo_ilegal'),
		'valid_email' => $CI->lang->line('o_campo_email_e_invalido'),
		'is_unique' => $CI->lang->line('email_ja_esta_cadastrado'),
	);
}

function snipet($texto, $tamanho = 156) {

	$texto = strip_tags($texto);

	return substr($texto, 0, strripos(substr($texto, 0, $tamanho), ' ')); //corta no ultimo espaço antes de 156 caracteres
}

/**

 *

 * Get Number: obtem número float de valor que utiliza virgula 1,23 => 1.23

 * @param string $a

 * @return	float	numero ou false se falhar

 */
function gn($a) {

	$a = str_replace(',', '.', $a);

	if (is_numeric($a))
		return $a;
	else
		return false;
}

/**

 * Realizar/Usar Cache do segmento que segue.

 * @param $file string	nome do arquivo

 * @param $tempo int	Em segundos de duração do cache

 * 

 * DEMO DE USO:

 * if(iniCache("cache/NOMEDOARQUIVO.htm")){

 * 		echo "texto ou código PHP";

 * }

 * endCache(true);

 */
function iniCache($file, $tempo = 86400) {

	global $CACHE;

	$CACHE = array(false, $file);

	if (!file_exists($file) || ($tempo > 0 && filemtime($file) < time() - $tempo)) {

		ob_start();

		$CACHE[0] = true;
	}

	return $CACHE[0];
}

/**

 * 

 * COmplementar

 * @param $exec bool	TRUE se o conteudo impresso for um código PHP que deverá ser executado

 * 			default false

 */
function endCache($exec = false) {

	global $CACHE;

//	foreach($GLOBALS AS $k=>$v)$$k = $v;

	if ($CACHE[0]) {

		$R = fopen($CACHE[1], "w");

		$T = ob_get_contents();

		ob_end_clean();

		fwrite($R, $T);

		fclose($R);

		if ($exec)
			include($CACHE[1]);
		else
			echo $T;
	}else {

		include($CACHE[1]);
	}
}

function geraurl($a) {

	$a = str_replace(" ", "-", tiraAcento($a));

	return urlencode($a);
}

function url($parametros) {

	$s = array();

	$t = '';

	foreach ($parametros as $k => $v) {

//		if($k=='pg' && $v<=1){
//			//ignora
//		}else

		if (trim($v) != '' || $k == 'pg') {

			$s[] = $k . '=' . urlencode($v);
		}
	}

	if (count($s) > 0)
		$url = $t . '?' . implode('&', $s);
	else
		$url = $t;

	//echo $url;

	return base_url($url);
}

function normalizaTexto($aaa) {

	$aaa = tiraAcento($aaa);

	$aaa = tiraPontuacao($aaa, true);

	$aaa = mb_strtolower($aaa);

	return $aaa;
}

/**



 * Remoção de caracteres maiusculos

 * @param string $aaa entrada

 * @param $tipo enum(first,words,tudo) default first

 * @param float $tolerancia permite até X caracteres maiusculos default 0.2

 * @param $UmaLinha default true (se true remove \n \r \t)

 */
function tiraMaiuscula($aaa, $tipo = 'first', $tolerancia = 0.2, $UmaLinha = true) {

	//$tipo = 'first' OU 'words' OU tudo

	global $UF;

	$aaa = str_replace("\t", " ", $aaa);

	$bbb = str_replace(
			array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "Ç", "À", "Á", "Â", "Ã", "Ä", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï", "Ò", "Ó", "Ô", "Õ", "Ö", "Ù", "Ú", "Û", "Ü", "Ý"), array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "ç", "à", "á", "â", "ã", "ä", "è", "é", "ê", "ë", "ì", "í", "î", "ï", "ò", "ó", "ô", "õ", "ö", "ù", "ú", "û", "ü", "ý"), $aaa, $nM);

	$nT = strlen($aaa);

	if ($tipo == 'tudo')
		$aaa = $bbb;

	elseif ($nM >= ($tolerancia * $nT)) {

		if ($tipo == 'first') {

			$temp = explode('.', $bbb);

			foreach ($temp as $k => $v) {

				$v = trim($v);

				if ($v != '') {

					$v[0] = chr(ord($v[0]) - 32);

					$temp[$k] = $v;
				}
			}

			$aaa = implode('. ', $temp);
		} elseif ($tipo == 'words') {

			$temp = explode(' ', $bbb);

			foreach ($temp as $k => $v) {

				if ($v != '') {

					$strlen = strlen($v);

					if (isset($GLOBALS['BUSCA_MAIUSCULA'][$v]))
						$temp[$k] = $GLOBALS['BUSCA_MAIUSCULA'][$v];

					elseif ($strlen == 2 && isset($UF[strtoupper($v)]))
						$temp[$k] = strtoupper($v); //siglas maiusculas

					elseif ($strlen <= 2 || ($strlen == 3 && in_array($v, array('dos', 'das', 'que', 'por', 'com'))) || ( $strlen == 4 && $v == 'para'))
						$temp[$k] = $v;

					else {

						$v[0] = chr(ord($v[0]) - 32);

						$temp[$k] = $v;
					}
				}
			}

			$aaa = implode(' ', $temp);
		}
	}

	if ($UmaLinha)
		$aaa = str_replace(array("\n", "\r"), " ", $aaa);

	$aaa = str_replace(array("\"", "\'", "'"), "´", $aaa);

	while (strpos($aaa, "  ") != false)
		$aaa = str_replace("  ", " ", $aaa); //tirando espaços duplos

	$aaa = strip_tags($aaa);

	trim($aaa);

	return $aaa;
}

function tiraEspaco($aaa, $Linha = true, $tags = true) {

	$aaa = str_replace("\t", " ", $aaa);

	if ($Linha)
		$aaa = str_replace(array("\n", "\r"), array(' ', ''), $aaa);

	if ($tags)
		$aaa = strip_tags($aaa);

	$aaa = str_replace(array("\"", "\'", "'"), "´", $aaa);

	while (strpos($aaa, "  ") != false)
		$aaa = str_replace("  ", " ", $aaa); //tirando espaços duplos

	$aaa = trim($aaa);

	return $aaa;
}

function tiraPontuacao($aaa, $hifen = false) {

	//$aaa = str_replace(array('.',"'","\'","\\","/","\"",",",";",":","(",")","!","#","$","%","¨","*","+","=","{","}","[","]","~","^","<",">","?","°","º","ª","´","`")," ",$aaa);

	if ($hifen)
		$aaa = str_replace('-', ' ', $aaa);

	$aaa = preg_replace('/[^a-zA-Z0-9ÇÝÑÁÂÀÄÃÉÊÈËÍÎÌÏÓÔÒÖÕÚÛÙÜçýñÿáâàäãéêèëíîìïóôòöõúûùü]/', ' ', $aaa);

	$aaa = preg_replace('/\s\s+/', ' ', $aaa);

	//while(strpos($aaa,"  ")!=false) $aaa = str_replace("  "," ",$aaa);//tirando espaços duplos

	return $aaa;
}

function tiraAcento($aaa) {// e também &
	$aaa = str_replace(array(
		"Ç", "Ý", "Ñ",
		"Á", "Â", "À", "Ä", "Ã",
		"É", "Ê", "È", "Ë",
		"Í", "Î", "Ì", "Ï",
		"Ó", "Ô", "Ò", "Ö", "Õ",
		"Ú", "Û", "Ù", "Ü",
		"ç", "ý", "ñ", "ÿ",
		"á", "â", "à", "ä", "ã",
		"é", "ê", "è", "ë",
		"í", "î", "ì", "ï",
		"ó", "ô", "ò", "ö", "õ",
		"ú", "û", "ù", "ü",
		"&")
			, array(
		"C", "Y", "N",
		"A", "A", "A", "A", "A",
		"E", "E", "E", "E",
		"I", "I", "I", "I",
		"O", "O", "O", "O", "O",
		"U", "U", "U", "U",
		"c", "y", "n", "y",
		"a", "a", "a", "a", "a",
		"e", "e", "e", "e",
		"i", "i", "i", "i",
		"o", "o", "o", "o", "o",
		"u", "u", "u", "u",
		"e")
			, $aaa);

	return $aaa;
}

function DBincludeInto($table, $data) {

	$CI = &get_instance();

	foreach ($data as $k => $v) {

		$data[$k] = addslashes($v);
	}

	return $CI->db->query("insert into $table (" . implode(',', array_keys($data)) . ")values('" . implode("','", $data) . "')");
}

/**

 * 

 * @param string $table

 * @param array $where array associativa com indices igual ao nome das colunas (AND todos elementos)

 * @return boolean true se sucesso

 */
function DBdelete($table, $where) {

	$CI = &get_instance();

	$s = "delete from $table where ";

	$a = array();

	foreach ($where as $k => $v) {

		$a[] = "$k = '" . addslashes($v) . "'";
	}

	$s .= implode(" AND ", $a);

	return $CI->db->query($s);
}

/**

 * 

 * @param string $table

 * @param array $data array associativa com indices igual ao nome das colunas

 * @param array $where array associativa com indices igual ao nome das colunas (AND todos elementos)

 * @return boolean true se sucesso

 */
function DBupdate($table, $data, $where) {

	$CI = &get_instance();

	$s = "update $table SET ";

	foreach ($data as $k => $v) {

		$s .= "$k = '" . addslashes($v) . "',";
	}

	$s = rtrim($s, ","); //remover ultima virgula

	$s .= " where ";

	$a = array();

	foreach ($where as $k => $v) {

		$a[] = "$k = '" . addslashes($v) . "'";
	}

	$s .= implode(" AND ", $a);

	return $CI->db->query($s);
}

function array_random($arr, $num = 1) {

	shuffle($arr);



	$r = array();

	for ($i = 0; $i < $num; $i++) {

		$r[] = $arr[$i];
	}

	return $num == 1 ? $r[0] : $r;
}

/**

 * 

 * @param string $table

 * @param array $where array associativa com indices igual ao nome das colunas (AND todos elementos)

 * @param array $coluna array com colunas a serem selecionadas

 * @return DB result resposta de mysql_query()

 */
function DBselect($table, $where, $coluna = array('*')) {

	$CI = &get_instance();

	$s = "select " . implode(',', $coluna) . " FROM $table where ";

	$a = array();

	foreach ($where as $k => $v) {

		$a[] = "$k LIKE '$v'";
	}

	$s .= implode(" AND ", $a);

	return $CI->db->query($s);
}

function urlImageShopify($url, $size = 500) {

	$urlImg = strrev($url);

	list($fim, $comeco) = explode('.', $urlImg, 2);

	return strrev($comeco) . "_{$size}x{$size}." . strrev($fim);
}

function getParam($array, $name, $id, $campoId = 'id') {

	$val = '';

	foreach ($array as $row) {

		if ($row[$campoId] == $id) {

			$val = $row[$name];

			break;
		}
	}

	return $val;
}

function carregar($url, $post = null, $access_token = null, $action = 'POST') {

	global $TEMPOCARREGAMENTO, $NUMEROCARREGAMENTO;



	$ini = microtime(true);

	$ch = curl_init();

	$head = array();

	curl_setopt($ch, CURLOPT_URL, $url);

	if (!is_null($post)) {

		curl_setopt($ch, CURLOPT_POST, true);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	}

	if (!is_null($access_token)) {

		$head[] = "X-Shopify-Access-Token: $access_token";
	}

	if (!is_null($post) && is_string($post)) {

		$head[] = "Content-Type: application/json";
	}

	if ($action != 'POST') {

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $action);
	}

	if (count($head) > 0)
		curl_setopt($ch, CURLOPT_HTTPHEADER, $head);

	curl_setopt($ch, CURLOPT_HEADER, false);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



	curl_setopt($ch, CURLOPT_TIMEOUT, 90);

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);





	$resp = curl_exec($ch);

	if ($resp === false) {

		echo curl_error($ch);
	}

//	echo $resp;

	$respA = json_decode($resp, true);





	curl_close($ch);

	$TEMPOCARREGAMENTO = $TEMPOCARREGAMENTO + microtime(true) - $ini;

	$NUMEROCARREGAMENTO++;

	file_put_contents("url.txt", date('c') . " $url	" . (@count($respA)) . " " . (@count(current($respA))) . "\r\n", FILE_APPEND);

	//file_put_contents('log.txt', date('c')."$url\t$resp\r\n",FILE_APPEND);

	return $respA;
}

function update_order($tipo, $checkout, $imagens, $usuario) {

	$code_pais = array("AD" => "376", "AE" => "971", "AF" => "93", "AG" => "1268", "AI" => "1264", "AL" => "355", "AM" => "374", "AO" => "244", "AR" => "54", "AT" => "43", "AU" => "61", "AW" => "297", "AX" => "35818", "AZ" => "994", "BB" => "1246", "BD" => "880", "BE" => "32", "BF" => "226", "BG" => "359", "BH" => "973", "BI" => "257", "BJ" => "229", "BL" => "590", "BM" => "1441", "BN" => "673", "BO" => "591", "BR" => "55", "BS" => "1242", "BT" => "975", "BV" => "267", "BW" => "387", "BY" => "375", "BZ" => "501", "CA" => "1", "CC" => "6189162", "CD" => "243", "CF" => "236", "CG" => "242", "CH" => "41", "CK" => "682", "CL" => "56", "CM" => "237", "CN" => "86", "CO" => "57", "CR" => "506", "CU" => "53", "CV" => "238", "CW" => "5999", "CX" => "6189164", "CY" => "357", "CZ" => "420", "DE" => "49", "DJ" => "253", "DK" => "45", "DM" => "1767", "DO" => "1809", "DZ" => "213", "EC" => "593", "EE" => "372", "EG" => "20", "ER" => "291", "ES" => "34", "ET" => "251", "FI" => "358", "FJ" => "679", "FK" => "500", "FO" => "298", "FR" => "33", "GA" => "241", "GB" => "44", "GD" => "1473", "GE" => "995", "GF" => "596", "GG" => "441481", "GH" => "233", "GI" => "350", "GL" => "299", "GM" => "220", "GN" => "224", "GP" => "590", "GQ" => "240", "GR" => "30", "GS" => "500", "GT" => "502", "GW" => "245", "GY" => "592", "HK" => "852", "HN" => "504", "HR" => "385", "HT" => "509", "HU" => "36", "ID" => "62", "IE" => "353", "IL" => "972", "IM" => "441624", "IN" => "91", "IO" => "246", "IQ" => "964", "IR" => "98", "IS" => "354", "IT" => "39", "JE" => "441534", "JM" => "1876", "JO" => "962", "JP" => "81", "KE" => "254", "KG" => "996", "KH" => "855", "KI" => "686", "KM" => "269", "KN" => "1869", "KP" => "850", "KR" => "82", "KW" => "965", "KY" => "1345", "KZ" => "76", "LA" => "856", "LB" => "961", "LC" => "1758", "LI" => "423", "LK" => "94", "LR" => "231", "LS" => "266", "LT" => "370", "LU" => "352", "LV" => "371", "LY" => "218", "MA" => "212", "MC" => "377", "MD" => "373", "ME" => "382", "MF" => "590", "MG" => "261", "MK" => "389", "ML" => "223", "MM" => "95", "MN" => "976", "MO" => "853", "MQ" => "596", "MR" => "222", "MS" => "1664", "MT" => "356", "MU" => "230", "MV" => "960", "MW" => "265", "MX" => "52", "MY" => "60", "MZ" => "258", "NA" => "264", "NC" => "687", "NE" => "227", "NF" => "6723", "NG" => "234", "NI" => "505", "NL" => "31", "NO" => "47", "NP" => "977", "NR" => "674", "NU" => "683", "NZ" => "64", "OM" => "968", "PA" => "507", "PE" => "51", "PF" => "594", "PG" => "675", "PH" => "63", "PK" => "92", "PL" => "48", "PM" => "508", "PN" => "64", "PS" => "970", "PT" => "351", "PY" => "595", "QA" => "974", "RE" => "262", "RO" => "40", "RS" => "381", "RU" => "7", "RW" => "250", "SA" => "966", "SB" => "677", "SC" => "248", "SD" => "249", "SE" => "46", "SG" => "65", "SH" => "290", "SI" => "386", "SJ" => "4779", "SK" => "421", "SL" => "232", "SM" => "378", "SN" => "221", "SO" => "252", "SR" => "597", "SS" => "211", "ST" => "239", "SV" => "503", "SX" => "1721", "SY" => "963", "SZ" => "268", "TC" => "1649", "TD" => "235", "TF" => "689", "TG" => "228", "TH" => "66", "TJ" => "992", "TK" => "690", "TL" => "670", "TM" => "993", "TN" => "216", "TO" => "676", "TR" => "90", "TT" => "1868", "TV" => "688", "TW" => "886", "TZ" => "255", "UA" => "380", "UG" => "256", "UM" => "1808", "US" => "1", "UY" => "598", "UZ" => "998", "VA" => "3906698", "VC" => "1784", "VE" => "58", "VG" => "1284", "VN" => "84", "VU" => "678", "WF" => "681", "WS" => "685", "XK" => "383", "YE" => "967", "YT" => "262269", "ZA" => "27", "ZM" => "260", "ZW" => "263");

	$CI = &get_instance();



	$d = array();

//	file_put_contents('debug2.txt', count($checkout['fulfillments']),FILE_APPEND);
//	if(count($checkout['fulfillments'])){
//		file_put_contents('debug2.txt', print_r($checkout,true).print_r($checkout['fulfillments'],true).print_r($checkout['fulfillments'][0],true).print_r($checkout['fulfillments'][0]['tracking_numbers'],true));
//	}

	if ($tipo == 'orders') {

		$checkToken = $checkout['checkout_token'];

		$orderId = $checkout['id'];

		$checkId = 0;

		if ($checkToken == '') {

			$checkToken = $orderId;
		}

		$d['status_url'] = $checkout['order_status_url'];



		if (isset($checkout['fulfillments'][0]['tracking_numbers'])) {

			$d['tracking'] = implode(', ', $checkout['fulfillments'][0]['tracking_numbers']);

			$d['status_entrega'] = $checkout['fulfillments'][0]['shipment_status'];
		}
	} elseif ($tipo == 'checkouts') {

		$checkToken = $checkout['token'];

		$orderId = 0;

		$checkId = $checkout['id'];

		$d['checkout_url'] = $checkout['abandoned_checkout_url'];
	}

	file_put_contents('debug4.txt', print_r($checkout, true), FILE_APPEND);

	$d['user'] = $usuario['user'];

	$d['token'] = $checkToken;

	$d['orderid'] = $orderId;

	$d['checkoutid'] = $checkId;











	$d['primeironome'] = $checkout['customer']['first_name'];

	$d['nome'] = $d['primeironome'] . ' ' . $checkout['customer']['last_name'];





	$produtos = array();



	foreach ($checkout['line_items'] as $produto) {

		if ($imagens[$produto['product_id']][$produto['variant_id']] != '')
			$img = $imagens[$produto['product_id']][$produto['variant_id']];
		else
			$img = $imagens[$produto['product_id']][''];

		$produtos[] = array(
			'name' => $produto['title'],
			'src' => $img
		);
	}

	$d['produtos'] = json_encode($produtos);



	$d['inclusao'] = strtotime($checkout['created_at']);

	$d['atualizacao'] = strtotime($checkout['updated_at']);

	$email = trim($checkout['email']);

	if ($email == '')
		$email = $checkout['customer']['email'];



	$phone = '';



	if ($rowphone = $CI->db->get_where('phone', array('token' => $checkToken, 'user' => $usuario['user']))->row_array()) {

		$phone = $rowphone['phone'];

		$addr = $checkout['customer']['default_address'];
	}

	if ($phone == '') {

		$phone = trim($checkout['customer']['default_address']['phone']);

		$addr = $checkout['customer']['default_address'];
	}

	if ($phone == '') {

		$phone = trim($checkout['billing_address']['phone']);

		$addr = $checkout['billing_address'];
	}

	if ($phone == '') {

		$phone = trim($checkout['shipping_address']['phone']);

		$addr = $checkout['shipping_address'];
	}

	if ($phone == '') {

		$phone = trim($checkout['customer']['phone']);

		$addr = $checkout['customer']['default_address'];
	}

	if ($phone == '') {

		$phone = trim($checkout['phone']);

		$addr = $checkout['customer']['default_address'];
	}

	$regiao = "{$addr['city']} - {$addr['province_code']} - {$addr['country']}";

	if ($rowphone['phone'] != '') {

		$regiao = '';
	}



	$phone = str_replace(array(' ', '-', '(', ')'), '', $phone);

	if (substr($phone, 0, 1) != '+') {

		$codPais = $code_pais[$addr['country_code']];

		$phone = '+' . $codPais . ltrim($phone, '0');
	}

	$d['phone'] = $phone;

	$d['regiao'] = $regiao;

	$d['email'] = $email;

	$d['valor'] = $checkout['total_price'];

	if ($tipo == 'orders') {

		$d['order_name'] = $checkout['name'];

		$d['status_pagamento'] = $checkout['financial_status'];
	} elseif ($tipo == 'checkouts') {

		$d['order_name'] = $checkout['name'];

		$d['status_pagamento'] = 'abandoned';
	}

	if ($row = $CI->db->get_where('pedidos', array('token' => $checkToken))->row_array()) {

		unset($d['inclusao']); //não mudar data de criação

		if ($d['status_pagamento'] != $row['status_pagamento']) {

			$d['referencia'] = $d['atualizacao']; //data de pos venda
		}

		$CI->db->update('pedidos', $d, array('token' => $checkToken));
	} else {

		$d['referencia'] = $d['inclusao'];

		$CI->db->insert('pedidos', $d);
	}









	return strtotime($checkout['updated_at']);
}

function update_checkout_antigos($usuario, $diasatras) {

	$atualizado_de = strtotime("-$diasatras days");

	$atualizado_ate = $usuario['checkouts_atualizado_de'];

	if ($atualizado_de < $atualizado_ate) {

		$filtro = "updated_at_min=" . urlencode(date('c', $atualizado_de)) . "&updated_at_max=" . urlencode(date('c', $atualizado_ate - 1));

		update_procurar($usuario, true, $filtro, 'checkouts', 'checkouts_atualizado_de');
	}
}

function update_checkout_novos($usuario) {

	$atualizado_de = $usuario['checkouts_atualizado_ate'];

	$filtro = "updated_at_min=" . urlencode(date('c', $atualizado_de + 1));

	update_procurar($usuario, false, $filtro, 'checkouts', 'checkouts_atualizado_ate');
}

function update_pedidos_antigos($usuario, $diasatras) {

	$atualizado_de = strtotime("-$diasatras days");

	$atualizado_ate = $usuario['orders_atualizado_de'];

	if ($atualizado_de < $atualizado_ate) {

		$filtro = "updated_at_min=" . urlencode(date('c', $atualizado_de)) . "&updated_at_max=" . urlencode(date('c', $atualizado_ate - 1));

		update_procurar($usuario, false, $filtro, 'orders', 'orders_atualizado_de');
	}
}

function update_pedidos_novos($usuario) {

	$atualizado_de = $usuario['orders_atualizado_ate'];

	$filtro = "updated_at_min=" . urlencode(date('c', $atualizado_de + 1));

	update_procurar($usuario, true, $filtro, 'orders', 'orders_atualizado_ate');
}

function inidateupdate($usuario) {

	$CI = &get_instance();

	$update = array();

	$agora = time();

	if ($usuario['orders_atualizado_ate'] == 0) {

		$usuario['orders_atualizado_ate'] = $agora;

		$update['orders_atualizado_ate'] = $agora;
	}

	if ($usuario['orders_atualizado_de'] == 0) {

		$usuario['orders_atualizado_de'] = $agora;

		$update['orders_atualizado_de'] = $agora;
	}

	if ($usuario['checkouts_atualizado_ate'] == 0) {

		$usuario['checkouts_atualizado_ate'] = $agora;

		$update['checkouts_atualizado_ate'] = $agora;
	}

	if ($usuario['checkouts_atualizado_de'] == 0) {

		$usuario['checkouts_atualizado_de'] = $agora;

		$update['checkouts_atualizado_de'] = $agora;
	}

	if (count($update) > 0) {

		$CI->db->update('usuario', $update, array('user' => $usuario['user']));

		file_put_contents('url.txt', $CI->db->last_query() . "\r\n", FILE_APPEND);
	}

	return $usuario;
}

function update_procurar($usuario, $reverso, $filtro, $tipo, $campo) {

	$CI = &get_instance();





	$itensPorPagina = 250;

	//$reverso = true;







	$urlCont = "https://" . $usuario['shop'] . "/admin/$tipo/count.json?$filtro";

	$arrCont = carregar($urlCont, null, $usuario['access_token']);

	$cont = $arrCont['count'];



	//file_put_contents("url.txt", date('c')." $urlCont	$cont\r\n",FILE_APPEND);



	$ultimaPagina = ceil($cont / $itensPorPagina);

	$pgi = 0;

	$terminou = false;

	$ordProcessada = 0;

	$produtoJaFoi = array();

	$imagens = array();

	if ($cont > 0) {

		do {

			if ($reverso) {

				$pg = $ultimaPagina - $pgi;
			} else {

				$pg = $pgi + 1;
			}

			$url = "https://" . $usuario['shop'] . "/admin/$tipo.json?page=" . ($pg) . "&limit=$itensPorPagina&$filtro";



			$arr = carregar($url, null, $_SESSION['access_token']);







			//$totalPg = count($arr['orders']);

			if ($reverso) {

				$orders = array_reverse($arr[$tipo]);
			} else {

				$orders = $arr[$tipo];
			}





			$listaProdutos = array();

			foreach ($orders as $checkout) {

				foreach ($checkout['line_items'] as $item) {

					if ($item['product_id'] != '' && !in_array($item['product_id'], $produtoJaFoi))
						$listaProdutos[] = $item['product_id'];
				}
			}

			if (count($listaProdutos) > 0) {

				$listaProdutos = array_unique($listaProdutos);

				$todosProdutos = carregar("https://" . $usuario['shop'] . "/admin/products.json?fields=id,images,variants,image&ids=" . implode(',', $listaProdutos), null, $usuario['access_token']);



				if (is_array($todosProdutos['products']))
					foreach ($todosProdutos['products'] as $produto) {

						$imagens[$produto['id']][''] = urlImageShopify($produto['image']['src']);

						if (is_array($produto['variants']) && count($produto['variants']) > 0) {

							if (is_array($produto['images']))
								foreach ($produto['images'] as $image) {

									if (is_array($image['variant_ids']))
										foreach ($image['variant_ids'] as $var) {

											if (!is_array($imagens[$produto['id']]))
												$imagens[$produto['id']] = array();

											$imagens[$produto['id']][$var] = urlImageShopify($image['src']);
										}
								}

							foreach ($produto['variants'] as $variante) {

								if ($variante['image_id'] == '')
									$imagens[$produto['id']][$variante['id']] = urlImageShopify($produto['image']['src']);
							}
						}
					}
			}

			$last = $usuario[$campo];

			foreach ($orders as $ord) {

				$ordProcessada++;

				$last = update_order($tipo, $ord, $imagens, $usuario);
			}

			$CI->db->update('usuario', array($campo => $last), array('user' => $usuario['user']));

			file_put_contents('url.txt', $CI->db->last_query() . "\r\n", FILE_APPEND);



			$pgi++;

			if ($ordProcessada >= $cont) {

				$terminou = true;
			}
		} while (!$terminou && $pgi < 3);
	}
}

function getgetArray($tira) {

	$sai = $_GET;

	if (!is_array($tira)) {

		$tira = array($tira);
	}

	foreach ($sai as $k => $v) {

		if (in_array($k, $tira)) {

			unset($sai[$k]);
		}
	}

	return $sai;
}

function geraNomeTop($dadosUser) {

	$temp = json_decode($dadosUser, true);

	$dono = $temp['shop']['shop_owner'];

	$temp = explode(' ', trim($dono));

	return $iniciais = mb_strtoupper($temp[0][0] . $temp[count($temp) - 1][0]);
}

function geraIni($nome) {



	$temp = explode(' ', trim($nome));

	return $iniciais = mb_strtoupper($temp[0][0] . $temp[count($temp) - 1][0]);
}

function geraTimestamp($data) {

	$partes = explode('/', $data);

	return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
}

function geraSlug($slug, $tabela, $indice) {

	$CI = &get_instance();

	$slug = preg_replace('/[ -]+/', '-', tiraAcento(strtolower($slug)));

	$temp = $slug;

	$i = 0;

	while ($tem = $CI->db->get_where($tabela, array($indice => $temp))->row_array()) {

		$i++;



		$temp = $slug . $i;
	}

	return $temp;
}

function diferencaDias($data_inicial, $data_final) {



	// Define os valores a serem usados
//$data_inicial = '23/03/2009';
//$data_final = '04/11/2009';
// Cria uma função que retorna o timestamp de uma data no formato DD/MM/AAAA
// Usa a função criada e pega o timestamp das duas datas:

	$time_inicial = geraTimestamp($data_inicial);

	$time_final = geraTimestamp($data_final);

// Calcula a diferença de segundos entre as duas datas:

	$diferenca = $time_final - $time_inicial; // 19522800 segundos
// Calcula a diferença de dias

	return $dias = (int) floor($diferenca / (60 * 60 * 24)); // 225 dias
}

function generatorPass($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {
	$lmin = 'abcdefghijklmnopqrstuvwxyz';
	$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$num = '1234567890';
	$simb = '!@#$%*-';
	$retorno = '';
	$caracteres = '';

	$caracteres .= $lmin;
	if ($maiusculas)
		$caracteres .= $lmai;
	if ($numeros)
		$caracteres .= $num;
	if ($simbolos)
		$caracteres .= $simb;

	$len = strlen($caracteres);
	for ($n = 1; $n <= $tamanho; $n++) {
		$rand = mt_rand(1, $len);
		$retorno .= $caracteres[$rand - 1];
	}
	return $retorno;
}

function dataInt($data)
{
	date_default_timezone_set('America/Sao_Paulo');
	$dataDivid = explode(" ", $data);
	$data_nova = explode("/", $dataDivid['0']);
	$hora = $dataDivid['1'];
	if ($hora == '')
		$hora = '00:00';
	return $timestamp = strtotime($data_nova[1] . '/' . $data_nova[0] . '/' . $data_nova[2] . ' ' . $hora);
	//echo date('d/m/Y h:i', strtotime('+1 hour',$timestamp)); // Resultado: 12/03/2009
}

function redimencionarImagemJPG($imagem,$name, $largura, $altura){

	$imagem_original = imagecreatefromjpeg($imagem);

	list($largura_antiga, $altura_antiga) = getimagesize($imagem);

	// Cria uma nova imagem com o tamanho indicado
	// Esta imagem servirá de base para a imagem a ser reduzida
	$imagem_tmp = imagecreatetruecolor($largura, $altura);
	// Faz a interpolação da imagem base com a imagem original
	imagecopyresampled($imagem_tmp, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_antiga, $altura_antiga);
	
	// Salva a nova imagem
	$resultado = imagejpeg($imagem_tmp, $name);
	
	// Libera memoria
	imagedestroy($imagem_original);
	imagedestroy($imagem_tmp);

	if($resultado){
		return $resultado;
	}else{
		return 'erro';
	}
}

function viaCep($cep) {
    $cep_busca = str_replace("-", "", $cep);

    $url = "http://viacep.com.br/ws/$cep_busca/json/";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($data, true);

    return $data;
}

function redimencionarImagemPNG($imagem,$name, $largura, $altura){

	$imagem_original = imagecreatefrompng($imagem);

	list($largura_antiga, $altura_antiga) = getimagesize($imagem);

	// Cria uma nova imagem com o tamanho indicado
	// Esta imagem servirá de base para a imagem a ser reduzida
	$imagem_tmp = imagecreatetruecolor($largura, $altura);
	// Faz a interpolação da imagem base com a imagem original
	imagecopyresampled($imagem_tmp, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_antiga, $altura_antiga);
	
	// Salva a nova imagem
	$resultado = imagepng($imagem_tmp, $name);
	
	// Libera memoria
	imagedestroy($imagem_original);
	imagedestroy($imagem_tmp);

	if($resultado){
		return $resultado;
	}else{
		return 'erro';
	}
}

//function object_to_array(stdClass $object){

//	$result = (array) $object;

//

//	foreach($result as &$value){

//

//		if($value instanceof stdClass){

//			$value = object_to_array($value);

//		}

//	}

//

//	return $result;

//}

