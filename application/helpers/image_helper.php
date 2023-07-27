<?php
/**
 * 
 * @param int $Fw 
 * @param int $Fh
 * @param int $w
 * @param int $h
 * @param list(0,1,2) $enquadramento 0=> recorta imagem original, 1=> completa com branco, 2=> altera tamanho da imagem final
 * @return list($ox,$oy, $cw, $ch, $nw, $nh)
 */
function enquadramento($Fw,$Fh,$w,$h,$enquadramento=2){
	if(isset($GLOBALS['TAMANHOLIMITE']) && is_numeric($GLOBALS['TAMANHOLIMITE']))$TAMANHOLIMITE = $GLOBALS['TAMANHOLIMITE'];
	else $TAMANHOLIMITE = 1024;
	$TAMANHOLIMITE = min(array(2300,$TAMANHOLIMITE));
		if($Fw>$TAMANHOLIMITE)$Fw = $TAMANHOLIMITE;
		if($Fh>$TAMANHOLIMITE)$Fh = $TAMANHOLIMITE;
		if($enquadramento===2){
			if($w/$h >= $Fw/$Fh){//mais comprida que o esperado
				$nh = $Fh;//nova altura DESEJADA
				$nw = ($w*$Fh/$h);//nova largura DESEJADA
				$ox = ($Fw - $nw)/2;//origem do recorte X
				$oy = 0;//origem do recorte Y
				$cw = $Fw;//nova largura
				$ch = $Fh;//nova altura
			}else {//mais alta que o esperado
				$nw = $Fw;
				$nh = ($h*$Fw/$w);
				$ox = 0;
				$oy = ($Fh - $nh)/2;
				$cw = $Fw;
				$ch = $Fh;
			}
		}elseif($enquadramento==1){
			if($w/$h >= $Fw/$Fh){//mais comprida que o esperado
				$nw = $Fw;
				$nh = ($h*$Fw/$w);
				$ox = 0;
				$oy = ($Fh - $nh)/2;
				$cw = $Fw;
				$ch = $Fh;
			} else {//mais alta que o esperado
				$nh = $Fh;
				$nw = ($w*$Fh/$h);
				$ox = ($Fw - $nw)/2;
				$oy = 0;
				$cw = $Fw;
				$ch = $Fh;
			}
		}else{
			if($Fw>0 && ($Fw/$w <= $Fh/$h || $Fh==0)){
				$nw = $Fw;
				$nh = $h*($Fw/$w);
			}
			if($Fh>0 && ($Fw/$w > $Fh/$h || $Fw==0)){
				$nh = $Fh;
				$nw = ($Fh/$h)*$w;
			}
			if($Fw==0 && $Fh==0){
				if($w>$TAMANHOLIMITE||$h>$TAMANHOLIMITE*2 ||$h>$TAMANHOLIMITE*$h/$w){
					if($w>=$h){
						$nw = $TAMANHOLIMITE;
						$nh = $TAMANHOLIMITE*$h/$w;
					}else{
						$nw = $TAMANHOLIMITE*$w/$h;
						$nh = $TAMANHOLIMITE;
					}
				}else{
					$nw = $w;
					$nh = $h;
				}
			}
			$cw = $nw;
			$ch = $nh;
			$ox = 0;
			$oy = 0;
		}
		return array($ox,$oy, $cw, $ch, $nw, $nh);
}

/**
 * 
 * Redimenciona/recorta uma imagem e salva 
 * @param $Ftmp_name	string Nome do Arquivo Atual
 * @param $Inome	string Nome do Novo Arquivo
 * @param &$erro	*string Ponteiro para variavel que armazena mensagem de Erro.
 * @param $Fw	int largura desejada
 * @param $Fh	int altura desejada
 * @param $crop	array($x1,$y1,$x2,$y2) Para recorte coordenada superior esquerda e inferior direita
 * @param $tsaida	string Tipo de Saída (jpg, gif,png)
 * @param $enquadramento int Sobra de espaço 0=> reduzir imagem, 1=> completar com Branco, 2=> cortar bordas para adequar tamanho  
 */

function FormatImage($Ftmp_name,$Inome,&$erro,$Fw,$Fh,$crop=array(0,0,0,0),$tsaida="jpg",$enquadramento=0){
	$rotateCod= array(3=>180,6=>-90,8=>90);	
	$exif = @exif_read_data($Ftmp_name);//capturando exif para ver orientação da imagem

	list($x1,$y1,$x2,$y2) = $crop;
	$tam = @getimagesize($Ftmp_name);
	if($exif['Orientation']==6||$exif['Orientation']==8){
		//posição retrato
		$wO = $tam[1];
		$hO = $tam[0];
	}else{
		$wO = $tam[0];//largura
		$hO = $tam[1];//altura
	}
	if($x1<0)$x1=0;
	if($x2>$wO)$x2 = $wO;
	if($y1<0)$y1 = 0;
	if($y2>$hO)$y2 = $hO;
	if($x1>=$x2 || $y1>=$y2 ||$x1>$wO||$x2>$wO||$y1>$hO||$y2>$hO){
		$x1 = 0;
		$y1 = 0;
		$x2 = $wO;
		$y2 = $hO;
	}
	$w = $x2-$x1;
	$h = $y2-$y1;

	$tipoImg = $tam[2];
	if($tipoImg==1 || $tipoImg==2 || $tipoImg==3){
		list($ox,$oy, $cw, $ch, $nw, $nh) = enquadramento($Fw,$Fh,$w,$h,$enquadramento);
		
		
		$thumb = imagecreatetruecolor($cw, $ch);
		imagefill($thumb, 0, 0, imagecolorallocate($thumb, 255, 255, 255));//gera imagem Branca
		if($tipoImg==1){
			$source = imagecreatefromgif($Ftmp_name);
			$retorna = true;
		}elseif($tipoImg==2){
			$source = imagecreatefromjpeg($Ftmp_name);
			$retorna = true;
		}elseif($tipoImg==3){
			$source = imagecreatefrompng($Ftmp_name);
			$retorna = true;
		}
		if(isset($rotateCod[$exif['Orientation']])){
			$source = imagerotate($source, $rotateCod[$exif['Orientation']], 0);
		}
		imagecopyresampled($thumb, $source, $ox,$oy, $x1, $y1, $nw, $nh, $w, $h);
		if($tsaida=="jpg")imagejpeg($thumb,$Inome,94);
		if($tsaida=="png")imagepng($thumb,$Inome);
		if($tsaida=="gif")imagegif($thumb,$Inome);
	}else{
		$erro = array("O arquivo não é imagem",$Fname);
		$retorna = false;
	}
	return $retorna;
}
function erroUpload($Ferror){
	if($Ferror<=0){
		return false;
	}elseif($Ferror == UPLOAD_ERR_INI_SIZE || $Ferror == UPLOAD_ERR_FORM_SIZE){//1 ou 2
		return "O arquivo excede o limite de envio";
	}elseif($Ferror == UPLOAD_ERR_PARTIAL){//3
		return "O arquivo foi enviado parcialmente";
	}elseif($Ferror == UPLOAD_ERR_NO_FILE){//4
		return "Nenhum arquivo foi selecionado";
	}elseif($Ferror==UPLOAD_ERR_EXTENSION){//8
		return "A extensão do arquivo não é permitida";
	}else{
		return "Ocorreu um erro inesperado com o arquivo";
	}
}
function upImagem($Iarq,$Inome,&$erro,$Fw,$Fh,$crop=array(0,0,0,0),$ind="",$tsaida="jpg",$enquadramento=0) {//atualizar imagem
	/*
	 $Iarq = form name
	 $Inome = Novo Nome
	 $Fw = nova largura
	 $Fh  = nova altura
	 &$erro = retorno de erro
	 $ind indice do form name[]
	 */
	if(is_array($_FILES[$Iarq]["tmp_name"])){
		$Fname = $_FILES[$Iarq]['name'][$ind];
		$Ftype = $_FILES[$Iarq]['type'][$ind];
		$Fsize = $_FILES[$Iarq]['size'][$ind];
		$Ftmp_name = $_FILES[$Iarq]['tmp_name'][$ind];
		$Ferror = $_FILES[$Iarq]['error'][$ind];
	}else{
		$Fname = $_FILES[$Iarq]['name'];
		$Ftype = $_FILES[$Iarq]['type'];
		$Fsize = $_FILES[$Iarq]['size'];
		$Ftmp_name = $_FILES[$Iarq]['tmp_name'];
		$Ferror = $_FILES[$Iarq]['error'];
	}
	if ($erro = erroUpload($Ferror,$Fname,$ind)){
		$erro = array($erro,$Fname);
		return false;
	}else{
		return FormatImage($Ftmp_name,$Inome,$erro,$Fw,$Fh,$crop,$tsaida,$enquadramento);
	}//fim erro ou não de envio
}//fim imagem