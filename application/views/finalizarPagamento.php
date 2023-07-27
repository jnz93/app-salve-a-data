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
    <?php
        $totalApresenta = 0;
        $faturaLista = "";
        foreach($line_items as $item){
            $totalItem = $item["price"]*$item["quantity"];
            $faturaLista .= '<span class="descriptionPlanPayment col-8">'.$item["description"].' '.$item["quantity"].'x</span><span class="pricePlanPayment col-4">R$'.nf($totalItem).'</span>';
            $totalApresenta+=$totalItem;
            $total+=$totalItem;
        }
    ?>
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12"><br>
                    <h4 class="card-title">Meios de pagamento</h4>
                    <p class="card-title-desc">Selecione um meio de pagamento.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="row">
                        <div class="col-4">
                            <button class="buttonPayment" data-payment="creditCard">
                                <div class="boxSelectPagamento text-center paymentSelected optionCreditCard">
                                    <span class="badge rounded-pill bg-info float-end checkPayment cardCreditIcon">
                                        <p class=" ion-md-checkmark"></p>
                                    </span>
                                    <img class="cardCredit" src="<?=base_url("assets/images/cartao.png")?>">
                                </div>
                            </button>
                        </div>
                        <div class="col-4">
                            <button class="buttonPayment" data-payment="boleto">
                                <div class="boxSelectPagamento text-center optionBoleto">
                                    <span class="badge rounded-pill bg-info float-end checkPayment boletoIcon d-none">
                                        <p class=" ion-md-checkmark"></p>
                                    </span>
                                    <img src="<?=base_url("assets/images/boleto.png")?>">
                                </div>
                            </button>
                        </div>
                        <div class="col-4">
                            <button class="buttonPayment" data-payment="pix">
                                <div class="boxSelectPagamento text-center optionPix">
                                    <span class="badge rounded-pill bg-info float-end checkPayment pixIcon d-none">
                                        <p class=" ion-md-checkmark"></p>
                                    </span>
                                    <img src="<?=base_url("assets/images/pix.png")?>">
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="envPaymentCardCredit row">
                    <div class="col-sm-6 dataCreditCardF ">
                        <form class="row" id="cardCredit" method="post">
                            <input type="hidden" name="formaPagamento" value="cardCredit">
                            <div class="col-sm-12 campoForm">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="col-sm-12 campoForm">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>Telefone</label>
                                <input type="text" name="telefone" class="form-control input-mask"
                                    data-inputmask="'mask': '(99) 9 9999-9999'" placeholder="(••) •••••-••••">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>CPF</label>
                                <input type="text" name="cpf" class="form-control input-mask"
                                    data-inputmask="'mask': '999.999.999-99'" placeholder="•••.•••.•••-••">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>CEP</label>
                                <input type="text" name="cep" class="form-control input-mask"
                                    data-inputmask="'mask': '99999-999'" placeholder="CEP">
                            </div>
                            <div class="col-sm-6 campoForm"></div>
                            <div class="col-sm-12 campoForm">
                                <label>Rua</label>
                                <input type="text" name="logradouro" class="form-control" placeholder="Rua">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>Número</label>
                                <input type="text" name="numero" class="form-control" placeholder="Número">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>Complemento</label>
                                <input type="text" name="complemento" class="form-control" placeholder="Complemento">
                            </div>
                            <div class="col-sm-4 campoForm">
                                <label>Bairro</label>
                                <input type="text" name="bairro" class="form-control" placeholder="Bairro">
                            </div>
                            <div class="col-sm-4 campoForm">
                                <label>Cidade</label>
                                <input type="text" name="cidade" class="form-control" placeholder="Cidade">
                            </div>
                            <div class="col-sm-4 campoForm">
                                <label>Estado</label>
                                <input type="text" name="uf" class="form-control" placeholder="estado">
                            </div>

                            <div class="col-sm-12"><br>
                                <p class="card-title-desc">Dados do cartão de crédito.</p>
                            </div>
                            <div class="col-sm-12 campoForm">
                                <label>Nome no Cartão</label>
                                <input type="text" name="nomeCard" class="form-control" placeholder="Nome">
                            </div>
                            <div class="col-sm-12 campoForm">
                                <label>Número do Cartão</label>
                                <input type="text" name="numberCard" class="form-control input-mask"
                                    data-inputmask="'mask': '9999 9999 9999 99999'" placeholder="•••• •••• •••• ••••">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>Data de Validade</label>
                                <input type="text" name="validateCar" class="form-control input-mask"
                                    data-inputmask="'mask': '99/99'" placeholder="••/••">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>CVV</label>
                                <input type="text" name="cvvCard" class="form-control input-mask"
                                    data-inputmask="'mask': '999'" placeholder="CVV">
                            </div>
                            <div class="col-sm-12 campoForm">
                                <label>Número do CPF do Titular</label>
                                <input type="text" name="cpfCard" class="form-control input-mask"
                                    data-inputmask="'mask': '999.999.999-99'" placeholder="•••.•••.•••-••">
                            </div>
                            <div class="col-sm-12 campoForm">
                                <label>Parcelamento</label>
                                <select name="installments" class="form-control">
                                    <?php
                                        for($i=1;$i<=$installments;$i++){
                                            $jurosParcela = (($total/100)*$juros[$i]);
                                            $total = $jurosParcela+$total;
                                            $parcelado = $total/$i;
                                            if($i == 1){
                                                $comJuros = " (Sem juros)";
                                            }else{
                                                $comJuros = " (Com juros)";

                                            }
                                            echo "<option value='$i'>".$i."x R$".nf($parcelado)."$comJuros</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-12 campoForm">
                                <div class="msgPgto"></div>
                            </div>
                            <div class="col-sm-12 campoForm">
                                <div class="mensagem">
                                    <label>Tem algum recado especial? Deixe aqui ❤️</label>
                                    <textarea name="observacao" class="form-control"></textarea>
                                </div>
                            </div>


                            <div class="col-sm-12 text-left botoesAcoes">
                                <button type="button"
                                    class="btn btn-primary waves-effect waves-light btPadrao btFormCartao"><i
                                        class="ion-ios-lock"></i> Finalizar
                                    Pagamento</button>
                                <a href="<?=base_url("checkout/".$evento["slug"]."/".$tokencart)?>"
                                    class="btn btn-secondary waves-effect waves-light"
                                    style="width:100%;margin-top:20px"><i class="ion-ios-cart"></i> Ver
                                    carrinho</a></span>

                            </div>
                        </form>
                    </div>

                    <div class="col-sm-6 dataBoleto" style="display:none">
                        <form action="<?=base_url("Checkout/paymentBankSlip")?>" class="row ajax">
                            <input type="hidden" name="formaPagamento" value="boleto">
                            <input type="hidden" name="id_evento" value="<?=$evento["id_evento"]?>">
                            <input type="hidden" name="tokenCart" value="<?=$tokencart?>">
                            <div class="col-sm-12 campoForm">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="col-sm-12 campoForm">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>Telefone</label>
                                <input type="text" name="telefone" class="form-control input-mask"
                                    data-inputmask="'mask': '(99) 9 9999-9999'" placeholder="(••) •••••-••••">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>CPF</label>
                                <input type="text" name="cpf" class="form-control input-mask"
                                    data-inputmask="'mask': '999.999.999-99'" placeholder="•••.•••.•••-••">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>CEP</label>
                                <input type="text" name="cep" class="form-control input-mask"
                                    data-inputmask="'mask': '99999-999'" placeholder="CEP">
                            </div>
                            <div class="col-sm-6 campoForm"></div>
                            <div class="col-sm-12 campoForm">
                                <label>Rua</label>
                                <input type="text" name="logradouro" class="form-control" placeholder="Rua">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>Número</label>
                                <input type="text" name="numero" class="form-control" placeholder="Número">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>Complemento</label>
                                <input type="text" name="complemento" class="form-control" placeholder="Complemento">
                            </div>
                            <div class="col-sm-4 campoForm">
                                <label>Bairro</label>
                                <input type="text" name="bairro" class="form-control" placeholder="Bairro">
                            </div>
                            <div class="col-sm-4 campoForm">
                                <label>Cidade</label>
                                <input type="text" name="cidade" class="form-control" placeholder="Cidade">
                            </div>
                            <div class="col-sm-4 campoForm">
                                <label>Estado</label>
                                <input type="text" name="uf" class="form-control" placeholder="estado">
                            </div>
                            <div class="col-sm-12 campoForm">
                                <div class="mensagem">
                                    <label>Tem algum recado especial? Deixe aqui ❤️</label>
                                    <textarea name="observacao" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 text-left botoesAcoes">
                                <button type="submit" class="btn btn-primary waves-effect waves-light btPadrao"><i
                                        class="ion-ios-lock"></i> Finalizar
                                    Pagamento</button>
                                <a href="<?=base_url("checkout/".$evento["slug"]."/".$tokencart)?>"
                                    class="btn btn-secondary waves-effect waves-light"
                                    style="width:100%;margin-top:20px"><i class="ion-ios-cart"></i> Ver
                                    carrinho</a></span>

                            </div>
                        </form>
                    </div>

                    <div class="col-sm-6 dataPix" style="display:none">
                        <form action="<?=base_url("Checkout/paymentBankSlip")?>" class="row ajax">
                            <input type="hidden" name="formaPagamento" value="pix">
                            <input type="hidden" name="id_evento" value="<?=$evento["id_evento"]?>">
                            <input type="hidden" name="tokenCart" value="<?=$tokencart?>">
                            <div class="col-sm-12 campoForm">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="col-sm-12 campoForm">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>Telefone</label>
                                <input type="text" name="telefone" class="form-control input-mask"
                                    data-inputmask="'mask': '(99) 9 9999-9999'" placeholder="(••) •••••-••••">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>CPF</label>
                                <input type="text" name="cpf" class="form-control input-mask"
                                    data-inputmask="'mask': '999.999.999-99'" placeholder="•••.•••.•••-••">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>CEP</label>
                                <input type="text" name="cep" class="form-control input-mask"
                                    data-inputmask="'mask': '99999-999'" placeholder="CEP">
                            </div>
                            <div class="col-sm-6 campoForm"></div>
                            <div class="col-sm-12 campoForm">
                                <label>Rua</label>
                                <input type="text" name="logradouro" class="form-control" placeholder="Rua">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>Número</label>
                                <input type="text" name="numero" class="form-control" placeholder="Número">
                            </div>
                            <div class="col-sm-6 campoForm">
                                <label>Complemento</label>
                                <input type="text" name="complemento" class="form-control" placeholder="Complemento">
                            </div>
                            <div class="col-sm-4 campoForm">
                                <label>Bairro</label>
                                <input type="text" name="bairro" class="form-control" placeholder="Bairro">
                            </div>
                            <div class="col-sm-4 campoForm">
                                <label>Cidade</label>
                                <input type="text" name="cidade" class="form-control" placeholder="Cidade">
                            </div>
                            <div class="col-sm-4 campoForm">
                                <label>Estado</label>
                                <input type="text" name="uf" class="form-control" placeholder="estado">
                            </div>
                            <div class="col-sm-12 campoForm">
                                <div class="mensagem">
                                    <label>Tem algum recado especial? Deixe aqui ❤️</label>
                                    <textarea name="observacao" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 text-left botoesAcoes">
                                <button type="submit" class="btn btn-primary waves-effect waves-light btPadrao"><i
                                        class="ion-ios-lock"></i> Finalizar
                                    Pagamento</button>
                                <a href="<?=base_url("checkout/".$evento["slug"]."/".$tokencart)?>"
                                    class="btn btn-secondary waves-effect waves-light"
                                    style="width:100%;margin-top:20px"><i class="ion-ios-cart"></i> Ver
                                    carrinho</a></span>

                            </div>
                        </form>
                    </div>

                    <div class="col-sm-6 dataCreditCard">
                        <div class="detalhesCompra row">
                            <span class="boxDescriptionPayment row" style="width: 100%">
                                <?=$faturaLista?>
                            </span>
                            <hr>
                            <span class="boxTotalPayment row" style="width: 100%">
                                <span class="totalPlanPayment col-6">Total</span>
                                <span class="totalPlanPayment col-6" style="text-align:right;">R$ <?=nf($totalApresenta)?></span>
                            </span>

                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>

    <?php $this->load->view("blocos/mapa")?>
    
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

<script src="<?=base_url("assets/libs/inputmask/min/jquery.inputmask.bundle.min.js")?>"></script>
<?php $this->load->view("scripts/scripts.php");?>

<?php $this->load->view("blocos/musica")?>