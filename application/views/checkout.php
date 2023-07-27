<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view("sites/".$config["template"]."_head")?>

    <link href="<?=base_url("assets/touchspin/jquery.bootstrap-touchspin.css")?>" id="app-style" rel="stylesheet"
        type="text/css" />
    <style>
    .thead {
        padding: 20px 0;
        border-bottom: 1px solid #d2d2d2;
    }

    .tbody {
        border-bottom: 1px solid #d2d2d2;
        padding: 0 0 26px 0;
    }

    .thead span {
        font-weight: bold;
    }

    a.removeItemCarrinho {
        font-size: 30px;
        position: absolute;
        top: -11px;
        right: 210px;
        color: #ed6b6b;
    }

    button.btn.btn-primary.bootstrap-touchspin-down {
        height: 38px;
        line-height: 0;
    }

    button.btn.btn-primary.bootstrap-touchspin-up {
        height: 38px;
        line-height: 0;
    }

    a.btn.btn-primary.waves-effect {
        background: #3cc11a;
    }
    </style>
</head>

<body>
    <?php $this->load->view("sites/".$config["template"]."_nav")?>

    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3 class="titleCentro">Finalizar compra dos presentes</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row thead">
            <div class="col-8 col-sm-5">
                <span>Descrição</span>
            </div>
            <div class="col-4 col-sm-3">
                <span>Quantidade</span>
            </div>
            <div class="col-12 col-sm-4">
                <span>Valor</span>
            </div>
        </div>
        <?php
            foreach($line_items as $item){
                $totalItem = $item["price"]*$item["quantity"];
                ?>
                <div class="row tbody">
                    <div class="col-8 col-sm-5">
        
                        <span><?=$item["description"]?></span>
                    </div>
                    <div class="col-4 col-sm-3">
                        <span>
                            <input class="quantidade" type="text" value="<?=$item["quantity"]?>" data-id="<?=$item["id_item"]?>">
                        </span>
                    </div>
                    <div class="col-12 col-sm-4">
                        <span> R$ <?=nf($totalItem)?></span>
                        <span><a href="<?=base_url("Checkout/removeItem/".$item["id_item"]."/".$tokencart)?>" class="removeItemCarrinho ajax"><i class="ion-ios-trash"></i></a></span>
                    </div>
                </div>
                
                <?php
                $total+=$totalItem;
            }
        ?>
        <div class="row tbody">
            <div class="col-8 text-right">
                <span><strong>Total</strong></span>
            </div>
            <div class="col-4">
                <span><strong>R$ <?=nf($total)?></strong></span>

            </div>
        </div>
        <div class="row tbody">
            <div class="col-12">
                <span><a href="<?=base_url("finalizarpagamento/".$evento["slug"]."/".$tokencart)?>"
                        class="btn btn-primary waves-effect waves-light" style="width:100%"><i class="ion-ios-card"></i> Finalizar
                        Pagamento</a></span>
            </div>

            <div class="col-12">
                <span><a href="<?=base_url("lista/".$evento["slug"])?>"
                        class="btn btn-secondary waves-effect waves-light" style="width:100%;margin-top:20px"><i class="ion-ios-gift"></i> Escolher mais presentes</a></span>
            </div>
        </div>
    </div>

    <?php $this->load->view("blocos/mapa")?>
    

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

    $(".quantidade").change(function(){
        var quantidade = $(this).val();
        var id = $(this).data("id");
        var tokencart = "<?=$tokencart?>";
        submitdado({id,quantidade,tokencart},"<?=base_url("Checkout/quantityCart")?>");
    });

});
</script>