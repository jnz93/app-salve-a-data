<style>
.checkSuccess i,
.checkSuccess p {
    color: #22bd26;
    display: inline-block;
    margin: 0 10px;
}

.ribbon6.bg-info {
    box-shadow: 0 0 0 3px #0066a2, 0px 21px 5px -18px rgba(0, 0, 0, 0.6);
    background-color: #0066a2;
}

.ribbon6 {
    width: 200px;
    height: 40px;
    line-height: 40px;
    position: absolute;
    top: 30px;
    right: -50px;
    z-index: 2;
    overflow: hidden;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    border: 1px dashed;
    box-shadow: 0 0 0 3px #57dd43, 0px 21px 5px -18px rgba(0, 0, 0, 0.6);
    background: #57dd43;
    text-align: center;
    color: #ffffff;
}

.ribbon7 {
    width: 251px;
    height: 56px;
    line-height: 40px;
    position: absolute;
    top: 20px;
    right: -64px;
    z-index: 2;
    overflow: hidden;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    border: 1px dashed;
    box-shadow: 0 0 0 3px #000000, 0px 21px 5px -18px rgba(0, 0, 0, 0.6);
    background: #2f2f2f;
    text-align: center;
    color: #ffffff;
}

.ribbon {
    height: 188px;
    position: relative;
    margin-bottom: 30px;
    background: url(https://html5book.ru/wp-content/uploads/2015/10/snow-road.jpg);
    background-size: cover;
    text-transform: uppercase;
    color: white;
}

.wrap {
    width: 100%;
    height: 188px;
    position: absolute;
    top: -8px;
    left: 8px;
    overflow: hidden;
}

.wrap:before,
.wrap:after {
    content: '';
    position: absolute;
}

.wrap:before {
    width: 40px;
    height: 8px;
    right: 100px;
    background: #4d6530;
    border-radius: 8px 8px 0px 0px;
}

.wrap:after {
    width: 8px;
    height: 40px;
    right: 0px;
    top: 100px;
    background: #4d6530;
    border-radius: 0px 8px 8px 0px;
}

.wrap.contratado:after {
    background: #004167;
}

.wrap.contratado:before {
    background: #004167;
}

.wrap-black-friday {
    width: 100%;
    height: 188px;
    position: absolute;
    top: -8px;
    left: 8px;
    overflow: hidden;
}

.wrap-black-friday:after {
    width: 8px;
    height: 22px;
    right: 0px;
    top: 137px;
    background: black;
    border-radius: 0px 8px 8px 0px;
}

.wrap-black-friday:before {
    width: 17px;
    height: 8px;
    right: 143px;
    background: black;
    border-radius: 8px 8px 0px 0px;
}

.wrap-black-friday:before,
.wrap-black-friday:after {
    content: '';
    position: absolute;
}

.planoSelecionado {
    box-shadow: 0 0 0 3px #1d9ff1, 0px 21px 5px -18px rgb(0 0 0 / 60%) !important;
    background: #1d9ff1 !important;
}
</style>

<?php
    $labelPlanoAtualGratis = "";
    $labelPlanoAtualBasico = "";
    $labelPlanoAtualPremium = "";
    if($evento["id_plano"] == 1){
        $labelPlanoAtualBasico = '<div class="wrap"><span class="ribbon6 planoSelecionado">Plano Atual</span></div>';
    }elseif($evento["id_plano"] == 2){
        $labelPlanoAtualPremium = '<div class="wrap"><span class="ribbon6 planoSelecionado">Plano Atual</span></div>';
    }else{
        $labelPlanoAtualGratis = '<div class="wrap"><span class="ribbon6 planoSelecionado">Plano Atual</span></div>';
    }
?>
<div class="page-content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18"><?=$title?></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="<?=base_url("site/".$evento["slug"])?>"
                                target="_BLANK" type="button"
                                class="btn btn-primary btn-sm waves-effect waves-light visualizarSite"><span
                                    class="mdi mdi-launch"></span> Visualizar site</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12"><br>
                            <h4 class="card-title">Planos Salve a Data</h4>
                            <p class="card-title-desc">Assine para viver uma experiência incrível com a Salve a Data.
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card plan-box">
                                <?=$labelPlanoAtualGratis?>
                                <div class="card-body p-4 boxPlano">
                                    <div class="d-flex align-items-start topPlano"></div>
                                    <div class="mt-4 text-center">
                                        <span class="titPlano">Salve a Data</span><br>
                                        <span class="descricaoPlano">Grátis</span>
                                    </div>

                                    <div class="p-4 text-muted mt-2 text-center">
                                        <span class="valorPlano">
                                            <span class="cifrao">R$</span>
                                            <span class="valor">0,00</span>
                                        </span>
                                    </div>
                                    <div class="p-4 text-muted mt-2 text-center">
                                        <span class="descricaoCompleta">Organize e planeje seu evento de forma
                                            gratuita</span>
                                    </div>
                                    <div class="row p-4 text-muted mt-2 text-center"
                                        style="text-align: justify !important;">

                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Lista editável de presentes</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Lista de convidados</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Confirmação de convidados</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Recados de seus convidados</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Um layout</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Até cinco fotos na galeria</p>
                                        </div>

                                    </div>



                                    <!-- <div class="text-center p-4">
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Assinar</a>
                                    </div> -->

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card plan-box">
                                <?=$labelPlanoAtualBasico?>
                                <div class="card-body p-4 boxPlano">
                                    <div class="d-flex align-items-start topPlano"></div>
                                    <div class="mt-4 text-center">
                                        <span class="titPlano">Salve a Data</span><br>
                                        <span class="descricaoPlano">Plano Básico</span>
                                    </div>

                                    <div class="p-4 text-muted mt-2 text-center">
                                        <span class="valorPlano">
                                            <span class="cifrao">6x de R$</span>
                                            <span class="valor">14,90</span>
                                        </span><br><br>
                                        <span class="valorPlano">
                                            <span class="cifrao">À vista por R$</span>
                                            <span class="cifrao">79,00</span>
                                        </span>
                                    </div>


                                    <div class="p-4 text-muted mt-2 text-center">
                                        <span class="descricaoCompleta">Tenha acesso a experiência Básico do Salve a
                                            Data</span>
                                    </div>
                                    <div class="row p-4 text-muted mt-2 text-center"
                                        style="text-align: justify !important;">
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Lista editável de presentes</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Lista de convidados</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Confirmação de convidados</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Recados de seus convidados</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Páginas personalizadas</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Acesso a todos os layouts</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Até 10 fotos na galeria</p>
                                        </div>


                                    </div>
                                    <?php
                                    if($evento["id_plano"] != 2){
                                    ?>
                                    <div class="text-center p-4">
                                        <button class="btn btn-primary waves-effect waves-light btAssinar"
                                            data-idplano="1">Assinar</button>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card plan-box">
                                <?=$labelPlanoAtualPremium?>
                                <div class="card-body p-4 boxPlano">
                                    <div class="d-flex align-items-start topPlano"></div>
                                    <div class="mt-4 text-center">
                                        <span class="titPlano">Salve a Data</span><br>
                                        <span class="descricaoPlano">Plano Premium</span>
                                    </div>

                                    <div class="p-4 text-muted mt-2 text-center">
                                        <span class="valorPlano">
                                            <span class="cifrao">6x de R$</span>
                                            <span class="valor">22,90</span>
                                        </span><br><br>
                                        <span class="valorPlano">
                                            <span class="cifrao">À vista por R$</span>
                                            <span class="cifrao">127,00</span>
                                        </span>
                                    </div>

                                    <div class="p-4 text-muted mt-2 text-center">
                                        <span class="descricaoCompleta">Tenha acesso a experiência PREMIUM do Salve a
                                            Data</span>
                                    </div>
                                    <div class="row p-4 text-muted mt-2 text-center"
                                        style="text-align: justify !important;">
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Lista editável de presentes</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Lista de convidados</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Confirmação de convidados</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Recados de seus convidados</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Páginas personalizadas</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Música a sua escolha</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Domínio personalizado</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Acesso a todos os layouts</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Fotos ilimitadas pré e pós evento</p>
                                        </div>
                                        <div class="col-12 checkSuccess">
                                            <i class="bx bxs-check-circle"></i>
                                            <p>Assessoria personalizada</p>
                                        </div>
                                    </div>
                                    <?php
                                    if($evento["id_plano"] != 2){
                                    ?>
                                    <div class="text-center p-4">
                                        <button class="btn btn-primary waves-effect waves-light btAssinar"
                                            data-idplano="2">Assinar</button>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>

    <?php
    $tipos = array(
        "credit_cart"=>"cartão de crédito",
        "pix"=>"PIX",
        "bank_slip"=>"boleto"
    );
        if($fatura){
            $btFatura = "";
            if($fatura["status"] == "pending"){
                $titleFatura = "Sua fatura ainda esta pendente, você pode fazer o pagamento no link abaixo.";
                $btFatura = '<a href="'.$fatura["url_fatura"].'" target="_BLANK" class="linkFatura btn btn-primary waves-effect waves-light">Pagar fatura via '.$tipos[$fatura["forma"]].'</a>';
            }elseif($fatura["status"] == "cancelled"){
                $titleFatura = "Sua fatura foi expirada, você pode gerar uma nova selecionando um novo meio de pagamento.";
            }elseif($fatura["status"] == "paid"){
                $titleFatura = "Sua fatura esta paga e seu plano já esta ativo, aproveite.";
            }
            ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12"><br>
                            <h4 class="card-title">Status da sua última fatura</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center"><br>
                            <span class="titleFatura"><?=$titleFatura?></span>


                        </div>
                        <div class="col-sm-12 text-center"><br>
                            <?=$btFatura?>
                        </div>
                    </div>

                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>

    <?php
        }
    ?>

<?php
                                    if($evento["id_plano"] != 2){
                                    ?>
    <div class="row" id="pagamento">
        <div class="col-xl-12">
            <div class="card">
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
                                            <span
                                                class="badge rounded-pill bg-info float-end checkPayment cardCreditIcon">
                                                <p class=" mdi mdi-check-bold"></p>
                                            </span>
                                            <img class="cardCredit" src="<?=base_url("assets/images/cartao.png")?>">
                                        </div>
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button class="buttonPayment" data-payment="boleto">
                                        <div class="boxSelectPagamento text-center optionBoleto">
                                            <span
                                                class="badge rounded-pill bg-info float-end checkPayment boletoIcon d-none">
                                                <p class=" mdi mdi-check-bold"></p>
                                            </span>
                                            <img src="<?=base_url("assets/images/boleto.png")?>">
                                        </div>
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button class="buttonPayment" data-payment="pix">
                                        <div class="boxSelectPagamento text-center optionPix">
                                            <span
                                                class="badge rounded-pill bg-info float-end checkPayment pixIcon d-none">
                                                <p class=" mdi mdi-check-bold"></p>
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
                                    <input type="hidden" name="id_plano" class="id_plano" value="">
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
                                        <input type="text" name="complemento" class="form-control"
                                            placeholder="Complemento">
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
                                            data-inputmask="'mask': '9999 9999 9999 99999'"
                                            placeholder="•••• •••• •••• ••••">
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
                                            $parcelado = $total/$i;
                                            echo "<option value='$i'>".$i."x R$".nf($parcelado)."</option>";
                                        }
                                    ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 campoForm">
                                        <div class="msgPgto"></div>
                                    </div>


                                    <div class="col-sm-12 text-left botoesAcoes">
                                        <button type="button"
                                            class="btn btn-primary waves-effect waves-light btPadrao btFormCartao"
                                            style="width:100%;"><i class="ion-ios-lock"></i> Finalizar
                                            Pagamento</button>

                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-6 dataBoleto" style="display:none">
                                <form action="<?=base_url("Pagamentos/iniPagamento")?>" class="row ajax">
                                    <input type="hidden" name="formaPagamento" value="bank_slip">
                                    <input type="hidden" name="id_evento" value="<?=$evento["id_evento"]?>">
                                    <input type="hidden" name="id_plano" class="id_plano" value="">
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
                                        <input type="text" name="complemento" class="form-control"
                                            placeholder="Complemento">
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

                                    <div class="col-sm-12 text-left botoesAcoes">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btPadrao"
                                            style="width:100%;"><i class="ion-ios-lock"></i> Finalizar
                                            Pagamento</button>

                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-6 dataPix" style="display:none">
                                <form action="<?=base_url("Pagamentos/iniPagamento")?>" class="row ajax">
                                    <input type="hidden" name="formaPagamento" value="pix">
                                    <input type="hidden" name="id_evento" value="<?=$evento["id_evento"]?>">
                                    <input type="hidden" name="id_plano" class="id_plano" value="">
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
                                        <input type="text" name="complemento" class="form-control"
                                            placeholder="Complemento">
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

                                    <div class="col-sm-12 text-left botoesAcoes">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btPadrao"
                                            style="width:100%;"><i class="ion-ios-lock"></i> Finalizar
                                            Pagamento</button>


                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-6 dataCreditCard">
                                <div class="detalhesCompra row">
                                    <span class="boxDescriptionPayment row">
                                        <!-- <span class="descriptionPlanPayment col-8">Plano iniciante save the date</span>
                                        <span class="pricePlanPayment col-4">R$12,00</span>
                                        <span class="descriptionPlanPayment col-8">Cupom PRIMEIRACOMPRA</span>
                                        <span class="pricePlanPayment col-4">R$3,00-</span> -->
                                    </span>
                                    <hr>
                                    <span class="boxTotalPayment row">
                                        <span class="totalPlanPayment col-6">Total</span>
                                        <span class="totalPlanPayment col-6 totalFinal"
                                            style="text-align:right;">R$0,00</span>
                                    </span>
                                    <div class="col-sm-12 couponBox">
                                        <button type="button" class="btCupom">Possui um CUPOM de desconto?</button>
                                        <div class="box-discount-coupon d-none">
                                            <input type="text" name="dicount-coupon" class="form-control"
                                                placeholder="Código do cupom de desconto">
                                            <button type="button" class="bt-submit-discount-coupon">
                                                <p class="mdi mdi-chevron-right"></p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <?php
                                   }
                                    ?>