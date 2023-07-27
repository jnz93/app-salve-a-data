<?php

$GLOBALS['PORTAL_DOMINIO'] = 'app.cupomprimeiracomora.com.br';
$GLOBALS['PORTAL_NOME'] = 'Cupom Primeira Compra';
$GLOBALS['PORTAL_URL'] = 'https://app.cupomprimeiracomora.com.br';


function tratalink($arr)
{
	$texto = trim(strip_tags($arr[2]));
	$txt4 = substr($texto, 0, 4);
	list($link, $lixo) = explode('utm_', $arr[1]);
	$link = trim($link, ' &?');
	if ($texto == '') {
		$saida = "[IMAGEM][$link]";
	} elseif ($txt4 == 'http') {
		$saida = $texto;
	} elseif ($txt4 == 'www.') {
		$saida = $link;
	} else {
		$saida = "$texto [ $link ]";
	}
	return $saida;
}

function desformata($ent)
{
	$ent = str_replace(array("\r", "\n"), " ", $ent);
	$ent = preg_replace('/\s{2,}/', ' ', $ent);

	$ent = preg_replace(
		array('/<br[^>]*>/i', '/<\/?h[1-9][^>]*>/iU', '/<tr[^>]*>/iU', '/<\/td>/i', '/<ul[^>]*>/iU', '/<li[^>]*>/iU', '/<\/li>/i', '/<\/ul>/i', '/<\/?p(?: [^>]*)?>/iU', '/<\/?(?:strong|b)(?: [^>]*)?>/iU', '/\n{3,}/s'),
		array("\n", "\n", "\n", "\t", "\n", "\n     * ", '', "\n\n", "\n", '**', "\n\n"),
		$ent
	);

	$ent = preg_replace_callback('/<a [^>]*href=[\'\"]([^\'\"]+)[\'\"][^>]*>(.*)<\/a>/isU', 'tratalink', $ent);
	return html_entity_decode(strip_tags($ent));
}

function conctagearlink($arr)
{
	$tags = trim(trim($arr[1]) . ' ' . trim($arr[3]));
	$texto = $arr[4];
	$content = trim(strip_tags($texto));
	$link = $arr[2];
	$domain = parse_url($link, PHP_URL_HOST);
	$domainSite = parse_url(URL, PHP_URL_HOST);
	if (strpos($link, 'utm_') === false && ($domain == $domainSite || "www.$domain" == $domainSite)) {
		$txt4 = substr($content, 0, 4);
		if ($content == '') {
			//sem texto
			$arraytemp = array();
			preg_match('/ src=["\']([^"\']*)["\']/i', $texto, $arraytemp);
			$content = basename($arraytemp[1]);
		} elseif ($txt4 == 'http' || $txt4 == 'www.') {
			$content = 'URL';
		}
		$link .= (strpos($link, '?') === false) ? '?' : '&';
		$link .= 'utm_source=email&utm_medium={utm_medium}&utm_campaign={utm_campaign}&utm_content=' . urlencode($content);
	}
	$saida = "<a $tags href=\"$link\">$texto</a>";
	//echo "$link $texto $domain ".URL."]\r\n";
	return $saida;
}

function tagearlink($ent)
{
	$ent = preg_replace_callback('/<a ([^>]*)href=[\'\"]([^\'\"]+)[\'\"]([^>]*)>(.*)<\/a>/isU', 'conctagearlink', $ent);
	return $ent;
}

/**
 * 
 * @param array $dados do usuário
 * @param array $ArrTemplate array('assunto', 'mensagem','altMensagem')
 * @return array
 */
function templateEmail($dados, $ArrTemplate, $tagearUrl = true)
{
	if (!is_array($ArrTemplate)) {
		$ArrTemplate = array('mensagem' => $ArrTemplate);
		$returnStr = true;
	} else
		$returnStr = false;
	$CI = &get_instance();
	$CI->lang->load('email');
	$CI->load->library('parser');
	$frases = array(
		'cancelarrecebimento' => sprintf($CI->lang->line('para_nao_receber_novamente'), '<a href="' . URL . '/configuracoes/cancelaremail?loginD={loginD}&mod={cancelar}">', '</a>'),
		'URL' => URL
	);
	if ($dados['utm_campaign'] == '')
		$dados['utm_campaign'] = $GLOBALS['TEMPEMAIL'];
	$dados['emailenc'] = encripta($dados['email']);
	$dados['loginD'] = codifica($dados['email'] . '|' . $dados['senha']);

	foreach ($ArrTemplate as $k => $template) {
		foreach ($frases as $key => $value) {
			$template = str_replace("[$key]", $value, $template);
		}
		if ($k == 'mensagem' && $tagearUrl)
			$template = tagearlink($template);
		$saida[$k] = $CI->parser->parse_string($template, $dados, true);
	}
	if ($returnStr) {
		$saida = $saida['mensagem'];
	}
	return $saida;
}

/* * Função para tradução do sistema de mensagens antigo
 * 
 * @param type $destinatario
 * @param type $assunto
 * @param type $mensagem
 * @param type $remetente
 * @param type $forma
 * @return type
 */

function email($destinatario, $assunto, $mensagem, $remetente = "cadastro", $forma = "SES")
{
	global $SMTP;
	if (is_array($mensagem)) {
		$mensagem['assunto'] = $assunto;
		if (isset($mensagem[0]))
			$mensagem['mensagem'] = $mensagem[0];
		if (isset($mensagem[1]))
			$mensagem['altMensagem'] = $mensagem[1];
		if (isset($mensagem[2]))
			$mensagem['anexo'] = $mensagem[2];
	} else {
		$mensagem = array('assunto' => $assunto, 'mensagem' => $mensagem);
	}
	$forma = strtoupper($forma);
	if (!isset($SMTP[$forma]) && $forma != 'PHP')
		$forma = 'SES';

	if ($remetente == "no-reply") {
		$forma .= 'noreply';
	} elseif ($remetente == "no-reply-reply-to") {
		$forma .= 'noreply';
		$replyto = array($SMTP['SES']['FROM'][0], $SMTP['SES']['FROM'][1]);
	} elseif (is_array($remetente)) {
		list($usMail, $dmMail) = explode('@', $remetente[0]);
		$forma .= 'usuario';
		if ($usMail != 'naoresponda')
			$replyto = array($remetente[0], $remetente[1]);
	} elseif (filter_var($remetente, FILTER_VALIDATE_EMAIL)) {
		$forma .= 'usuario';
		$replyto = array($remetente, '');
	}
	return enviaEmail($destinatario, $mensagem, $forma, $replyto);
}

/**
 * 
 * @param type $destinatario
 * @param type $mensagem = array(mensagem,assunto,altMensagem,anexo); anexo = array(filename,disposition,name,mime)
 */
function enviaEmail($destinatario, $mensagem, $forma = 'SES', $replyto = '')
{
	$CI = &get_instance();
	global $SMTP;
	global $AGORA;
	$CI->load->library('email');
	if (!is_array($destinatario)) {
		$email = $destinatario;
		//$nome = $destinatario;
	} elseif (isset($destinatario['email'])) {
		$email = $destinatario['email'];
		//$nome = $destinatario['nome'];
	} elseif (isset($destinatario[0])) {
		$email = $destinatario[0];
		//$nome = $destinatario[1];
	}

	$headers = array();
	$headers['X-Auto-Response-Suppress'] = 'OOF, AutoReply';

	if ($mensagem['altMensagem'] == '') {
		$mensagem['altMensagem'] = desformata($mensagem['mensagem']);
	}

	//TRACK
	if (strpos($mensagem['mensagem'], 'imagemmail') === false) {
		$bodyF = strpos($mensagem['mensagem'], '</body>');
		$imagem = "<img src='" . URL . "/Estatistica/imagemmail?qu=" . encripta($email) . "' border='0'>";
		if ($bodyF !== false) {
			$mensagem['mensagem'] = substr($mensagem['mensagem'], 0, $bodyF) . $imagem . substr($mensagem['mensagem'], $bodyF);
		} else {
			$mensagem['mensagem'] .= $imagem;
		}
	}

	if (is_array($mensagem['anexo'])) {
		foreach ($mensagem['anexo'] as $anexo) {
			if (!is_array($anexo))
				$anexo = array('filename' => $anexo, 'disposition' => '', 'name' => null, 'mime' => '');
			if ($anexo['mime'] == '')
				$anexo['mime'] = @mime_content_type($anexo['filename']);
			if ($anexo['disposition'] == '')
				$anexo['disposition'] = 'attachment';
			$CI->email->attach($anexo['filename'], $anexo['disposition'], $anexo['name'], $anexo['mime']);
		}
	}
	$smtp = $SMTP[$forma];

	do {
		$config['smtp_host'] = $smtp['HOST'];
		$config['smtp_user'] = $smtp['USER'];
		$config['smtp_crypto'] = $smtp['CRYPTO'];
		$config['smtp_pass'] = $smtp['PASSWORD'];
		$config['smtp_port'] = $smtp['PORT'];
		$config['protocol'] = 'smtp';
		$config['validate'] = TRUE;
		$config['mailtype'] = 'html';
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";
		$CI->email->initialize($config);
		$CI->email->to($email);
		$CI->email->subject($mensagem['assunto']);
		$CI->email->message($mensagem['mensagem']);
		$CI->email->from($smtp['FROM'][1]); // Remetente
		$CI->email->set_newline("\r\n");
		$CI->email->set_alt_message($mensagem['altMensagem']);
		if (is_array($replyto) && count($replyto) > 0)
			$CI->email->reply_to($replyto[0], $replyto[1]);

		foreach ($headers as $k => $v)
			$CI->email->set_header($k, $v);
		$smtp = $SMTP[$smtp['ALT']]; //TROCAR PARA PROXIMA TENTATIVA
		// echo "<pre>$email";
		// print_r($config);
		// echo $CI->email->print_debugger();
	} while ($forma != 'PHP' && !($enviado = $CI->email->send()) && $smtp['HOST'] != '');

	if (!$enviado || $forma == 'PHP') {
		$formaFrom = $forma;
		if (!isset($SMTP[$formaFrom]))
			$formaFrom = 'SES';
		// echo "tentando localmente mail php";
		$enviado = @mail($email, $mensagem['assunto'], $mensagem['mensagem'], "FROM:" . $SMTP[$formaFrom]['FROM'][1] . '<' . $SMTP[$formaFrom]['FROM'][0] . '>' .
			((is_array($replyto) && count($replyto) > 0) ? "\r\nReply-To:$replyto[1]<$replyto[0]>" : "") .
			" \r\nMIME-Version: 1.0\r\nContent-type: text/html; charset=UTF-8 \r\n");
		//		if(!$enviado){
		//			@mail('direcao@anverso.net.br', "ERRO NO ENVIO DE EMAIL", "ORIGEM: $_SERVER[REQUEST_URI]\r\nPARA: ".print_r($destinatario, true)."\r\nREMETENTE: $forma\r\n".$mensagem['altMensagem']."\r\n");
		//		}
	}
	if ($enviado) {
		file_put_contents('log/EmailSendSucesso.txt', print_r($CI->email, true));
		//		$CI->db->query("update app_guests set ultimoenvioemail = '$AGORA', envioemail = envioemail + 1 where email = '".addslashes($email)."'");;
	} else {
		file_put_contents('log/EmailSendError.txt', $CI->email->print_debugger() . "\r\n" . print_r($CI->email, true) . "\r\n\r\n");
	}
	return $enviado;
}

function getMensagem($template)
{
	$CI = &get_instance();
	$CI->db->where('nome', $template);
	$query = $CI->db->get('mensagem');
	$rowMensagem = $query->row_array();

	$mensagem = array(
		'mensagem' => $rowMensagem['texto'],
		'assunto' => $rowMensagem['assunto'],
		'html' => ($rowMensagem['html'] == 1)
	);
	$GLOBALS['TEMPEMAIL'] = $template;
	return $mensagem;
}

function emailD($where, $template, $tipoUser = '', $anexo = '', $forma = 'SES')
{
	$CI = &get_instance();

	$CI->db->select('*');

	if ($tipoUser == '') {

		$CI->db->from('xy_convidados');
		// $CI->db->order_by('conhecimento_aula.id_aula','DESC');
		if (is_numeric($where)) {
			$where = array('id_convidado' => $where);
		}
	} else {
		$CI->db->from('usuario');
		// $CI->db->order_by('conhecimento_aula.id_aula','DESC');
		if (is_numeric($where)) {
			$where = array('user' => $where);
		}
	}
	$CI->db->where($where);
	$query = $CI->db->get();
	if (!$query) {
		$str = date('d/m/Y H:i:s') . "\r\nWHERE=" . print_r($where, true) . "\r\n";
		$str .= "SQL=" . $CI->db->last_query() . "\r\n";
		$str .= "CAMINHO=" . $_SERVER['REQUEST_URI'] . "\r\n";
		$str .= "REFERER=" . $_SERVER['HTTP_REFERER'] . "\r\n\r\n";
		file_put_contents('log/investigar.txt', $str, FILE_APPEND);
	}

	$rowUser = $query->row_array();

	$rowUser['utm_campaign'] = $template;
	$rowUser['utm_medium'] = 'automail';


	$msg = getMensagem($template);
	if ($msg['html']) {
		$msg = templateEmail($rowUser, $msg);
	} else { //sistema antigo DEPRECANDO
		$msg['mensagem'] = personaliza($rowUser, formata($msg['mensagem']));
		$msg['assunto'] = personaliza($rowUser, $msg['assunto']);
	}
	$msg['anexo'] = $anexo;
	//	print_r(array('email'=>$rowUser['email'], 'MSG'=>$msg));
	$envia = enviaEmail($rowUser['email'], $msg, $forma);
	file_put_contents('log/investigar.txt', $envia, FILE_APPEND);
	return $envia;
}

//FUNÇÕES DO SISTEMA ANTIGO, TENDEM A SER DESCONTINUADAS

if (!function_exists('Array2Txt')) {

	function Array2Txt($array, $compress = 0, $fill = '', $tab = 1)
	{
		if (!$fill) {
			$txt_return = 'array(';
		}
		$n = rand();
		$run[$n] = 0;
		for ($i = 0; $i < $tab; $i++) {
			$t .= "\t";
		}
		foreach ($array as $key => $value) {
			if (!$run[$n]) {
				$c = '';
			} else {
				$c = ', ';
			}
			$run[$n]++;
			if (is_array($value)) {
				$txt_return .= $c . "\n" . $t . '\'' . $key . '\' => array(' . Array2Txt($value, $compress, 1, $tab + 1);
				continue 1;
			}
			$txt_return .= $c . "\n" . $t . '\'' . $key . '\' => \'' . $value . '\'';
		}
		if (!$fill) {
			$txt_return .= ');' . "\n";
		} else {
			$txt_return .= ')';
		}
		if ($compress) {
			return gzcompress($txt_return, 9);
		} else {
			return $txt_return;
		}
	}

	function Txt2Array($arraytxt, $decompress = 0)
	{
		$return_array = '';
		if (!$arraytxt) {
			return array();
		}
		if ($decompress) {
			eval('$return_array = ' . gzuncompress($arraytxt));
			return $return_array;
		} else {
			/* if (!eval('$return_array = '.$arraytxt)) {
			  print '<h2>Txt2Array ERROR</h2>';
			  print $arraytxt;exit;
			  } */
			eval('$return_array = ' . $arraytxt);
			return $return_array;
		}
	}
}

function enc($a)
{
	/* 	$a = strtr(base64_encode(addslashes(gzcompress(serialize($a),9))), '+/=', '-._');
	  if(substr($a, 0,5)=='eNort')$a = substr($a, 5);
	  return $a;
	 */
	$b = str_split($a);
	$saida = '';
	foreach ($b as $v) {
		$saida .= chr($v * 2 + 97 + rand(0, 1));
	}
	return $saida;
}

function EmailEnc($email, $conversa, $usuario, $nome = 'usuario')
{
	$CI = &get_instance();
	$temp = explode(' ', trim($nome));
	$nome = preg_replace('/[^a-zA-Z0-9]/s', '', $temp[0]);
	if ($nome == '')
		$nome = 'usuario';
	if ($r = $CI->db->query("select hash from ant_msg_hash where email like '$email' and conversa = '$conversa' and u = '$usuario'")->unbuffered_row('array')) {
		$em = $r['hash'];
	} else {
		$CI->db->query("insert into ant_msg_hash (email,conversa,u)values('$email','$conversa','$usuario')");
		$id = $CI->db->insert_id();
		$em = enc($id + 1000);
		$CI->db->query("update ant_msg_hash set hash = '$em' where id = '$id'");
	}
	return $nome . '.' . $em . '@' . $GLOBALS['PORTAL_DOMINIO'];
}

function EmailDec($a)
{
	$CI = &get_instance();
	$t = explode('@', $a);
	$a = $t[0];
	$t = array_reverse(explode('.', $a));
	$r = $CI->db->query("select * from ant_msg_hash where hash like '$t[0]'")->unbuffered_row('array');
	return array($r['email'], $r['conversa'], $r['u']);
}

function userConversa($conversa, $user1)
{ //indica qual o usuário reverso da conversa
	$CI = &get_instance();
	if ($row = $CI->db->query("select * from ant_msg_conversa where id = '$conversa'")->unbuffered_row('array')) {
		if ($user1 == $row['u1'])
			$user2 = $row['u2'];
		else
			$user2 = $row['u1'];
	}
	return $user2;
}

function validaemail($email)
{
	$cont = 0;
	$email = str_replace(array("gmail.com.br", "gamil.com", "yahho", "hotmal.com", ".con.br"), " ", $email, $cont);

	if (!@filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$cont++;
	}
	if ($cont > 0)
		return false;
	else
		return true;
}

function emailS($dest, $assunto, $msg, $remetente, $forma)
{
	//Guarda as mensagens no banco de dados para envio futuro
	$CI = &get_instance();



	if (is_array($dest)) {
		$emaildest = addslashes($dest[0]);
		$nomedest = addslashes($dest[1]);
	} else {
		$emaildest = addslashes($dest);
		$nomedest = '';
	}
	$assunto = addslashes($assunto);
	$msg = addslashes($msg);
	$remetente = addslashes($remetente);
	$forma = addslashes($forma);

	return $CI->db->query("insert into emailsaida (emaildest, nomedest,assunto,msg,remetente,forma)VALUE('$emaildest','$nomedest','$assunto','$msg','$remetente','$forma')");
}

function emailMod($dest, $assunto, $msg, $rem, $data, $toUsuario, $fromUsuario, $conversa = 'nova')
{
	global $AGORA;
	// array($usuario['email'],$rowPerfil['nome']), $msg1['assunto'], personaliza($usuario, formata($msg1['mensagem'])), $rem, $AGORA, $usuario['user'], $this->login->usuario['user']
	$CI = &get_instance();
	//Guarda as mensagens no banco de dados para envio futuro
	if (is_array($dest)) {
		$toEmail = addslashes($dest[0]);
		$toName = addslashes($dest[1]);
		if ($dest['cc'] != '') {
			$comCopia = addslashes($dest['cc']);
		}
	} else {
		$toEmail = addslashes($dest);
		$toName = '';
	}
	if (is_array($rem)) {
		$fromEmail = addslashes($rem[0]);
		$fromName = addslashes($rem[1]);
		$listanegra = $rem['listanegra'];
	} else {
		$fromEmail = addslashes($rem);
		$fromName = '';
		$listanegra = 0;
	}
	if ($conversa == 'nova') {
		$CI->db->query("insert into ant_msg_conversa (u1,u2,inc)values('$fromUsuario','$toUsuario',$AGORA)");
		$conversa = $CI->db->insert_id();
	}
	$fromEmail = EmailEnc($fromEmail, $conversa, $fromUsuario, $fromName);
	$subject = addslashes($assunto);
	if (is_array($msg)) {
		$body = addslashes($msg[0]);
		$altbody = addslashes($msg[1]);
		if ($msg[2] != '')
			$anexos = addslashes(Array2Txt($msg[2]));
		else
			$anexos = '';
	} else {
		$body = addslashes($msg);
		$altbody = addslashes(desformata($msg));
	}
	return $CI->db->query("insert into ant_msg_mensagem (fromEmail,fromName,toEmail,toName,ccToEmail,subject,u,body,altbody,anexos,id_conversa,data,listanegra)
          	values('$fromEmail','$fromName','$toEmail','$toName','$comCopia','$subject','$toUsuario','$body','$altbody','$anexos','$conversa','$data','$listanegra')");
}

function formata($ent, $html = false)
{
	$fonA = "";
	$fonF = "";
	//	if(!$html){
	//		$fonA = "<font face='Arial' size='2'>";
	//		$fonF = "</font>";		
	//	}
	$ent = str_replace("\r", "", $ent);
	if (!$html)
		$ent = htmlentities($ent);
	$grupo = strpos($ent, "\n*");
	while ($grupo !== false) {
		$ent = substr($ent, 0, $grupo) . "<ul><li>" . substr($ent, $grupo + 2);
		$item = strpos($ent, "\n*", $grupo);
		$Nitem = strpos($ent, "\n", $grupo);
		if ($Nitem < $item)
			$item = false;
		while ($item) {
			$ent = substr($ent, 0, $item) . "</li><li>" . substr($ent, $item + 2);
			$item = strpos($ent, "\n*", $grupo);
			$Nitem = strpos($ent, "\n", $grupo);
			if ($Nitem < $item)
				$item = false;
		}
		if ($Nitem == 0)
			$ent .= "</li></ul>";
		else
			$ent = substr($ent, 0, $Nitem) . "</li></ul>" . substr($ent, $Nitem + 1);
		$grupo = strpos($ent, "\n*");
	}
	$URLcliente = $GLOBALS['PORTAL_URL'] . "/?loginD=[loginD]";
	$URLusuario = $GLOBALS['PORTAL_URL'] . "/[perfil]/edit.htm?loginD=[loginD]";
	$anunciante = "<h3>Perfil do Usuário</h3>
<p>Para acessar o seu perfil clique no link abaixo:
[link]" . $URLusuario . "[t] Acessar perfil do usuário[/link]
Ou acesse o endere&ccedil;o abaixo utilizando o seu login e senha
  [link]" . $GLOBALS['PORTAL_URL'] . "/login[/link]
Login: <strong>[email]</strong>
Senha: <strong>[senha]</strong></p>";



	$redesocial = ''; //($GLOBALS['FACEBOOK']!='' || $GLOBALS['YOUTUBE']!='')?("<div style='display:inline-block; margin:0 0 0 80px;float:right; vertical-align:top'>".($GLOBALS['FACEBOOK']!=''?"<a href='$GLOBALS[PORTAL_URL]/redesocial.php?r=FACEBOOK&q=[email]'><img alt='Facebook' title='Facebook' src='".$GLOBALS['PORTAL_URL']."/image/facebook-icon.png' border='0' style='vertical-align:middle;width:52px'></a> ":"").($GLOBALS['YOUTUBE']!=''?"<a href='$GLOBALS[PORTAL_URL]/redesocial.php?r=YOUTUBE&q=[email]'><img alt='YouTube' title='YouTube' src='".$GLOBALS['PORTAL_URL']."/image/youtube-icon.png' border='0' style='vertical-align:middle;width:52px'></a>":"")."</div>"):("");

	$cabecalho = "<a href='" . $GLOBALS['PORTAL_URL'] . "?utm_source=email&utm_medium=email_$GLOBALS[PREFIXO]&utm_campaign=$GLOBALS[TEMPEMAIL]&utm_content=logo'><img src='" . $GLOBALS['PORTAL_URL'] . "/Estatistica/imagemmail?qu=[emailencU]&i=logomenor.gif' border='0'></a>" . $redesocial;
	$assinatura = "Atenciosamente<br>" . $GLOBALS['PORTAL_NOME'] . "<br><a href='" . $GLOBALS['PORTAL_URL'] . "?utm_source=email&utm_medium=email_$GLOBALS[PREFIXO]&utm_campaign=$GLOBALS[TEMPEMAIL]&utm_content=assinatura'>www." . $GLOBALS['PORTAL_DOMINIO'] . "</a><br /><br />";
	/* $assinatura .=  "<table><tr>";
	  foreach($GLOBALS[TODOSPORTAIS] as $pre=>$temp){
	  if($pre!=$GLOBALS[PREFIXO])$assinatura .= 	"<td><a href='http://www.$temp/?af=EM".$GLOBALS[PREFIXO]."&utm_source=email&utm_medium=email_$GLOBALS[PREFIXO]&utm_campaign=$GLOBALS[TEMPEMAIL]&utm_content=logorodape'><img border='0' src='http://www.$temp/image/logoEm.gif'></a></td>";
	  }
	  $assinatura .= "</tr></table>";
	 */
	$cancelar = "<p style='font-size: 10px; text-align: center;'>Para não receber novamente este tipo de informativo [link]" . $GLOBALS['PORTAL_URL'] . "/configuracoes/cancelaremail?loginD=[loginD]&mod=[canc][t]clique aqui[/link]</p>";
	$edicao = "[link]{$URLusuario}[t]Atualizar anúncio[/link]";
	$pagamento = "[link]$GLOBALS[PORTAL_URL]/premium/?loginD=[loginD][t]Efetuar pagamento[/link]";
	$conversao = "";
	$excluir = "[link]$GLOBALS[PORTAL_URL]/configuracoes/?loginD=[loginD][t]Excluir anúncio[/link]";
	$recet = "";
	$parceiro = "";

	$ent = str_replace(
		array("[urlanu]", "[parceiro]", "[assinatura]", "[cabecalho]", "[anunciante]", "[usuario]", "[cancelar]", "[edicao]", "[pagamento]", "[conversao]", "[excluir]", "[recet]", "[portal]", "[url]", "[n]", "[/n]", "[i]", "[/i]", "[p]", "[/p]", "[g]", "[/g]", "[gg]", "[/gg]", "[ggg]", "[/ggg]", "[img]", "[/img]"),
		array($URLcliente, $parceiro, $assinatura, $cabecalho, $anunciante, $anunciante, $cancelar, $edicao, $pagamento, $conversao, $excluir, $recet, $GLOBALS['PORTAL_NOME'], $GLOBALS['PORTAL_URL'], "<strong>", "</strong>", "<em>", "</em>", "<small>", "</small>", "<h3>", "</h3>", "<h2>", "</h2>", "<h1>", "</h1>", "<img border='1' src='", "'>"),
		$ent
	);
	if (!$html)
		$ent = str_replace("\n", "<br>", $ent);
	$ent = str_replace(
		array("<br><p>", "<br><h1>", "<br><h2>", "<br><h3>", "</p><br>", "</h1><br>", "</h2><br>", "</h3><br>"),
		array("<p>", "<h1>", "<h2>", "<h3>", "</p>", "</h1>", "</h2>", "</h3>"),
		$ent
	);

	while ($il = strpos($ent, "[link]")) {
		if ($fl = strpos($ent, "[/link]", $il)) {
			$temp = substr($ent, $il + 6, $fl - $il - 6);
			if ($sep = strpos($temp, "[t]")) {
				$tit = substr($temp, $sep + 3);
				$link = substr($temp, 0, $sep);
				$utmcontent = $tit;
			} else {
				$tit = $temp;
				$link = $temp;
				$utmcontent = "URL";
			}
			$link = str_replace(" ", "", $link);
			$link .= (strpos($link, "?") ? "&" : "?") . "utm_source=email&utm_medium=email_$GLOBALS[PREFIXO]&utm_campaign=$GLOBALS[TEMPEMAIL]&utm_content=" . urlencode($utmcontent);
			$ent = substr($ent, 0, $il) . "<a href='$link'>$tit</a>" . substr($ent, $fl + 7);
		} else {
			$ent = substr($ent, 0, $il) . substr($ent, $il + 6);
		}
	}
	$ent = "<html><head>
	</head><body>$fonA$ent$fonF</body>";
	return $ent;
}

function personaliza($ent, $msg)
{



	$exibicao = $ent['exiacu'] + $ent['exibicao'];

	if ($ent['nome'] != "")
		$ent['responsavel'] = $ent['nome'];

	$emailenc = encripta($ent['email']);
	$emailencU = urlencode(encripta($ent['email']));
	$loginD = codifica($ent['email'] . '|' . $ent['senha']);
	$temp = explode(' ', trim($ent['responsavel']));
	$ent['primeironome'] = $temp[0];


	$exibicao = $ent['exiacu'] + $ent['exibicao'];
	$vencimento = $ent['vencimento'] > 0 ? date("d/m/y \à\s H:i:s", $ent['vencimento']) : 'indisponível';
	$mensagem2 = str_replace(
		array("[data]", "[perfil]", "[outro]", "[outro2]", "[servico]", "[emailenc]", "[emailencU]", '[loginD]', "[nome]", "[primeironome]", "[email]", "[codigo]", "[user]", "[empresa]", "[senha]", "[endereco]", "[numero]", "[bairro]", "[cidade]", "[estado]", "[site]", "[emailc]", "[fone]", "[anuncio]", "[keywords]", "[categoria]", "[categoria2]", "[categoria3]", "[inclusao]", "[atualizacao]", "[vencimento]", "[recetado]", "[exibicao]", "[canc]", "\\", "\\\"", "\\'"),
		array(date("d/m/y", $ent[data]), $ent[perfil], $ent[outro], $ent[outro2], $ent[servico], $emailenc, $emailencU, $loginD, $ent['responsavel'], $ent['primeironome'], $ent[email], $ent[codigo], $ent[user], $ent[empresa], $ent[senha], $ent[endereco], $ent[numero], $ent[bairro], $ent[cidade], $ent[estado], $ent[site], $ent[emailc], $ent[fone], $ent[anuncio], $ent[keywords], $ent[categoria], $ent[categoria2], $ent[categoria3], date("d/m/y", $ent[inclusao]), date("d/m/y", $ent[atualizacao]), $vencimento, date("d/m/y", $ent[recetado]), $exibicao, $ent[cancelar], "", "\"", "'"),
		$msg
	);
	return $mensagem2;
}

if (!function_exists('assunto')) {

	function assunto($nome)
	{
		$arr = getMensagem($nome);
		return $arr['assunto'];
	}

	function mensagem($nome)
	{
		$arr = getMensagem($nome);
		return $arr['mensagem'];
	}
}
if (!function_exists('pesquisaremail')) {

	function pesquisaremail($email, $formato = false)
	{
		//mysql_select_db ("organiza_vmail");
		$CI = &get_instance();
		$arr = array();
		$saida = false;
		$total = 0;
		$resultado = $CI->db->query("SELECT motivo, data, COUNT(*) as total FROM (select motivo, data FROM voltou WHERE email = ? and motivo not like 'Visto como SPAM' order by data desc) as zz GROUP BY motivo", array($email));
		while ($row = $resultado->unbuffered_row('array')) {
			$arr[] = $row; //motivo data e total
			$total += $row['total'];
		}
		if ($total > 0) {
			if ($formato === 'array') {
				$saida = $arr;
			} elseif ($formato) {
				//$saida = "<div style='color:#FFF; background-color:#FF00FF;'>";
				foreach ($arr as $v)
					$saida .= "$v[total] X $v[motivo]<br>";
				//$saida .= "</div>";
			} else {
				$saida = $total;
			}
		}
		//mysql_select_db ($GLOBALS['PORTAL_BANCO']);
		return $saida;
	}
}
