<?php
header('Content-Type: text/css;charset=utf-8');
header("Cache-Control: max-age=31536000");
header("Expires: ".date('r',time()+31536000));

include './func_estatico.php';

function getCssVar($str, &$d){
	$arr = array();
	preg_match_all('/root\{(.*?)}/is', $str,$arr);
	$root = $arr[1];
	//print_r($arr);
	foreach($root as $r){
		preg_match_all('/(?:(?:([-a-zA-Z0-9\#]+)\s*\:\s*([-a-zA-Z0-9\#]+)\s*)*\s*;+?)/ism', $r,$arr);

		foreach($arr[1] as $k=>$v){
			$d[$v] = $arr[2][$k];
		}
	}
}
function setCssVar($str,$d){
	if(is_array($d))
	foreach($d as $key=> $value){
		$str = preg_replace ( '/var\(\s*'.$key.'\s*\)/i', $value , $str); 
	}
	return $str;
}


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

$url = 'https://cssminifier.com/raw';
$log = $CACHEFOLDER."jscss/log.txt";
$logFALHA = $CACHEFOLDER."jscss/logFALHA.txt";

$arquivo = '';
$versao = str_replace('/', '', $versao);
foreach($files as $k => $f){
	if($k>0)
		$arquivo .= '-';
	$arquivo .= basename($f, ".css");
}
$arquivo = $CACHEFOLDER."jscss/$arquivo-$versao.css";


if($ELOCALHOST){
	$variaveis = array();
	foreach($files as $f){
		$temp = pathinfo($f);
		if(is_file($f) && strtolower($temp['extension'])=='css'){
			//echo file_get_contents($f);
			if($temp['dirname']=='.')$temp['dirname'] = '';
			else $temp['dirname'] = $temp['dirname'].'/';
			$js = @file_get_contents($f);
					getCssVar($js, $variaveis);
			$js = setCssVar($js,$variaveis);
			echo preg_replace('/([:,][^;{}]*url\(\s*["\']?)([a-zA-Z0-9._@\?#\/-]+["\']?\s*\))/iU' ,  "\\1$pastaRoot$pasta{$temp['dirname']}\\2" , $js);
		}
	}
}else{
	$FALHA = false;
	if(iniCache($arquivo)){
		$variaveis = array();	
		foreach($files as $f){
			$temp = pathinfo($f);
			if(($dominio!='' || is_file($f)) && strtolower($temp['extension'])=='css'){
				$js = @file_get_contents($dominio.$f);
				
				getCssVar($js, $variaveis);
				$js = setCssVar($js,$variaveis);
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
					$minified = $js;
					file_put_contents($logFALHA,"\r\n".date('c')."\tFILE: ".$f."\tEMCACHE: ".$arquivo."\tREQUESTURI:".$_SERVER['REQUEST_URI']."\tUSERAGENT:".$_SERVER['HTTP_USER_AGENT']."\tREFERER:".$_SERVER['HTTP_REFERER'],FILE_APPEND);
				}//else $minified = utf8_decode($minified);
				if($temp['dirname']=='.')$temp['dirname'] = '';
				else $temp['dirname'] = $temp['dirname'].'/';
				echo preg_replace('/([:,][^;{}]*url\(\s*["\']?)([a-zA-Z0-9._@\?#\/-]+["\']?\s*\))/iU' ,  "\\1$pastaRoot$pasta{$temp['dirname']}\\2" , $minified)."\r\n";
				
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