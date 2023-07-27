<?

ob_start();
include './func_estatico.php';
if($dominioImg != '')
	$pastaImg = $pasta.$PrefixoImg;
$img = $_GET['img'];
$crop = array(0, 0, 0, 0);
if(isset($_GET['w']) && ($_GET['w'] != 0 || $_GET['h'] != 0)){
	$w = $_GET['w'];
	$h = $_GET['h'];
	if(!is_numeric($w) || $w > 2048)
		$w = 130;
	if(!is_numeric($h) || $h > 2048)
		$h = 130;
	$original = false;
	if(isset($_GET['c']) && $_GET['c'] != ''){
		$crop = explode(',', $_GET['c']);
		if(count($crop) == 4){
			foreach($crop as $v){
				if(!is_numeric($v)){
					$crop = array(0, 0, 0, 0);
					break;
				}
			}
			if($crop[2] < $crop[0] || $crop[3] < $crop[1]){
				$crop = array(0, 0, 0, 0);
			}
		}else{
			$crop = array(0, 0, 0, 0);
		}
	}
}else{
	$original = true;
}
if(substr($img, 0, 4) == 'http'){
	$tirar = array(
		'http://'.$_SERVER["HTTP_HOST"].'/',
		urlencode('http://'.$_SERVER["HTTP_HOST"].'/')
	);
	foreach($HOSTS as $k=> $v){
		$tirar[] = $k;
		$tirar[] = urlencode($k);
	}
	$img = str_replace($tirar, '', $img);
}
$imgFim = $pastaImg.$img;

$fsize = @filesize($imgFim);

$falha = false;

if($fsize === false || $fsize < 10){//tentar carregar no maximo 10 vezes
	if($dominioImg != ''){//importar arquivo
		if($fsize === false || time() > @filemtime($imgFim) + 86400){
			$dirname = pathinfo($imgFim, PATHINFO_DIRNAME);
			if(!file_exists($dirname)){
				mkdir($dirname, 02775, true);
			}
			$conteudo = @file_get_contents($dominioImg.$img);
			if($conteudo != ''){
				file_put_contents($imgFim, $conteudo);
			}else{
				file_put_contents($imgFim, '1', FILE_APPEND);
				$imgFim = $pasta.$IMAGEMPADRAO;
				$falha = true;
			}
		}else{
			$imgFim = $pasta.$IMAGEMPADRAO;
			$falha = true;
		}
	}else{
		$imgFim = $pasta.$IMAGEMPADRAO;
		$falha = true;
	}
}elseif($fsize <= 15){
	$imgFim = $pasta.$IMAGEMPADRAO;
	$falha = true;
}


if($original){
	$Narq = $imgFim;
}else{
	$Narq = $CACHEFOLDER."thumb/$w.$h.".implode('-', $crop).str_replace('/', '-', $img);
	if(!is_file($Narq)){
		ini_set('memory_limit', '256M');
		include 'application/helpers/image_helper.php';
		$erro = '';
		$GLOBALS['TAMANHOLIMITE'] = 1920;
		FormatImage($imgFim, $Narq, $erro, $w, $h, $crop, "jpg", 2);
		if($erro != '')
			file_put_contents($CACHEFOLDER."thumb/erro.txt", $erro."\r\n");
	}
}
ob_end_clean();
$expires = 60 * 60 * 24 * 365; //1 ano
if($falha){
	header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
}else{
	header("Pragma: public");
	header("Cache-Control: maxage=".$expires);
	header('Expires: '.gmdate('D, d M Y H:i:s', time() + $expires).' GMT');
}
header("content-type: image/jpeg");

if(is_file($Narq)){
	header("Last-Modified: ".gmdate("D, d M Y H:i:s", filemtime($Narq))." GMT");
	readfile($Narq);
}
