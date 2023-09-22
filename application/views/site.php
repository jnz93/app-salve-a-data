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
        background: #1E1E1E;
    }

    .brand img {
        width: 160px !important;
    }

    footer h5 {
        margin-bottom: 15px;
        margin-top: 25px;
    }

    footer ul li a {
        font-style: normal;
        font-weight: 200;
        font-size: 16px;
        line-height: 24px;
        color: #FFFFFF;
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
            <div class="row flex-colunm align-items-center text-center">
                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                    <div class="content">
                        <div class="brand mt-4"><img src="<?=base_url("site/images/logo3.png")?>" alt=""></div>
                    </div>
                    <div class="social mt-1">
                        <a href="https://instagram.com/salveadataoficial?igshid=YmMyMTA2M2Y=" target="_blank" style="margin-right: 10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/Salve-a-Data-110251628492094">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                    <div class="content">
                        <h5>Suporte</h5>
                        <ul class="d-flex justify-content-center">
                            <li class="mr-3"><a href="mailto:contato@salveadata.com.br">contato@salveadata.com.br</a></li>
                            <li class="mr-3"><a href="mailto:suporte@salveadata.com.br">suporte@salveadata.com.br</a></li>
                            <li class="mr-3"><a href="https://wa.me/5555996880204" target="_BLANK">55 9 9688-0204</a></li>
                            <li class="mr-3"><a href="<?=base_url("politicas/contratosalveadata.pdf")?>" target="_BLANK">Termos e condições</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 pt-4 mt-4 border-top text-center" style="border-top-color: rgba(255,255,255,0.1) !important;">
                    <div class="copyright" style="color: #fff;">© Copyright 2023  | <b>Salve a Data</b>  | Todos os direitos reservados</div>
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
                                <input type="email" class="form-control" placeholder="Endereço de Email" name="login">
                            </div>

                            <div class="col-sm-12 campoInput">
                                <label>Senha</label>
                                <input type="password" class="form-control" placeholder="Digite a sua senha" name="senha">
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
                            <input type="email" class="form-control" placeholder="Digite seu e-mail de cadastro" name="email">
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