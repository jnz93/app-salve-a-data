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
    <link href="<?=base_url("assets/css/icons.min.css")?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url("assets/libs/dropzone/min/dropzone.min.css")?>" id="app-style" rel="stylesheet"
        type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oooh+Baby&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url("assets-sites/css/casamento.css")?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" />


        <?php $this->load->view("styles/casamento.php")?>

<style>
    .home-intro {
    padding: 50px 0 !important;
    margin: 0 0 0 0;
    background-size: 100% auto;
    background-repeat: no-repeat;
}
img.imgSobre {
    width: 100%;
    border-radius: 50%;
    min-height: 300px;
    height: auto !important;
}
    </style>

</head>

<body>
    <div class="row">
    <div class="col-12 col-sm-3">
            <?php $this->load->view("edicao/blocoedicao")?>
        </div>
        <div class="col-9 d-none d-sm-block">
        <iframe src="<?=base_url("site/".$slug)?>" style="
    border: none;
    width: 100%;
    height: 803px;
"></iframe>

        </div>
    </div>
    </div>
    <!-- navbar -->

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
        background: <?=$config["corComplementar"]?>;
        border: 1px solid <?=$config["corComplementar"]?>;
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

    .retValidaUrl p.success {
        padding: 5px;
        font-size: 13px;
        color: #27b722;
        font-weight: bold;
    }

    .retValidaUrl p.error {
        padding: 5px;
        font-size: 13px;
        color: #b73a22;
        font-weight: bold;
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
<script src="<?=base_url("assets/libs/dropzone/min/dropzone.min.js")?>"></script>
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
<script>
$(document).ready(function() {
    $('[name="slug"]').keyup(function() {
        var url = $(this).val();
        submitdado({
            url
        }, "<?=base_url("Templates/consultaUrl")?>");
    })
});
</script>
<?php
    if($evento["contagemRegressiva"]){
        ?>
<link rel="stylesheet" href="<?=base_url("css/clock.css")?>">
<script>
var textoHoje = "Olá";
var ano = "<?=date("Y",strtotime($evento["dataInicio"]))?>";
var dia = "<?=date("d",strtotime($evento["dataInicio"]))?>";
var mes = "<?=date("m",strtotime($evento["dataInicio"]))?>";
</script>
<script src="<?=base_url("js/clock.js")?>"></script>
<?php
    }
?>
<?php $this->load->view("blocos/musica")?>
<?php $this->load->view("scripts/slim")?>