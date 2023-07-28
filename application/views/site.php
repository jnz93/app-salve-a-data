<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salve a Data</title>
    <link rel="icon" href="<?=base_url("site/images/logo.png")?>">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- end font -->

    <link rel="stylesheet" href="<?=base_url("site/css/bootstrap.css")?>">
    <link rel="stylesheet" href="<?=base_url("site/css/ionicons.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("site/css/magnific-popup.css")?>">
    <link rel="stylesheet" href="<?=base_url("site/css/style.css")?>">

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" />
    <style>
    .boxTituloPrincipal {
        margin-left: 33px !important;
    }

    div#services {
        background-size: 100%;
    }

    div#home {
        width: 100% !important;
        background-size: 100%;
    }

    div#process-work {
        background-size: 100% !important;
    }

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
        margin: 105px 0 0 0;
        background-position: center;
        background-repeat: no-repeat;
    }

    footer {
        background: #020312;
        padding: 0px 0 80px !important;
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

    #home span.color-highlight {
        margin-top: 50px !important;
        display: inline-block;
        line-height: 45px !important;
    }

    /* .boxTextoCentro {
        padding: 50px 0 0 0;
    } */

    img.modelosSite {
        width: 100%;
    }

    #services p.descricaoDireito {
    font-size: 22px;
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
        padding: 105px 0;
        background-position: center;
        background-repeat: no-repeat;
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
        background: #ffffff;
    }

    .brand img {
        width: 160px !important;
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

    span.color-highlight {
        font-size: 45px;
        line-height: 4px !important;
    }

    .about .content h3 {
        margin-bottom: 30px;
        font-weight: 800;
        font-size: 36px;
        line-height: initial !important;
    }

    .boxPresentes {
        margin-left: 39px;
    }

    @media (max-width: 767px) {

        .section-title {
    margin-bottom: 25px !important;
    text-align: center;
}

        #about p.descricaoEsquerda {
    font-size: 19px;
    margin-bottom: 28px !important;
}

        #portfolio h3.titleCentro {
    line-height: 31px !important;
    font-size: 31px !important;
}

        #process-work h3.titleDireito {
    line-height: 30px !important;
    font-size: 30px !important;
    margin-top: 35px !important;
}

        #about {
            padding-top: 0 !important;
        }

        #about h3.titleEsquerda {
            line-height: 35px !important;
            font-size: 34px !important;
            margin-top: -11px;
        }

        #home a.button.iniCadastro {
            margin-top: 200px;
            width: 60% !important;
            text-align: center;
            font-size: 17px;

        }

        #home ul {
            text-align: center !important;
        }

        #home li {
            width: 100%;
        }

        .boxTituloPrincipal {
            margin-left: 2px !important;
        }

        #home span.color-highlight {
            font-size: 32px !important;
        }

        .carousel-item img {
            max-width: 100% !important;
        }

        p.escritaTemplate {
            position: absolute;
            color: #ffffff;
            width: 190px !important;
            top: 18px;
            left: 33px;
            font-weight: bold;
            background: rgba(0, 0, 0, 0.5);
            padding: 8px;
            border-radius: 16px;
        }

        h3.titleCentro {
            font-style: normal;
            font-weight: 700;
            font-size: 29px !important;
            line-height: 48px !important;
            text-align: center;
            letter-spacing: -0.005em;
            color: #3B3E44;
            margin: 60px 0 0 0 !important;
        }

        .boxPresentes {
            margin-left: 0 !important;
        }
        #process-work a.button.iniCadastro {
    margin-top: 80px !important;
}

        p.descricaoDireito {
            margin-bottom: 22px !important;
            margin-top: 31px;
            font-size: 18px;
        }


        h3.titleDireito {
            font-size: 27px !important;
            margin-bottom: 22px !important;
        }

        div#process-work {
            background-size: auto !important;
        }

        div#home {
            height: 757px !important;
            margin: 0 auto;
            padding: 0;
            background-size: auto !important;
        }

        .boxTextoCentro {
            text-align: center !important;
        }

        .container .row .col-12 {
            text-align: center;
        }
    }

    p.escritaTemplate {
        position: absolute;
        color: #ffffff;
        width: 280px;
        top: 18px;
        left: 33px;
        font-weight: bold;
        background: rgba(0, 0, 0, 0.5);
        padding: 8px;
        border-radius: 16px;
    }

    button.carousel-control-next,
    button.carousel-control-prev {
        background: none;
        border: none;
    }

    lottie-player {
        display: inline-block;
    }

    .blocoColor {
        background: #e2eaff;
    }

    .navbar .navbar-nav li .nav-link {
        font-size: 14px;
    }
    </style>
</head>

<body>

    <!-- loader -->
    <div class="fakeLoader"></div>
    <!-- end loader -->

    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container">
            <a href="<?=base_url()?>" class="navbar-brand"><img src="<?=base_url("site/images/logo.png")?>" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-ios-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://salveadata.com.br">Site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("contato")?>">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- LOGIN -->
    <div id="login" class="login" style="padding: 20px; margin-top: 150px; margin-bottom: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-5 col-xs-12" style="margin: auto;">
                    <h1 class="mb-4 text-center" id="">Bem-vindo!</h1>
                    <form action="<?=base_url("Ajax/login")?>" method="post" class="row ajax justify-content-center text-center">
                        <div class="row">
                            <div class="col-sm-12 campoInput">
                                <label>Entre com seu e-mail</label>
                                <input type="login" class="form-control text-center" name="login"
                                    placeholder="Digite o seu e-mail">
                            </div>
                            <div class="col-sm-12 campoInput">
                                <label>Senha</label>
                                <input type="password" class="form-control text-center" name="senha"
                                    placeholder="Digite a sua senha">
                            </div>
                            <div class="col-sm-12 campoInput">
                                <a href="#" class="linkForm iniSenha">Esqueceu sua senha?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <span class="mt-2">Ainda não tem conta? <a href="#" class="linkForm iniCadastro">Inscreva-se</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content">
                        <div class="brand"><img src="<?=base_url("site/images/logo.png")?>" alt=""></div>
                        <p>Copyright © Salve a Data 2022 Todos os direitos reservados</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content">
                        <h5>Serviços</h5>
                        <ul>
                            <li><a href="#" class="iniCadastro">Site para evento</a></li>
                            <li><a href="#about">Personalize seu tema</a></li>
                            <li><a href="#services">Lista de presentes</a></li>
                            <li><a href="#news">Novidades</a></li>
                            <li><a href="#portfolio">Álbum de mídias</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content">
                        <h5>Suporte</h5>
                        <ul>
                            <li><a href="mailto:contato@salveadata.com.br">contato@salveadata.com.br</a></li>
                            <li><a href="mailto:suporte@salveadata.com.br">suporte@salveadata.com.br</a></li>
                            <li><a href="https://wa.me/5555996880204" target="_BLANK">55 9 9688-0204
                                </a></li>
                            <li><a href="<?=base_url("politicas/contratosalveadata.pdf")?>" target="_BLANK">Termos e
                                    condições</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="content">
                        <h5>Redes sociais</h5>
                        <ul class="social">
                            <li><a href="https://www.facebook.com/Salve-a-Data-110251628492094"><i
                                        class="icon ion-logo-facebook"></i> Facebook</a></li>
                            <li><a href="https://instagram.com/salveadataoficial?igshid=YmMyMTA2M2Y="
                                    target="_BLANK"><i class="icon ion-logo-instagram"></i> Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <div id="cadastro" class="modal fade" role="dialog" aria-labelledby="exampleModalLiveLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Bem-vindo!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=base_url("Cadastro/novoUsuario")?>" method="post" class="row ajax">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 campoInput">
                                <label>Primeiro nome</label>
                                <input type="text" class="form-control" placeholder="Primeiro nome" name="nome">
                            </div>
                            <div class="col-sm-6 campoInput">
                                <label>Último nome</label>
                                <input type="text" class="form-control" placeholder="Último nome" name="sobrenome">
                            </div>
                            <div class="col-sm-12 campoInput">
                                <label>Endereço de e-mail </label>
                                <input type="email" class="form-control" placeholder="Endereço de Email"
                                    name="login">
                            </div>

                            <div class="col-sm-12 campoInput">
                                <label>Senha</label>
                                <input type="password" class="form-control" placeholder="Digite a sua senha"
                                    name="senha">
                            </div>
                            <div class="col-sm-12 campoInput text-left">
                                <label><input type="checkbox" name="termos"><span>Li e aceito os <a href="<?=base_url("politicas/contratosalveadata.pdf")?>" target="_BLANK" class="linkForm">Termos de Serviço e Políticas de Privacidade</a></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-primary">Começar agora</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="recuperarsenha" class="modal fade" role="dialog" aria-labelledby="exampleModalLiveLabel">
        <form action="<?=base_url("Usuario/recuperarSenha")?>" method="post" class="row ajax">
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

                        <div class="col-sm-12 campoInput recSenhaAlvo">
                            <label>Endereço de Email </label>
                            <input type="email" class="form-control" placeholder="Digite seu e-mail de cadastro"
                                name="email">
                        </div>

                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-primary">Recuperar minha senha</button>
                    </div>
                </div>
            </div>
        </form>
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
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
        border-radius: 4px;
        width: 100%;
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        $('.carousel2').carousel();
        $(".iniCadastro").click(function() {
            $("#login").modal("hide");
            $("#recuperarsenha").modal("hide");
            $("#cadastro").modal("show");
        });
        $(".iniLogin").click(function() {
            $("#recuperarsenha").modal("hide");
            $("#cadastro").modal("hide");
            $("#login").modal("show");
        });
        $(".iniSenha").click(function() {
            $("#login").modal("hide");

            $("#cadastro").modal("hide");
            $("#recuperarsenha").modal("show");
        });
    });
    </script>

</body>

</html>