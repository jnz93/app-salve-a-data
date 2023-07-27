<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salve a Data - Template Aniversário</title>
    <link rel="icon" href="<?=base_url("image/favicon.png")?>">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- end font -->

    <link rel="stylesheet" href="<?=base_url("site/css/bootstrap.css")?>">
    <link rel="stylesheet" href="<?=base_url("site/css/ionicons.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("site/css/magnific-popup.css")?>">
    <link rel="stylesheet" href="<?=base_url("site/css/style.css")?>">
    <link href="<?=base_url("assets/css/icons.min.css")?> rel=" stylesheet" type="text/css" />
    <link href="<?=base_url("assets/libs/magnific-popup/magnific-popup.css")?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" />

    <style>
    .home-intro .content h2 .color-highlight {
        color: #ffffff;

    }

    a.nav-link {
        padding: 36px 0;
    }

    .content li {
        margin: 0 !important;
    }

    .modal-header {
        border-bottom: none;
        display: inline-block;
    }

    .modal-footer {
        border-top: none;
        display: inline-block;
        width: 100%;
    }

    .home-intro {
        padding: 175px 0;
        margin: 94px 0 0 0;
        background-size: 100% auto;
        background-repeat: no-repeat;
    }

    .titleEsquerda {
        font-weight: 700;
        font-size: 48px;
        line-height: 70px;
        letter-spacing: -0.005em;
        color: #3B3E44;
    }

    p.descricaoEsquerda {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #84878B;
    }

    .boxTextoCentro {
        padding: 50px 0 0 0;
    }

    img.modelosSite {
        width: 100%;
    }

    h3.titleDireito {
        font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 70px;
        letter-spacing: -0.005em;
        color: #FFFFFF;
    }

    p.descricaoDireito {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #FFFFFF;
    }

    h3.titleCentro {
        font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 70px;
        text-align: center;
        letter-spacing: -0.005em;
        color: #3B3E44;
        margin: 100px 0 0 0;
    }

    div#services {
        padding: 105px;
    }

    .boxLeads {
        margin: 109px 0 0 0;
    }

    .words-section .content {
        background: #232323;
        padding: 40px;
        border-radius: 15px;
    }

    .boxLeads p {
        color: #ffffff;
    }

    button.botaoLead {
        background: #141416;
        box-shadow: 0px 12px 20px -5px rgb(23 23 126 / 10%);
        border-radius: 4px;
        color: #ffffff;
        border: 0;
        padding: 8px;
    }

    footer {
        background: #000000;
        padding: 0;
    }

    .brand img {
        width: 58px !important;
        margin: 10px 0;
    }

    footer h5 {
        color: #222529 !important;
        margin-bottom: 15px;
        margin-top: 25px;
    }

    footer ul li a {
        font-style: normal;
        font-weight: 200;
        font-size: 16px;
        line-height: 24px;
        color: #84878B;
    }

    nav.navbar.navbar-expand-md.navbar-light.fixed-top {
        background: #000000;
        padding: 0px;
    }

    .navbar .navbar-nav li .nav-link {
        font-size: 15px;
        font-weight: 500;
        color: #020312;
        transition: all .3s ease;
        color: #ffffff;
    }

    .navbar-light .navbar-brand {
        color: rgba(0, 0, 0, 0.9);
        background: #FA9362;
        box-shadow: 0px 2px 2px rgb(0 0 0 / 10%);
        border-radius: 0px 0px 20px 20px;
        top: -21px;
        position: absolute;
        padding: 40px 0px;
    }

    .textoPadrao p {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        text-align: center;
        color: #3B3E44;
    }

    .flipper {
        color: #333;
        display: block;
        font-size: 50px;
        line-height: 100%;
        padding: 0;
        margin: 0;
        height: 1.7em;
    }

    .flipper.flipper-invisible {
        font-size: 0px !important;
    }

    .flipper-group {
        position: relative;
        white-space: nowrap;
        display: block;
        float: left;
        padding: 0;
        margin: 0;
    }

    .flipper-group label {
        position: absolute;
        color: #fff;
        font-size: 20%;
        top: 100%;
        line-height: 1em;
        left: 50%;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
        text-align: center;
        padding-top: .5em;
    }

    .flipper-digit {
        white-space: nowrap;
        position: relative;
        padding: 0;
        margin: 0;
        display: inline-block;
        float: left;
        height: 1.2em;
        overflow-y: hidden;
    }

    .flipper-digit span {
        font-size: 25%;
    }

    .flipper-delimiter {
        white-space: nowrap;
        display: block;
        float: left;
        padding: 0;
        margin: 0;
        color: #fff;
        min-width: .1em;
        white-space: nowrap;
        display: block;
        padding-top: 0.1em;
        padding-bottom: 0.1em;
        line-height: 1em;
    }

    .digit-face {
        display: block;
        visibility: hidden;
        position: relative;
        border-radius: 0.1em;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 8;
        padding-top: 0.1em;
        padding-bottom: 0.1em;
        padding-left: 0.1em;
        padding-right: 0.1em;
        box-sizing: border-box;
        text-align: center;
    }

    .digit-next {
        display: block;
        position: relative;
        border-radius: 0.1em;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 8;
        height: 1.2em;
        background: #fff;
        padding-top: 0.1em;
        padding-bottom: 0.1em;
        padding-left: 0.1em;
        padding-right: 0.1em;
        box-sizing: border-box;
        text-align: center;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .digit-top {
        z-index: 10;
        top: 0;
        left: 0;
        right: 0;
        height: 50%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        pointer-events: none;
        overflow: hidden;
        position: absolute;
        background: #fff;
        padding-top: 0.1em;
        padding-bottom: 0;
        padding-left: 0.1em;
        padding-right: 0.1em;
        border-top-left-radius: 0.1em;
        border-top-right-radius: 0.1em;
        box-sizing: border-box;
        text-align: center;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        transition: background 0s linear, -webkit-transform 0s linear;
        transition: transform 0s linear, background 0s linear;
        transition: transform 0s linear, background 0s linear, -webkit-transform 0s linear;
        -webkit-transform-origin: 0 0.6em 0 !important;
        transform-origin: 0 0.6em 0 !important;
        -webkit-transform-style: preserve-3d !important;
        transform-style: preserve-3d !important;
        z-index: 20;
    }

    .digit-top.r {
        transition: background 0.2s linear, -webkit-transform 0.2s linear;
        transition: transform 0.2s linear, background 0.2s linear;
        transition: transform 0.2s linear, background 0.2s linear, -webkit-transform 0.2s linear;
        -webkit-transform: rotateX(90deg);
        transform: rotateX(90deg);
        background: #cccccc;
    }

    .digit-top2 {
        visibility: hidden;
        position: absolute;
        height: 50%;
        left: 0;
        right: 0;
        background: #cccccc;
        transition: -webkit-transform 0.2s linear;
        transition: transform 0.2s linear;
        transition: transform 0.2s linear, -webkit-transform 0.2s linear;
        line-height: 0em !important;
        top: 50% !important;
        bottom: auto !important;
        padding-top: 0;
        padding-bottom: 0.1em;
        padding-left: 0.1em;
        padding-right: 0.1em;
        border-bottom-left-radius: 0.1em;
        border-bottom-right-radius: 0.1em;
        overflow: hidden;
        text-align: center;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        transition: background 0s linear, -webkit-transform 0s linear;
        transition: transform 0s linear, background 0s linear;
        transition: transform 0s linear, background 0s linear, -webkit-transform 0s linear;
        -webkit-transform: rotateX(-90deg);
        transform: rotateX(-90deg);
        -webkit-transform-style: preserve-3d !important;
        transform-style: preserve-3d !important;
        -webkit-transform-origin: 0 0 0 !important;
        transform-origin: 0 0 0 !important;
        z-index: 20;
    }

    .digit-top2.r {
        visibility: visible;
        transition: background 0.2s linear 0.2s, -webkit-transform 0.2s linear 0.2s;
        transition: transform 0.2s linear 0.2s, background 0.2s linear 0.2s;
        transition: transform 0.2s linear 0.2s, background 0.2s linear 0.2s, -webkit-transform 0.2s linear 0.2s;
        -webkit-transform: rotateX(0deg);
        transform: rotateX(0deg);
        background: #fff;
    }

    .digit-bottom {
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        pointer-events: none;
        position: absolute;
        overflow: hidden;
        background: #fff;
        height: 50%;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9;
        line-height: 0em;
        padding-top: 0;
        padding-bottom: 0.1em;
        padding-left: 0.1em;
        padding-right: 0.1em;
        border-bottom-left-radius: 0.1em;
        border-bottom-right-radius: 0.1em;
        box-sizing: border-box;
        text-align: center;
        transition: none;
    }

    .digit-bottom.r {
        transition: background 0.2s linear;
        background: #cccccc;
    }

    .flipper-digit:after {
        content: "";
        position: absolute;
        height: 2px;
        background: rgba(0, 0, 0, 0.5);
        top: 50%;
        display: block;
        z-index: 30;
        left: 0;
        right: 0;
    }

    h2.tituloSobre {
        font-style: normal;
        font-weight: 600;
        font-size: 40px;
        line-height: 80px;
        letter-spacing: -0.005em;
        color: #3B3E44;
    }

    .textoSobre p {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #3B3E44;
    }

    .textoSobre {
        padding: 30px;
    }

    .btTransparente {
        background: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid #E7ECF3;
        border-radius: 4px;
    }

    .imgSection {
        background-size: 100% auto;
        background-repeat: no-repeat;
    }

    .linhaAlbumUm {
        height: 200px;
        background: #f0f0f0;
        padding: 20px;
        margin: 25px 1px;
        border-radius: 15px;
    }

    .linhaAlbumDois {
        height: 350px;
        background: #f0f0f0;
        border-radius: 15px;
        padding: 20px;
    }

    .linhaAlbumTres {
        height: 184px;
        background: #f0f0f0;
        border-radius: 15px;
        padding: 20px;
        margin: 26px 0 0 0;
    }

    input.form-control {
        background: rgba(177, 181, 196, 0.1);
        border-radius: 4px;
    }

    label {
        font-weight: 200;
        font-size: 16px;
        line-height: 19px;
        color: #84878B;
    }

    .campoForm {
        padding: 15px;
    }

    .btConfirma {
        background: #000000 !important;
        border: 1px solid #E7ECF3 !important;
        border-radius: 4px !important;
        width: 200px !important;
    }

    div#mapa {
        margin: 60px 0 0 0;
        padding-bottom: 0 !important;
    }

    div#final {
        background-size: 100% auto;
        background-repeat: no-repeat;
        min-height: 338px;
    }

    .brand {
        margin-bottom: 0 !important;
    }

    a.botaoCriarSite {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid #E7ECF3;
        border-radius: 4px;
        color: #ffffff;
        padding: 8px 29px;
        position: relative;
        top: 20px;
    }

    .album {
        background-size: 100% auto;
        background-repeat: no-repeat;
    }

    span.titAlbum {
        font-size: 15px;
        background: rgb(255 255 255 / 52%) !important;
        border: 1px solid #E7ECF3;
        border-radius: 4px;
        padding: 10px;
        max-width: initial !important;
        color: #1e3869;
        position: relative;
        top: 6px;
        font-weight: bold;
    }

    p.descricaoMensagem {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #FFFFFF;
        padding: 0 140px;
    }

    img.imgSobre {
        width: 100%;
        border-radius: 50%;
    }
    </style>


</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container">
            <a href="index.html" class="navbar-brand"><img src="<?=base_url("site/images/logo.png")?>" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-ios-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Mídias e Albúns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Lista de presentes</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- home intro -->
    <div id="home" class="home-intro"
        style="background-image:url(<?=base_url("templatesarq/aniversario/images/topopadrao.png")?>) ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2><span class="color-highlight"><?=$titulo?></span></h2>
                        <ul>
                            <li><a href="#presenca" class="button iniCadastro"><?=$bt_criar_site?></a></li>

                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- end home intro -->

    <div id="portfolio" class="portfolio section-bottom-only">
        <div class="container">
            <div class="section-title">
                <h3 class="titleCentro"><?=$introducao["titulo"]?></h3>
            </div>

            <div class="row no-gutters filter-container">
                <div class="row">
                    <div class="col-12 text-center textoPadrao">
                        <?=$introducao["texto"]?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="flipper" data-datetime="2023-01-01 00:00:00" data-template="ddd|HH|ii|ss"
                        data-labels="Days|Hours|Minutes|Seconds" data-reverse="true" id="myFlipper">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sobre" class="portfolio section-bottom-only">
        <div class="container">

            <div class="row no-gutters filter-container">
                <?php
                    foreach($protagonistas as $protagonista){
                        ?>
                <div class="row">
                    <div class="col-4">
                        <img src="<?=($protagonista["foto"] != "" ? $protagonista["foto"] : base_url("assets/images/users/avatar-2.jpg"))?>"
                            class="imgSobre">
                    </div>
                    <div class="col-8  textoSobre">
                        <h2 class="tituloSobre">Sobre <?=$protagonista["firstName"]?></h2>
                        <p><?=$protagonista["descricao"]?></p>

                    </div>
                </div>

                <?php
                    }
                ?>

            </div>

        </div>
    </div>

    <div id="process-work" class="process-work section imgSection"
        style="background-image:url(<?=base_url("templatesarq/aniversario/images/mensagens.png")?>) ;">
        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <div class="">
                        <h3 class="titleDireito">Mensagens </h3>
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                    foreach($mensagens as $i=>$mensagem){
                                        ?>
                                <div class="carousel-item <?=($i > 0 ? "" : "active")?>">
                                    <p class="descricaoMensagem"><?=$mensagem["mensagem"]?></p>
                                    <p class="descricaoMensagem">Ass: <?=$mensagem["nome"]?></p>
                                </div>
                                <?php
                                    }
                                ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>



                        <ul>
                            <li><a href="#" class="button btTransparente abreMensagem">Deixar Mensagem</a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fotos" class="portfolio section-bottom-only">
        <div class="container">
            <div class="section-title">
                <h3 class="titleCentro">Álbum de memórias</h3>
            </div>


            <div class="row albuns">
                <div class="col-sm-9">
                    <div class="row ">
                        <div class="col-12 popup-gallery">
                            <a class="float-start" href="<?=$albuns[1]["capa"]?>" title="">
                                <div class="album linhaAlbumUm"
                                    style="<?=($albuns[1]["capa"] == "" ? "" : "background-image: url(".$albuns[1]["capa"].")")?>">
                                    <span class="titAlbum"><?=$albuns[1]["titulo"]?> - <?=$albuns[1]["midias"]?></span>
                                    <span class="quantidadeFotos"></span>

                                </div>
                            </a>
                            <?php
                                    foreach($midias[$albuns[1]["id_album"]] as $midia){
                                        ?>
                            <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                <div class="img-fluid">
                                    <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                </div>
                            </a>
                            <?php
                                    }
                                ?>


                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-6 popup-gallery">
                            <a class="float-start" href="<?=$albuns[2]["capa"]?>" title="">
                                <div class="album linhaAlbumDois"
                                    style="<?=($albuns[2]["capa"] == "" ? "" : "background-image: url(".$albuns[2]["capa"].")")?>">
                                    <span class="titAlbum"><?=$albuns[2]["titulo"]?> - <?=$albuns[2]["midias"]?></span>
                                </div>
                            </a>
                            <?php
                                    foreach($midias[$albuns[2]["id_album"]] as $midia){
                                        ?>
                            <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                <div class="img-fluid">
                                    <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                </div>
                            </a>
                            <?php
                                    }
                                ?>
                        </div>
                        <div class="col-6 popup-gallery">
                            <a class="float-start" href="<?=$albuns[3]["capa"]?>" title="">
                                <div class="album linhaAlbumDois"
                                    style="<?=($albuns[3]["capa"] == "" ? "" : "background-image: url(".$albuns[3]["capa"].")")?>">
                                    <span class="titAlbum"><?=$albuns[3]["titulo"]?> - <?=$albuns[3]["midias"]?></span>
                                </div>
                            </a>
                            <?php
                                    foreach($midias[$albuns[3]["id_album"]] as $midia){
                                        ?>
                            <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                <div class="img-fluid">
                                    <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                </div>
                            </a>
                            <?php
                                    }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-12 popup-gallery">
                            <a class="float-start" href="<?=$albuns[4]["capa"]?>" title="">
                                <div class="album linhaAlbumTres"
                                    style="<?=($albuns[4]["capa"] == "" ? "" : "background-image: url(".$albuns[4]["capa"].")")?>">
                                    <span class="titAlbum"><?=$albuns[4]["titulo"]?> - <?=$albuns[4]["midias"]?></span>
                                </div>
                            </a>
                            <?php
                                    foreach($midias[$albuns[4]["id_album"]] as $midia){
                                        ?>
                            <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                <div class="img-fluid">
                                    <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                </div>
                            </a>
                            <?php
                                    }
                                ?>
                        </div>
                        <div class="col-12 popup-gallery">
                            <a class="float-start" href="<?=$albuns[5]["capa"]?>" title="">
                                <div class="album linhaAlbumTres"
                                    style="<?=($albuns[5]["capa"] == "" ? "" : "background-image: url(".$albuns[5]["capa"].")")?>">
                                    <span class="titAlbum"><?=$albuns[5]["titulo"]?> - <?=$albuns[2]["midias"]?></span>
                                </div>
                            </a>
                            <?php
                                    foreach($midias[$albuns[5]["id_album"]] as $midia){
                                        ?>
                            <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                <div class="img-fluid">
                                    <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                </div>
                            </a>
                            <?php
                                    }
                                ?>
                        </div>
                        <div class="col-12 popup-gallery">
                            <a class="float-start" href="<?=$albuns[6]["capa"]?>" title="">
                                <div class="album linhaAlbumTres"
                                    style="<?=($albuns[6]["capa"] == "" ? "" : "background-image: url(".$albuns[6]["capa"].")")?>">
                                    <span class="titAlbum"><?=$albuns[6]["titulo"]?> - <?=$albuns[6]["midias"]?></span>
                                </div>
                            </a>
                            <?php
                            
                                    foreach($midias[$albuns[6]["id_album"]] as $midia){
                                        ?>
                            <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                <div class="img-fluid">
                                    <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                </div>
                            </a>
                            <?php
                                    }
                                ?>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <div id="lista" class="process-work section imgSection"
        style="background-image:url(<?=base_url("templatesarq/aniversario/images/lista.png")?>) ;">
        <div class="container">
            <div class="row">

                <div class="col-8">
                    <div class="">
                        <h3 class="titleDireito">Confira a lista de presentes e demonstre todo o seu carinho! </h3>

                        <ul>
                            <li><a href="#" class="button iniCadastro btTransparente">Confira a lista</a></li>

                        </ul>

                    </div>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
    </div>

    <!-- about us -->
    <div id="presenca" class="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 boxTextoCentro">
                    <div class="content">
                        <h3 class="titleEsquerda">Confirmar presença</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="<?=base_url("Templates/confirmarPresenca")?>" class="row ajax">
                                <input type="hidden" name="handle" value="<?=$evento["slug"]?>">
                                    <div class="col-sm-6 campoForm">
                                        <label>Nome</label>
                                        <input type="text" name="nome" class="form-control" placeholder="Nome">
                                    </div>
                                    <div class="col-sm-6 campoForm">
                                        <label>Sobrenome</label>
                                        <input type="text" name="sobrenome" class="form-control"
                                            placeholder="Sobrenome">
                                    </div>
                                    <div class="col-sm-6 campoForm">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                                    </div>
                                    <div class="col-sm-6 campoForm">
                                        <label>E-mail</label>
                                        <input type="email" name="email" class="form-control" placeholder="E-mail">
                                    </div>
                                    <div class="col-sm-12 text-center botoesAcoes">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light btConfirma">Confirmar</button>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end about us -->

    <!-- process work -->

    <!-- end process work -->

    <!-- portfolio -->
    <div id="mapa" class="portfolio section-bottom-only">

        <iframe width="100%" height="350" id="gmap_canvas"
            src="https://maps.google.com/maps?q=Rua General mario tourinho, 1805,Seminário, Curitiba - pr?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

    </div>
    <!-- end portfolio -->

    <!-- services -->
    <div id="final" class="services section-bottom-only"
        style="background-image:url(<?=base_url("templatesarq/aniversario/images/final.png")?>) ;">

        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="">


                    </div>
                </div>
                <div class="col-6"></div>
            </div>
        </div>
    </div>
    <!-- end services -->

    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <div class="content">
                        <div class="brand"><img src="<?=base_url("site/images/logo.png")?>" alt=""></div>
                    </div>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="content">
                        <a href="<?=base_url("Site/index")?>" class="botaoCriarSite">Criar site</a>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->


    <div id="mensagemModal" class="modal fade" role="dialog" aria-labelledby="exampleModalLiveLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Deixe sua mensagem!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=base_url("Templates/novaMensagem")?>" method="post" class="row ajax">
                    <input type="hidden" name="handle" value="<?=$evento["slug"]?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 campoInput">
                                <label>Primeiro Nome</label>
                                <input type="text" class="form-control" placeholder="Primeiro nome" name="nome">
                            </div>
                            <div class="col-sm-6 campoInput">
                                <label>Último Nome</label>
                                <input type="text" class="form-control" placeholder="Último nome" name="sobrenome">
                            </div>
                            <div class="col-sm-6 campoInput">
                                <label>Endereço de Email </label>
                                <input type="email" class="form-control" placeholder="Endereço de Email" name="email">
                            </div>

                            <div class="col-sm-6 campoInput">
                                <label>Telefone </label>
                                <input type="phone" class="form-control" placeholder="Telefone" name="telefone">
                            </div>

                            <div class="col-sm-12 campoInput">
                                <label>Mensagem</label>
                                <textarea class="form-control" placeholder="Digite a sua mensagem" name="mensagem"
                                    rows="5"></textarea>
                            </div>
                           
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-primary">Enviar mensagem</button>
                        <!-- <span>Ainda não tem conta? <a href="#" class="linkForm iniCadastro">Inscreva-se</a></span> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="cadastro" class="modal fade" role="dialog" aria-labelledby="exampleModalLiveLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Bem vindo!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=base_url("Cadastro/novoUsuario")?>" method="post" class="row ajax">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 campoInput">
                                <label>Primeiro Nome</label>
                                <input type="text" class="form-control" placeholder="Primeiro nome" name="nome">
                            </div>
                            <div class="col-sm-6 campoInput">
                                <label>Último Nome</label>
                                <input type="text" class="form-control" placeholder="Último nome" name="sobrenome">
                            </div>
                            <div class="col-sm-12 campoInput">
                                <label>Endereço de Email </label>
                                <input type="email" class="form-control" placeholder="Endereço de Email" name="login">
                            </div>

                            <div class="col-sm-12 campoInput">
                                <label>Senha</label>
                                <input type="password" class="form-control" placeholder="Digite a sua senha"
                                    name="senha">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-primary">Começar agora</button>
                        <span>Já tem uma conta? <a href="#" class="linkForm iniLogin">Fazer login</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="recuperarsenha" class="modal fade" role="dialog" aria-labelledby="exampleModalLiveLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Recuperação de senha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span>Digite seu e-mail para recuperar sua senha</span>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="row">
                        <div class="col-sm-12 campoInput">
                            <label>Endereço de Email </label>
                            <input type="email" class="form-control" placeholder="Digite seu e-mail de cadastro"
                                name="email">
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-primary">Recuperar minha senha</button>
                    <span>Lembrei minha senha <a href="#" class="linkForm iniCadastro">Fazer login</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer bottom -->

    <!-- Style modal -->
    <style>
    .modal-title {
        margin-bottom: 0;
        line-height: 1.5;
        display: inline-block;
        width: 100%;
        font-size: 30px;
    }

    .campoInput {
        margin: 15px 0px;
    }

    .campoInput input.form-control {
        border-radius: 3px !important;
        border: none;
        padding: 25px;
        background: #E7ECF3;
    }

    .campoInput label {
        font-size: 15px;
        color: #000000;
    }

    .modal-content {
        padding: 20px;
    }

    .linkForm {
        color: #316BFF;

    }


    button.btn.btn-primary {
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
        border-radius: 4px;
        width: 100%;
        font-size: 21px;
    }

    a.button {
        background: #FA9362;
        border: 1px solid #E7ECF3;
        border-radius: 4px;
    }

    .modal-header .close {
        padding: 0.5rem 0.9rem;
        margin: -1rem -1rem -1rem auto;
        top: -80px;
        position: relative;
        right: -40px;
        background: #ffffff;
        border-radius: 50%;
        opacity: 100;
    }

    .campoInput input[type="checkbox"] {
        width: 20px;
        display: inline-block;
        margin-right: 8px;
        top: 0px;
        position: relative;
    }
    </style>
    <!-- Fim Style modal -->
    <!-- script -->



</body>

</html>

<script src="<?=base_url("site/js/jquery-3.5.1.min.js")?>"></script>
<script src="<?=base_url("site/js/bootstrap.bundle.min.js")?>"></script>
<script src="<?=base_url("site/js/jquery.filterizr.min.js")?>"></script>
<script src="<?=base_url("site/js/imagesloaded.pkgd.min.js")?>"></script>
<script src="<?=base_url("site/js/magnific-popup.min.js")?>"></script>
<script src="<?=base_url("site/js/contact-form.js")?>"></script>
<script src="<?=base_url("site/js/main.js")?>"></script>
<script src="<?= base_url("js/sweetalert/sweetalert2.all.min.js") ?>"></script>
<link rel="stylesheet" href="<?= base_url("js/sweetalert/sweetalert2.min.css") ?>" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
<script src="<?= base_url('js/func_jqueryPHP.js') ?>"></script>
<script src="<?= base_url('js/js.js') ?>"></script>
<script src="<?=base_url("assets/libs/magnific-popup/jquery.magnific-popup.min.js")?>"></script>


<script src="<?=base_url("assets/js/pages/lightbox.init.js")?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
    integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
    crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $(".abreMensagem").click(function() {
        $("#mensagemModal").modal("show");
    });

});
</script>