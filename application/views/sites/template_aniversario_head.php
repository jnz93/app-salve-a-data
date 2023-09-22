
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salve a Data - Lista de presentes</title>
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
        color: <?=$config["corTitulosBanner"]?>;

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
        padding: 125px 0;
        margin: 0 0 0 0;
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
        color: <?=$config["corTitulosBanner"]?>;
    }

    p.descricaoDireito {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #FFFFFF;
    }

    h3.titleCentro {
        /* font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 70px; */
        text-align: center;
        letter-spacing: -0.005em;
        color: <?=$config["corTitulos"]?>;
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
        background: <?=$config["corPrincipal"]?>;
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

    nav.navbar.navbar-expand-md.navbar-light {
        background: <?=$config["corPrincipal"]?>;
        padding: 0px;
    }

    .navbar .navbar-nav li .nav-link {
        font-size: 15px;
        font-weight: 500;
        transition: all .3s ease;
        color: <?=$config["corTextoMenu"]?>;
    }

    .navbar-light .navbar-brand {
        color: rgba(0, 0, 0, 0.9);
        background: <?=$config["corComplementar"]?>;
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
        color: <?=$config["corTitulos"]?>;
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
        background: <?=$config["corPrincipal"]?> !important;
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
        color: <?=$config["corTextosBanner"]?>;
        padding: 0 140px;
    }

    img.imgSobre {
        width: 100%;
        border-radius: 50%;
    }

    .bgBanner {
        background-size: 100% !important;
        background-position: center;
    }

    .boxEdicao {
        height: 100%;
        position: fixed;
        background: #f4f4f4;
        width: 353px;
        overflow: scroll;
    }

    h1.titEditLayout {
        padding: 25px;
        font-size: 20px;
        color: #646464;
        border-bottom: 1px solid #d4d3d3;
    }

    input[type="color"] {
        border-radius: 11px !important;
        background: none;
        border: 0;
        cursor: pointer;
        max-width: 100px !important;
        padding: 20px !important;
        width: 60px !important;
        display: block;
        height: 60px !important;
        margin: 0 !important;
        position: relative;
    }

    form#formzone {
        height: 100px;
        background: #dedede;
        padding: 10px 20px;
        font-size: 15px;
        border-radius: 14px;
        border: 1px dashed #adadad;
    }

    .campoInput h4 {
        font-size: 18px;
        color: #828282;
        font-weight: 100;
        text-align: center;
    }

    .campoInput i {
        font-size: 19px;
        text-align: center;
        display: inherit;
    }

    .campoInput label {
        color: #a3a3a3;
    }

    button.btn.btn-link.btn-block.text-left {
        text-decoration: none;
        color: #8a8a8a;
    }

    .card-img,
    .card-img-top {
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
        height: 300px;
        width: auto;
        display: inline-block;
    }
    </style>

