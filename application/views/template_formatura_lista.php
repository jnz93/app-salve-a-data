<!DOCTYPE html>
<html lang="zxx">

<head>
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
    <link href="<?=base_url("assets/touchspin/jquery.bootstrap-touchspin.css")?>" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=base_url("assets-sites/css/casamento.css")?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" />
        <?php $this->load->view("styles/casamento.php")?>
    <style>
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


</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-ios-menu"></i>
            </button>
            <?php $this->load->view("pages/nav")?>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- home intro -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3 class="titleCentro">Listagem dos presentes</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <?php
            if(count($presentes) > 0){
             
                foreach($presentes as $presente){
                    ?>
            <div class="col-sm-3">
                <div class="card" data-product-id="<?=$presente["id_presente"]?>">
                    <input class="price" type="hidden" value="<?=$presente["valor"]?>">
                    <input class="description" type="hidden" value="<?=$presente["produto"]?>">
                    <img class="card-img-top img-fluid" src="<?=$presente["imagem"]?>" alt="<?=$presente["produto"]?>">
                    <div class="card-body">
                        <h4 class="card-title mt-0"><?=$presente["produto"]?></h4>
                        <p class="card-text"><?=$presente["descricao"]?></p>
                        <p class="card-text">R$ <?=nf($presente["valor"])?></p>
                        <input class="quantidade" type="text" value="1" data-id-quatidade="<?=$presente["id_presente"]?>">
                        <button type="button" class="btn btn-primary waves-effect waves-light addCart" data-id="<?=$presente["id_presente"]?>" style="width: 100%;">Comprar</button>
                    </div>
                </div>
            </div>
            <?php
                }
                   
            }else{
                ?>
                <div class="col-12 text-center">
                    <span class="textoAviso" style="color: #000000">O anfitrião ainda não adicionou nenhum presente em sua lista.</span>
                </div>
                <?php
            }
            ?>

        </div>
    </div>

    <?php $this->load->view("blocos/mapa")?>
    <!-- end portfolio -->

    <!-- services -->
   
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

    button.btn.btn-primary.bootstrap-touchspin-down {
    height: 38px;
    line-height: 0;
}

button.btn.btn-primary.bootstrap-touchspin-up {
    height: 38px;
    line-height: 0;
}

button.btn.btn-primary.waves-effect {
    background: #3cc11a;
    margin: 20px 0;
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
<script src="<?=base_url("assets/touchspin/jquery.bootstrap-touchspin.js")?>"></script>


<script src="<?=base_url("assets/js/pages/lightbox.init.js")?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
    integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
    crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $(".abreMensagem").click(function() {
        $("#mensagemModal").modal("show");
    });

    $(".quantidade").TouchSpin({
        min: -1000000000,
        max: 1000000000,
        stepinterval: 50,
        maxboostedstep: 10000000,
        prefix: ''
    });

    $(".addCart").click(function(){
        var id = $(this).data("id");
        var quantidade = $(".quantidade[data-id-quatidade='"+id+"']").val();
        var evento = "<?=$evento["id_evento"]?>";
        var price = $(".card[data-product-id='"+id+"'] .price").val();
        var description = $(".card[data-product-id='"+id+"'] .description").val();
        var img = $(".card[data-product-id='"+id+"'] .card-img-top").attr("src");
        var tokencart = 0;
        var storageCart = localStorage.getItem('tokencart');

        if(storageCart){
            tokencart = storageCart;
        }

        submitdado({id,quantidade,evento,price,description,img,tokencart},"<?=base_url("Checkout/addCart")?>");
    });

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