<?php

$HOSTS = array(
    'a.evv.com.br' => 'http://www.agendadoprodutor.com/',
    'adp.evv.com.br' => '',
    'agendadoprodutor.com' => '',
    'localhost' => '',
    '34.193.85.149' => '',
    'teste.agendadoprodutor.com.br' => '',
    'agendaprod.com' => '',
    'www.casan.do' => '',
    'casan.do' => ''
);
$HOSTSImg = array(//caso não encontre o arquivo procurar em qual servidor?
    //'teste.agendadoprodutor.com.br'=>'http://www.agendadoprodutor.com/',
    'www.agendadoprodutor.com' => '',
    'www.skus.com.br' => '',
    'www.casan.do' => '',
    'casan.do' => ''
);
$PASTAS = array(
    'a.evv.com.br' => 'adp/',
    'adp.evv.com.br' => '',
    'agendadoprodutor.com' => '',
    'www.agendadoprodutor.com' => '',
    'localhost' => '',
    'teste.agendadoprodutor.com.br' => '',
    'agendaprod.com' => '',
    'www.skus.com.br' => '',
    'www.casan.do' => '',
    'casan.do' => ''
);
$PASTASRoot = array(//para CSS
    'a.evv.com.br' => '/',
    'adp.evv.com.br' => '/',
    'agendadoprodutor.com' => '/',
    'www.agendadoprodutor.com' => '/',
    'localhost' => '/casando/',
    'agendaprod.com' => '/adp/',
    '34.193.85.149' => '/~adp/',
    'teste.agendadoprodutor.com.br' => '/',
    'www.skus.com.br' => '/',
    'www.casan.do' => '/',
    'casan.do' => '/',
    'localhost' => '/'
);
$PrefixosImgs = array(
    'teste.agendadoprodutor.com.br' => '',
    'www.agendadoprodutor.com' => '',
    'agendadoprodutor.com.br' => '',
    'a.evv.com.br' => 'img/',
    'www.skus.com.br' => '',
    'www.casan.do' => '',
    'casan.do' => '',
    'localhost' => ''
);

$dominio = $HOSTS[$_SERVER["HTTP_HOST"]];
if (isset($HOSTSImg[$_SERVER["HTTP_HOST"]])) {
    $dominioImg = $HOSTSImg[$_SERVER["HTTP_HOST"]];
} else
    $dominioImg = $dominio;
$pasta = $PASTAS[$_SERVER["HTTP_HOST"]];
$PrefixoImg = $PrefixosImgs[$_SERVER["HTTP_HOST"]];
$pastaRoot = $PASTASRoot[$_SERVER["HTTP_HOST"]];
if ($pasta == '')
    chdir('../');

$ELOCALHOST = ($_SERVER["HTTP_HOST"] == 'localhost' || $_SERVER["HTTP_HOST"] == 'agendaprod.com');
$IMAGEMPADRAO = 'img/alternativa.png';
$CACHEFOLDER = 'cache/';

function iniCache($file) {
    global $CACHE;
    $CACHE = array(false, $file);
    if (!file_exists($file)) {
        ob_start();
        $CACHE[0] = true;
    }
    return $CACHE[0];
}

function endCache() {
    global $CACHE;
//	foreach($GLOBALS AS $k=>$v)$$k = $v;
    if ($CACHE[0]) {
        $T = ob_get_contents();
        file_put_contents($CACHE[1], $T);
        ob_end_clean();
        echo $T;
    } else {
        include($CACHE[1]);
    }
}
