<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view("sites/".$config["template"]."_head")?>
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

    .msgPgto {
        font-size: 14px;
        color: #e65c5c;
    }

    .row {
        width: 100% !important;
    }

    span.iconStatus.success {
        font-size: 100px;
        color: #25cb35;
    }

    p.titStatus {
        font-size: 22px;
    }

    i.ion-ios-information-circle {
        font-size: 100px;
        color: #f2bd2d;
    }

    span.iconStatus.cancelled {
        font-size: 100px;
        color: #e45858;
    }

    .boleto img {
        height: 100px;
    }

    .pix img {
        height: 300px;
    }
    </style>
</head>

<body>
    <?php $this->load->view("sites/".$config["template"]."_nav")?>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3 class="titleCentro">Pagamento finalizado</h3>
                </div>
            </div>
        </div>
    </div>
    <?php
        $total = 0;
        $faturaLista = "";
        foreach($line_items as $item){
            $totalItem = $item["price"]*$item["quantity"];
            $faturaLista .= '<span class="descriptionPlanPayment col-8">'.$item["description"].' '.$item["quantity"].'x</span><span class="pricePlanPayment col-4">R$'.nf($totalItem).'</span>';
            $total+=$totalItem;
        }
    ?>
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12"><br>
                    <h4 class="card-title">Status do pagamento</h4>
                    <!-- <p class="card-title-desc">Selecione um meio de pagamento.</p> -->
                </div>
            </div>

            <div class="row">
                <div class="envPaymentCardCredit row">
                    <div class="col-sm-6 retornoCreditCard text-center">
                        <?php
                            if($fatura["forma"] == "credit_card"){
                                if($dadosFatura["status"] == "paid"){
                                    echo '<span class="iconStatus success"><i class="ion-ios-checkmark-circle"></i></span>
                                    <p class="titStatus">O pagamento do seu presente foi confirmado com sucesso!</p>';
                                }elseif($dadosFatura["status"] == "pending"){
                                    echo '<span class="iconStatus pending"><i class="ion-ios-information-circle"></i></span>
                                    <p class="titStatus">O pagamento do seu presente está em análise!</p>';
                                }else{
                                    echo '<span class="iconStatus cancelled"><i class="ion-md-close-circle"></i></span>
                                    <p class="titStatus">O pagamento do seu presente foi recusado!</p>';
                                }
                                ?>

                        <?php
                            }

                            if($fatura["forma"] == "boleto"){
                                if($dadosFatura["status"] == "paid"){
                                    echo '<span class="iconStatus success"><i class="ion-ios-checkmark-circle"></i></span>
                                    <p class="titStatus">O pagamento do seu presente foi confirmado com sucesso!</p>';
                                }elseif($dadosFatura["status"] != "paid"){
                                 echo '<span class="iconStatus boleto"><a href="'.$dadosFatura["secure_url"].'?bs=true" target="_BLANK"><img src="'.base_url("assets/images/boleto.png").'"></a></span>
                                 <a href="'.$dadosFatura["secure_url"].'?bs=true" target="_BLANK"> <p class="titStatus">Clique para imprimir seu boleto</p></a>';
                                }
                            }

                            if($fatura["forma"] == "pix"){
                                if($dadosFatura["status"] == "paid"){
                                    echo '<span class="iconStatus success"><i class="ion-ios-checkmark-circle"></i></span>
                                    <p class="titStatus">O pagamento do seu presente foi confirmado com sucesso!</p>';
                                }elseif($dadosFatura["status"] != "paid"){

                                 echo '<p class="titStatus">Escaneie ou copie seu código PIX</p><span class="iconStatus pix"><img src="'.$dadosFatura["pix"]["qrcode"].'"></span>
                                 <div class="row">
                                    <div class="col-9">
                                        <input type="text" class="form-control pixcola" value="'.$dadosFatura["pix"]["qrcode_text"].'" >
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btPix" style="font-size:16px" id="btPix">Copiar</button>
                                    </div>
                                 </div>
                                 ';
                                }
                            }
                        ?>

                        <?php
                            // echo "<pre>";
                            // print_r($dadosFatura);
                        ?>



                    </div>


                    <div class="col-sm-6 dataCreditCard">
                        <div class="detalhesCompra row">
                            <span class="boxDescriptionPayment row" style="width: 100%">
                                <?=$faturaLista?>
                            </span>
                            <hr>
                            <span class="boxTotalPayment row" style="width: 100%">
                                <span class="totalPlanPayment col-6">Total</span>
                                <span class="totalPlanPayment col-6" style="text-align:right;">R$ <?=nf($total)?></span>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
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
        font-size: 14px;
        top: -7px;
        position: relative;
        color: #ffffff;
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

    button.buttonPayment:focus {
        border: none;
        outline: none;
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
    document.getElementById('btPix').addEventListener('click', execCopy);

    function execCopy() {
        document.querySelector(".pixcola").select();
        document.execCommand("copy");
    }
});
</script>
<?php $this->load->view("blocos/musica")?>