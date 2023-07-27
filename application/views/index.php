<!doctype html>
<html lang="pt-br">

<head>
    <?php $this->load->view("head")?>
    <style>
    img.logoSis {
        width: 100px;
    }

    span.box_menu {
        padding: 5px 30px;
        width: 100%;
        display: inline-block;
        border-radius: 8px;
    }

    span.box_menu:hover {
        background: rgba(49, 107, 255, 0.2);
    }

    span.box_menu.active {
        background: rgba(49, 107, 255, 0.2);
    }

    .linkDash a {
        font-size: 14px;
    }

    .linkDash {
        float: right;
    }

    h1 {
        font-style: normal;
        font-weight: 500;
        font-size: 24px;
        line-height: 36px;
        color: #48546D;
        padding: 15px 0;
    }

    input.form-control {
        background: #E7ECF3;
        border: 1px solid #E7ECF3;
        border-radius: 4px;
    }

    .col-sm-6.campoForm {
        margin: 10px 0;
    }

    .novoProtagonista {
        display: none;
    }

    h2 {
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 24px;
        color: #84878B;
    }

    body[data-layout=detached] #layout-wrapper::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 165px;
        background: #2C3A67;
        -webkit-box-shadow: 1px 0 7px 0 rgb(0 0 0 / 50%);
        box-shadow: 1px 0 7px 0rgba(0, 0, 0, .5);
    }

    .nav-tabs-custom .nav-item .nav-link.active {
        color: #2c3a67;
    }

    .btn-primary {
        color: #fff;
        background-color: #2c3a67;
        border-color: #2c3a67;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #2c3a67;
        border-color: #2c3a67;
    }

    .btn-primary {
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
    }

    .btCancelar {
        width: 160px;
        height: 49px;
        border-radius: 4px;
        margin: 0 15px;
    }

    .btn-check:active+.btn-primary,
    .btn-check:checked+.btn-primary,
    .btn-primary.active,
    .btn-primary:active,
    .show>.btn-primary.dropdown-toggle,
    .btn-check:focus+.btn-primary,
    .btn-primary:focus {
        color: #fff;
        background-color: #2c3a67;
        border-color: #2c3a67;
    }

    .btPadrao {
        width: 160px;
        height: 48px;
        left: 0px;
        top: 0px;
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
        border-radius: 4px;
    }

    .editar {
        font-size: 25px;
        position: relative;
        display: inline-block;
        top: -7px;
    }

    .deletar {
        font-size: 23px;
        position: relative;
        display: inline-block;
        top: -7px;
        color: #e23c3c;
    }

    .botoesAcoes {
        margin: 35px 0;
    }

    .boxPlano {
        padding: 0 !important;
    }

    .topPlano {
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
        height: 30px;
    }

    .topPlano {
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
        height: 35px;
        border-radius: 11px 11px 0 0;
    }

    .titPlano {
        font-style: normal;
        font-weight: 600;
        font-size: 24px;
        line-height: 36px;
        color: #3B3E44;
    }

    .descricaoPlano {
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 36px;
        color: #3B3E44;
    }

    .valor {
        font-style: normal;
        font-weight: 600;
        font-size: 40px;
        line-height: 36px;
        color: #3B3E44;
    }

    .boxSelectPagamento {
        background: #FFFFFF;
        border: 0.5px solid #E7ECF3;
        border-radius: 6px;
        height: 48px;
        line-height: 43px;
    }

    .boxSelectPagamento img {
        height: 45px;
    }

    .boxSelectPagamento img.cardCredit {
        height: 30px;
    }

    .paymentSelected {
        background: rgba(49, 107, 255, 0.2);
    }

    .checkPayment {
        line-height: 0px;
        top: -7px;
        position: absolute;
        padding: 11px 6px;
        right: 6px;
        height: 5px;
    }

    .checkPayment p {
        padding: 0;
        margin: 0;
    }

    .buttonPayment {
        border: none;
        width: 100%;
        background: none;
    }

    .campoForm {
        padding: 12px 18px;
    }

    .btCupom {
        width: 100%;
        padding: 10px;
        border: 1px dashed #c9c9dd;
        border-radius: 10px;
        background: #ebf2fb;
        color: #8687a6;
    }

    .bt-submit-discount-coupon {
        background: #029cdc;
        border: 0;
        border-radius: 50%;
        color: #fff;
        font-size: 18px;
        height: 30px;
        position: absolute;
        right: 8px;
        top: 4px;
        transition: all .8s linear;
        width: 31px;
    }

    .box-discount-coupon {
        position: relative;
    }

    .detalhesCompra.row {
        margin: 10px 30px;
        border: 1px solid #e7ecf2;
        padding: 20px;
        border-radius: 16px;
    }

    .descriptionPlanPayment {
        font-size: 14px;
    }

    .boxDescriptionPayment {
        padding: 5px 0 15px 0;
    }

    .totalPlanPayment {
        font-size: 22px;
        font-weight: bold;
        color: #2c3a67;
    }

    .couponBox {
        margin: 15px 0;
    }

    .btSearh {
        margin: 30px 0 0 0;
    }

    .btSearh p {
        margin: 0;
        font-size: 23px;
    }

    .box-filtro {
        margin: 25px 0;
    }


    .iconSemMensagens {
        width: 45px;
        height: 45px;
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
        border-radius: 4px;
        display: inline-block;
        color: #ffffff;
    }

    .iconSemMensagens p {
        margin: 0;
        padding: 0;
        font-size: 28px;
    }

    .tituloSemMensagens {
        width: 100%;
        display: block;
        font-size: 24px;
        line-height: 36px;
        color: #48546D;
    }

    .descricaoSemMensagens {
        display: block;
        font-size: 16px;
        color: #B1B5C4;
    }

    .titConfigMensagens {
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 500;
        display: block;
    }

    .descricaoConfigMensagens {
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
        color: #84878B;
    }

    .configMensagens {
        padding: 25px 70px;
    }

    .checkCampo {
        margin: 9px 0 0;
    }

    .semImagem {
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
        border-radius: 10px;
        display: inline-block;
        padding: 20px 25px;
    }

    .semImagem p {
        margin: 0;
        color: #ffffff;
    }

    .listaPresentes td {
        line-height: 60px;
    }

    label.input-group-text {
        border: 1px solid #E7ECF3;
    }

    .boxLayout {
        background-size: 100% auto;
        padding: 0 !important;
        height: 350px;
    }

    .descricaoLayout {
        font-weight: 700;
        font-size: 16px;
        color: #FFFFFF;
        left: 25px;
        position: relative;
        top: 17px;
        padding: 20px;
        background: rgb(68 68 68 / 69%);
        border-radius: 7px;
    }

    .descricaoCompletaLayout {
        bottom: 64px;
        left: 31px;
        position: absolute;
        color: #fff;
        font-size: 19px;
        font-weight: bold;
    }

    .escolherLayout {
        position: absolute;
        bottom: 20px;
        left: 28px;
    }

    .row.boxTemplates {
        padding: 30px 0;
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
        height: 174px;
        background: #f0f0f0;
        border-radius: 15px;
        padding: 20px;
        margin: 26px 0 0 0;
    }

    .titAlbum {
        font-weight: 700;
        font-size: 25px;
        line-height: 60px;
        letter-spacing: -0.005em;
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        position: absolute;
        bottom: 42px;
    }

    .quantidadeFotos {
        font-weight: 400;
        font-size: 14px;
        line-height: 30px;
        background: linear-gradient(180deg, #283B6B 0%, #1E305E 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        position: absolute;
        bottom: 30px;
    }

    a.deletarFoto {
        font-size: 35px;
        color: #da3030;
        position: absolute;
        right: 17px;
        top: 21px;
    }

    img.fotoPresente {
        height: 64px;
    }

    img.midiaAlbum {
        width: 100%;
    }

    .linhaAlbumMidia {
        height: 206px;
        background: #f0f0f0;
        border-radius: 15px;
        padding: 20px;
        margin: 26px 0 0 0;
    }

    .nomeAlbumForm {
        padding: 0 0 26px 0;
    }

    .btSalvaIput {
        padding: 8px;
    }

    .voltaPagina {
        margin-bottom: 20px;
    }

    .trocaCapa {
        position: absolute;
        height: 70px;
        width: 70px;
        min-height: 70px;
        right: 23px;
        top: 45px;
    }

    .iconMenorDropZone {
        padding: 0;
        margin: -4px !important;
    }

    .trocaCapa .dz-image {
        height: 50px !important;
        width: 50px !important;
        margin: -28px;
    }

    .trocaCapa .dropzone .dz-preview.dz-image-preview {
        background: white;
        height: 10px;
        min-height: 10px !important;
    }

    .trocaCapa svg {
        width: 20px !important;
        margin: -9px 15px;
    }

    .album {
        background-size: 100% auto;
        background-repeat: no-repeat;
    }

    .novaPagina {
        display: none;
    }

    .informacoesComplementares {
        padding: 30px 0;
    }

    .protagonistas td {
        line-height: 30px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    a.btn.btn-primary.btn-sm.waves-effect.waves-light.visualizarSite {
        background: linear-gradient(180deg, #41a114 0%, #42c74f 100%);
    }

    .dividForm {
        padding: 10px;
    }



    @media (max-width: 767px) {

        button.btn.btn-primary.btn-sm.waves-effect.waves-light.abreCadastroProtagonista {
            margin-top: 20px;
        }

        a.btn.btn-primary.btn-sm.waves-effect.waves-light.voltaPagina {
            z-index: 999;
            margin: 40px 0 20px 0;
        }
    }
    </style>
</head>
<?php
    $menus = array(
       
        "configuracoes" => array(
            "url" => "javascript: void(0);",
            "icon" => "mdi mdi-settings-outline",
            "title" => "Configurar site",
            "submenu" => array(
                // [
                //     "url" => "anfitrioes",
                //     "title" => "Anfitriões",
                //     "ajax"=> false
                // ],
                // [
                //     "url" => "localevento",
                //     "title" => "Local do evento",
                //     "ajax"=> false
                // ],
                "cadastro" => array(
                    "url" => "cadastro",
                    "title" => "Informações do evento",
                    "ajax" => false
                ),
                [
                    "url" => "escolhaseulayout",
                    "title" => "Personalize seu site",
                    "ajax"=> false
                ],
                [
                    "url" => "listadepresentes",
                    "title" => "Lista de presentes",
                    "ajax"=> false
                ],
                [
                    "url" => ($evento["id_plano"] ? "dominiopersonalizado" : "Usuario/avisoAssinatura/dominios"),
                    "title" => "Domínio personalizado",
                    "ajax"=> ($evento["id_plano"] ? false : true)
                ],
                [
                    "url" => ($evento["id_plano"] ? "paginaspersonalizadas" : "Usuario/avisoAssinatura/paginas"),
                    "title" => "Páginas personalizadas",
                    "ajax"=> ($evento["id_plano"] ? false : true)
                ],
               
                // [
                //     "url" => "albunsmidia",
                //     "title" => "Álbuns de mídia",
                //     "ajax"=> false
                // ],
                // [
                //     "url" => "introducao",
                //     "title" => "Introdução",
                //     "ajax"=> false
                // ],
                // [
                //     "url" => "paginaevento",
                //     "title" => "Página do Evento"
                // ],
                [
                    "url" => "usuarios",
                    "title" => "Usuários do sistema",
                    "ajax"=> false
                ],
                [
                    "url" => "cancelarevento",
                    "title" => "Cancelar evento",
                    "ajax"=> false
                ],
                
            )
        ),
        "convidados" => array(
            "url" => "convidados",
            "icon" => "mdi mdi-account-supervisor-outline",
            "title" => "Convidados",
            "submenu" => false
        ),
        "presentes" => array(
            "url" => "presentes",
            "icon" => "mdi mdi-gift-outline",
            "title" => "Presentes",
            "submenu" => false
        ),
        "Mensagens" => array(
            "url" => "mensagens" ,
            "icon" => "mdi mdi-message-minus-outline",
            "title" => "Mensagens",
            "submenu" => false
        ),
        "dashboard" => array(
            "url" => "dashboard",
            "icon" => "mdi mdi-airplay",
            "title" => "Painel",
            "submenu" => false
        ),
        "assinaturas" => array(
            "url" => "assinaturas",
            "icon" => "mdi mdi-heart-outline",
            "title" => "Assinaturas",
            "submenu" => false
        ),
        // "visitas" => array(
        //     "url" => "visitas",
        //     "icon" => "mdi mdi-chart-line-variant",
        //     "title" => "Visitas",
        //     "submenu" => false
        // ),
        
        
        
        
        "sair" => array(
            "url" => "Ajax/sair",
            "icon" => "mdi mdi-exit-to-app",
            "title" => "Sair"
        ),
    );
?>

<body data-layout="detached" data-topbar="colored">
    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="container-fluid">
                        <div class="float-end">

                            <div class="dropdown d-inline-block d-lg-none ms-2">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-search-dropdown">

                                    <form class="p-3">
                                        <div class="m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..."
                                                    aria-label="Recipient's username">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i
                                                            class="mdi mdi-magnify"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                            <div class="dropdown d-none d-lg-inline-block ms-1">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    data-toggle="fullscreen">
                                    <i class="mdi mdi-fullscreen"></i>
                                </button>
                            </div>

                            <div class="dropdown d-inline-block">


                            </div>

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect"
                                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img class="rounded-circle header-profile-user"
                                        src="<?=base_url("assets/images/users/avatar-2.jpg")?>" alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1"><?=$dadosUser["nome"]?></span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a class="dropdown-item" href="<?=base_url("usuarios")?>"><i
                                            class="bx bx-user font-size-16 align-middle me-1"></i>
                                        Usuários do sistema</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger ajax" href="<?=base_url("Ajax/sair")?>"><i
                                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                        Sair</a>
                                </div>
                            </div>



                        </div>
                        <div>
                            <!-- LOGO -->


                            <button type="button"
                                class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                                id="vertical-menu-btn">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>

                            <!-- App Search-->
                            <!-- <form class="app-search d-none d-lg-inline-block">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="bx bx-search-alt"></span>
                                </div>
                            </form> -->
                        </div>

                    </div>
                </div>
            </header> <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div class="h-100">

                    <div class="user-wid text-center py-4">
                        <div>
                            <a href="<?=base_url()?>" target="_BLANK"><img src="<?=base_url("site/images/logo.png")?>"
                                    alt="" class="logoSis"></a>
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <?php
                                foreach($menus as $i=>$menu){
                            ?>
                            <li>
                                <a href="<?=($menu["submenu"] ? $menu["url"] : base_url($menu["url"]))?>"
                                    class="waves-effect">
                                    <span class="box_menu <?=($nav == $i ? "active" : "")?>">
                                        <i class="<?=$menu["icon"]?>"></i>
                                        <!-- <span class="badge rounded-pill bg-info float-end">2</span> -->
                                        <span><?=$menu["title"]?></span>
                                    </span>
                                </a>
                                <?php
                                    if($menu["submenu"]){
                                        echo '<ul class="sub-menu" aria-expanded="false">';
                                        foreach($menu["submenu"] as $submenu){
                                            echo '<li><a href="'.base_url($submenu["url"]).'" '.($submenu["ajax"] ? "class='ajax'" : "").'>'.$submenu["title"].'</a></li>';
                                        }
                                        echo "</ul>";
                                    }
                                ?>

                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <?php $this->load->view($page)?>

                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                document.write(new Date().getFullYear())
                                </script> © Salve a Data.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    <a target="_BLANK"
                                        href="<?=base_url("politicas/politicadeprivacidade.pdf")?>">Políticas de
                                        privacidade</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    </div>
    <!-- end container-fluid -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <div id="indicacao" class="modal fade bs-example-modal-center" tabindex="-1" aria-labelledby="mySmallModalLabel"
        aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Surpreenda um amigo :)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-12 dividForm">
                        <label>Nome do seu amigo</label>
                        <input type="text" name="nomeAmigo" class="form-control"
                            placeholder="Digite o nome do seu amigo">
                    </div>
                    <div class="col-12 dividForm">
                        <label>E-mail do seu amigo</label>
                        <input type="email" name="emailAmigo" class="form-control"
                            placeholder="Digite o e-mail do seu amigo">
                    </div>
                    <div class="col-12 dividForm">
                        <label>Mensagem</label>
                        <textarea name="emailAmigo" class="form-control" placeholder="Escreva uma mensagem"></textarea>
                    </div>
                    <div class="col-12 dividForm">
                        <button style="width: 100%;" type="button"
                            class="btn btn-primary  waves-effect waves-light abreCadastroProtagonista"><span
                                class="bx bx-send"></span> Enviar convite para seu amigo</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <script src="<?=base_url("assets/libs/jquery/jquery.min.js")?>"></script>
    <script src="<?=base_url("assets/libs/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
    <script src="<?=base_url("assets/libs/metismenu/metisMenu.min.js")?>"></script>
    <script src="<?=base_url("assets/libs/simplebar/simplebar.min.js")?>"></script>
    <script src="<?=base_url("assets/libs/node-waves/waves.min.js")?>"></script>
    <script src="<?=base_url("assets/libs/jquery-sparkline/jquery.sparkline.min.js")?>"></script>

    <!-- apexcharts -->
    <script src="<?=base_url("assets/libs/apexcharts/apexcharts.min.js")?>"></script>

    <!-- jquery.vectormap map -->
    <script src="<?=base_url("assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js")?>"></script>
    <script src="<?=base_url("assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js")?>">
    </script>
    <script src="<?= base_url("js/sweetalert/sweetalert2.all.min.js") ?>"></script>
    <link rel="stylesheet" href="<?= base_url("js/sweetalert/sweetalert2.min.css") ?>" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <script src="<?=base_url("assets/js/pages/dashboard.init.js")?>"></script>

    <script src="<?=base_url("assets/js/app.js")?>"></script>

    <script src="<?= base_url('js/func_jqueryPHP.js') ?>"></script>
    <script src="<?= base_url('js/js.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous"></script>
    <script src="<?=base_url("assets/libs/inputmask/min/jquery.inputmask.bundle.min.js")?>"></script>
    <script src="<?=base_url("assets/ckeditor/ckeditor.js")?>"></script>

    <script>
    $(document).ready(function() {
        $(".input-mask").inputmask();
        $(".abreCadastroProtagonista").click(function() {
            $(".novoProtagonista").slideToggle(300);
        });

        $(".abreNovaPagina").click(function() {
            $(".novaPagina").slideToggle(300);
        });


        $(".cancelaCadastro").click(function() {
            $(".novoProtagonista").slideToggle(300);
        });

        $(".abreCadastroConvidado").click(function() {
            $(".novoConvidado").slideToggle(300);
            $(".uploadEmMassa").fadeOut(0.1);
        });

        $(".cancelaCadastroConvidado").click(function() {
            $(".novoConvidado").slideToggle(300);
        });

        $(".abreCadastroMassa").click(function() {
            $(".uploadEmMassa").slideToggle(300);
            $(".novoConvidado").fadeOut(0.1);
        });

        $(".cancelaCadastroMassa").click(function() {
            $(".uploadEmMassa").slideToggle(300);
        });

        $(".abreEnviaImagens").click(function() {
            $(".uploadFotos").slideToggle(300);
        });

        $(".getCep").keyup(function() {
            var cep = $(this).val();

            submitdado({
                cep: cep
            }, "<?=base_url("Ajax/populaEnderecoCep")?>");
        });
        $("#bancos").on("change", function() {
            var banco = $(this).val();
            $('#agencia').val("");
            $('#agencia').mask(agencias[banco]);
            $('#numeroconta').val("");
            $('#numeroconta').mask(contas[banco]);
        });
        $("[name='repasseJuros']").change(function() {
            var val = $(this).val();
            submitdado({
                val
            }, "<?=base_url("Cadastro/changeRepasse")?>");
        });
        $("[name='acompanhanteLista']").change(function() {
            var val = $(this).val();
            submitdado({
                val
            }, "<?=base_url("Cadastro/ativarAcompanhantes")?>");
        });
        $(".btAssinar").click(function() {
            var idplano = $(this).data("idplano");
            submitdado({
                idplano
            }, "<?=base_url("Usuario/getDadosPlano")?>");
            scrolldiv("pagamento");
        });
        $(".getMaps").change(function() {
            var logradouro = $(".logradouro").val();
            var numero = $(".numero").val();
            var bairro = $(".bairro").val();
            var cidade = $(".cidade").val();
            var estado = $(".estado").val();

            var map = "https://maps.google.com/maps?q=" + logradouro + "," + numero + "," + bairro +
                "," + cidade + "-" + estado + "t=&z=13&ie=UTF8&iwloc=&output=embed";

            $("#gmap_canvas").attr("src", map);
        });
        $(".btCupom").click(function() {
            $(".btCupom").fadeOut(0.1);
            $(".box-discount-coupon").removeClass("d-none");
        });
        var option = "";
        $(".buttonPayment").click(function() {
            option = $(this).data("payment");
            if (option == "creditCard") {
                $(".optionCreditCard").addClass("paymentSelected");
                $(".optionPix").removeClass("paymentSelected");
                $(".optionBoleto").removeClass("paymentSelected");
                $(".cardCreditIcon").removeClass("d-none");
                $(".boletoIcon").addClass("d-none");
                $(".pixIcon").addClass("d-none");
                $(".dataPix").fadeOut(0.1);
                $(".dataBoleto").fadeOut(0.1);
                $(".dataCreditCardF").fadeIn(0.1);

            } else if (option == "boleto") {
                $(".optionCreditCard").removeClass("paymentSelected");
                $(".optionPix").removeClass("paymentSelected");
                $(".optionBoleto").addClass("paymentSelected");
                $(".cardCreditIcon").addClass("d-none");
                $(".boletoIcon").removeClass("d-none");
                $(".pixIcon").addClass("d-none");
                $(".dataPix").fadeOut(0.1);
                $(".dataBoleto").fadeIn(0.1);
                $(".dataCreditCardF").fadeOut(0.1);
            } else if (option == "pix") {
                $(".optionCreditCard").removeClass("paymentSelected");
                $(".optionPix").addClass("paymentSelected");
                $(".optionBoleto").removeClass("paymentSelected");
                $(".cardCreditIcon").addClass("d-none");
                $(".boletoIcon").addClass("d-none");
                $(".pixIcon").removeClass("d-none");
                $(".dataPix").fadeIn(0.1);
                $(".dataBoleto").fadeOut(0.1);
                $(".dataCreditCardF").fadeOut(0.1);
            }

        });

    });
    </script>


    <?php
        foreach($scripts as $script){
            echo "<script src='".$script."'></script>";
    }
    ?>

    <script type="text/javascript" src="https://js.iugu.com/v2"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/formatter.js/0.1.5/formatter.min.js">
    </script>
    <script>
    var id = "";
    var valor = "";
    var nome = "";

    function addLoader(alvo) {
        $(".main-dialog.load").fadeIn(0.1);
    }

    function removeLoader(alvo) {
        $(".main-dialog.load").fadeOut(0.1);
    }
    $(document).ready(function() {
        $(".btPagar").on("click", function() {
            $("#cardCredit").submit();
        });

        var PATHRAIZ = "<?= base_url_atual("") ?>";
        Iugu.setAccountID("A562B3FF8DC4485F95A07DBEA2A4CE2A");
        $('.btFormCartao').click(function(evt) {
            $(".msgPgto").html("");
            $("#enviaForm").prop("disabled", true);
            addLoader("#enviaForm");
            $("#enviaForm").css('opacity', '0.7');
            var form = $(this);
            var tipo = 'cartao_credito';
            //Iugu.setTestMode(true);


            var tokenResponseHandler = function(data) {

                if (data.errors) {
                    //alert(JSON.stringify(data.errors));
                    //alert(JSON.stringify(data.errors.number));
                    $erros = '';
                    if (data.errors.last_name == 'is_invalid') {
                        $erros = 'O Sobrenome digitado é inválido.<br>' + $erros;
                    }
                    if (data.errors.first_name == 'is_invalid') {
                        $erros = 'O nome digitado é inválido.<br>' + $erros;
                    }
                    if (data.errors.expiration == 'is_invalid') {
                        $erros = 'A data de expiração é inválida.<br>' + $erros;
                        //alert('eero');
                    }
                    if (data.errors.verification_value == 'is_invalid') {
                        $erros = 'O código de verificação é inválido.<br>' + $erros;
                    }
                    if (data.errors.number == 'is_invalid') {
                        $erros = 'O número do cartão é inválido.<br>' + $erros;
                    }
                    $(".loadingpgto").fadeOut(0.1);

                    $(".btFormCartao").prop("disabled", false);
                    $(".btFormCartao").css('opacity', '1');
                    removeLoader("#enviaForm");
                    $(".msgPgto").html($erros);
                } else {

                    $("#token").val(data.id);
                    var plano = $("#id_plano").val();
                    submitdado({
                            id_evento: "<?=$evento["id_evento"]?>",
                            email: $("#cardCredit [name='email']").val(),
                            nome: $("#cardCredit [name='nome']").val(),
                            telefone: $("#cardCredit [name='telefone']").val(),
                            cpf: $("#cardCredit [name='cpf']").val(),
                            cep: $("#cardCredit [name='cep']").val(),
                            logradouro: $("#cardCredit [name='logradouro']").val(),
                            numero: $("#cardCredit [name='numero']").val(),
                            complemento: $("#cardCredit [name='complemento']").val(),
                            bairro: $("#cardCredit [name='bairro']").val(),
                            cidade: $("#cardCredit [name='cidade']").val(),
                            uf: $("#cardCredit [name='uf']").val(),
                            cpfCard: $("#cardCredit [name='cpfCard']").val(),
                            installments: $("#cardCredit [name='installments']").val(),
                            id_plano: $('.id_plano').val(),
                            formaPagamento: "credit_card",
                            token: data.id,
                            tipo: tipo,
                            plano: plano
                        },
                        '<?=base_url("Pagamentos/iniPagamento".(isset($_GET["DEV"]) ? '?debug=true' : ''))?>',
                        function() {
                            $("#enviaForm").prop("disabled", false);
                            $("#enviaForm").css('opacity', '1');
                        });

                }
            }
            var number = $("#cardCredit [name='numberCard']").val();
            var nomeCompleto = $("#cardCredit [name='nomeCard']").val().split(" ");
            var expiration = $("#cardCredit [name='validateCar']").val().split("/");
            var cvv = $("#cardCredit [name='cvvCard']").val();
            var sobrenome = "";
            nomeCompleto.forEach(function(nome, indice) {
                if (indice) {
                    sobrenome = sobrenome + " " + nome;
                }

            });
            number = number.replace("_", "");
            console.log(number);
            var primeiroNome = nomeCompleto[0];
            var cc = Iugu.CreditCard(number, expiration[0], expiration[1], primeiroNome, sobrenome,
                cvv);
            Iugu.createPaymentToken(cc, tokenResponseHandler);
            return false;
        });


    });
    </script>


    <script>
    function scrolldiv(divId) {
        window.scrollTo(0,
            findPosition(document.getElementById(divId)));
    }

    function findPosition(obj) {
        var currenttop = 0;
        if (obj.offsetParent) {
            do {
                currenttop += obj.offsetTop;
            } while ((obj = obj.offsetParent));
            return [currenttop];
        }
    }
    $(document).ready(function() {
        ClassicEditor.create(document.querySelector('#editor'), {

            ckfinder: {
                uploadUrl: '<?=base_url("Templates/envImg")?>',
            },
            language: 'pt-br',


        }).then(editor => {
            window.editor = editor;
        }).catch(error => {
            console.error(error);
        });
        var dadosConvidado, dadosUsuario, dadosPagina;
        $(".editaConvidado").click(function() {
            dadosConvidado = $(this).data("dados");
            $(".abreCadastroConvidado").click();
            $("[name='nome']").val(dadosConvidado["nomeConvidado"]);
            $("[name='sobrenome']").val(dadosConvidado["sobrenomeConvidado"]);
            $("[name='telefone']").val(dadosConvidado["telefoneConvidado"]);
            $("[name='email']").val(dadosConvidado["emailConvidado"]);
            $(".formConvidado").attr("action", "<?=base_url("Cadastro/novoConvidado")?>/" +
                dadosConvidado["id_convidado"]);
            console.log(dadosConvidado);
        });

        $(".editarUsuario").click(function() {
            dadosUsuario = $(this).data("dados");
            $(".novoProtagonista").slideToggle(300);
            $("[name='nome']").val(dadosUsuario["nome"]);
            $("[name='telefone']").val(dadosUsuario["telefone"]);
            $("[name='email']").val(dadosUsuario["email"]);
            $(".formUsuario").attr("action", "<?=base_url("Cadastro/novoUsuarioSistema")?>/" +
                dadosUsuario["user"]);
            console.log(dadosPagina);
        });

        $(".editarPagina").click(function() {
            dadosPagina = $(this).data("dados");
            $(".novaPagina").slideToggle(300);

            $("[name='titulo']").val(dadosPagina["titulo"]);
            $("[name='html']").val(dadosPagina["html"]);
            $(".formPagina").attr("action", "<?=base_url("Cadastro/novaPagina")?>/" + dadosPagina[
                "id_pagina"]);

            $(".ck.ck-content").val(dadosPagina["html"]);
            console.log(dadosPagina);
        });
        $("form#formzoneConvidados").dropzone({
            success: function(file, retorno) {
                document.location.reload(true);
            }

        });
        $("form#formzoneGal").dropzone({
            maxFiles: maxArquivos,
            success: function(file, retorno) {
                document.location.reload(true);
            }

        });



        $("[name='cep']").keyup(function() {
            var cep = $(this).val();

            submitdado({
                cep: cep
            }, "<?=base_url("Ajax/populaEnderecoCepCheckout")?>");
        });
    });
    </script>
    <link href="<?= base_url('assets/slim.min.css')?>" rel="stylesheet">
    <script src="<?= base_url('assets/slim.kickstart.min.js') ?>"></script>


</body>

</html>