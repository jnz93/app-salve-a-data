<?php
header('Content-Type: text/javascript;charset=utf-8');
header("Cache-Control: max-age=31536000");
header("Expires: ".date('r',time()+31536000));

include './func_estatico.php';

if(!isset($_REQUEST['f'])||strpos($_REQUEST['f'], 'v=')!==false){
	if(!isset($_REQUEST['f'])){
		$temp = explode('f=', $_REQUEST['v']);
		$_REQUEST['v'] = $temp[0];
		$_REQUEST['f'] = $temp[1];
	}else{
		$temp = explode('v=', $_REQUEST['f']);
		$_REQUEST['f'] = $temp[0];
		$_REQUEST['v'] = $temp[1];
	}
	$logBug = $CACHEFOLDER."jscss/logBug.txt";
	file_put_contents($logBug,"\r\n".date('c')."\t".$arquivo."\tREQUESTURI:".$_SERVER['REQUEST_URI']."\tUSERAGENT:".$_SERVER['HTTP_USER_AGENT']."\tREFERER:".$_SERVER['HTTP_REFERER'],FILE_APPEND);
}

$files = explode(',', $_REQUEST['f']);
$versao = $_REQUEST['v'];

$url = 'https://javascript-minifier.com/raw';
$log = $CACHEFOLDER."jscss/log.txt";
$logFALHA = $CACHEFOLDER."jscss/logFALHA.txt";

$arquivo = '';
$versao = str_replace('/', '', $versao);
foreach($files as $k => $f){
	if($k>0)
		$arquivo .= '-';
	$arquivo .= basename($f,".js");
}
$arquivo = $CACHEFOLDER."jscss/$arquivo-$versao.js";
$FALHA = false;

if($ELOCALHOST){
	foreach($files as $f){
		$temp = pathinfo($f);
		if(is_file($f) && strtolower($temp['extension'])=='js'){
			echo file_get_contents($dominio.$f)."\r\n\r\n";
		}
	}
}else{
	if(iniCache($arquivo)){
		foreach($files as $f){
			$temp = pathinfo($f);
			if(($dominio!='' || is_file($f)) && strtolower($temp['extension'])=='js'){
				$js = @file_get_contents($dominio.$f);
				$txtdata = 'input='.urlencode($js);
				if($FALHA){
					$minified = '';
				}else{
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $txtdata);
					curl_setopt($ch, CURLOPT_TIMEOUT, 15);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					$minified = curl_exec($ch);
					curl_close($ch);
				}
				if(strlen($minified)<=100 || strpos($minified,'<head><title>502 Bad Gateway</title></head>')!==false){
					$FALHA = true;
					echo "/*falha em $f*/";
					echo $js;
					file_put_contents($logFALHA,"\r\n".date('c')."\tFILE: ".$f."\tEMCACHE: ".$arquivo."\tREQUESTURI:".$_SERVER['REQUEST_URI']."\tUSERAGENT:".$_SERVER['HTTP_USER_AGENT']."\tREFERER:".$_SERVER['HTTP_REFERER'],FILE_APPEND);
				}else echo ($minified)."\r\n";				
			}
		}
		file_put_contents($log,"\r\n".date('c')."\t".$arquivo."\tREQUESTURI:".$_SERVER['REQUEST_URI']."\tUSERAGENT:".$_SERVER['HTTP_USER_AGENT']."\tREFERER:".$_SERVER['HTTP_REFERER'],FILE_APPEND);
		$last_modified = time();
	}else{
		$last_modified = filemtime($arquivo);
	}
	header("Last-Modified: ".gmdate("D, d M Y H:i:s", $last_modified)." GMT");
	endCache();
}