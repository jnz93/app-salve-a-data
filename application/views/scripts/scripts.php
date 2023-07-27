<script>
$(document).ready(function() {
    $(".input-mask").inputmask();
    $(".abreMensagem").click(function() {
        $("#mensagemModal").modal("show");
    });



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
    Iugu.setAccountID("<?=$evento['id_iugu']?>");
    $('.btFormCartao').click(function(evt) {
        $(".msgPgto").html("");
        $("#enviaForm").prop("disabled", true);
        addLoader("#enviaForm");
        $("#enviaForm").css('opacity', '0.7');
        var form = $(this);
        var tipo = 'cartao_credito';
        Iugu.setTestMode(true);
        <?php
            // if($evento["testMode"]){
            //     echo "Iugu.setTestMode(true);";
            // }
        ?>

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
                        observacao: $('[name="observacao"]').val(),
                        tokenCart: "<?=$tokencart?>",
                        formaPagamento: "card_credit",
                        token: data.id,
                        tipo: tipo,
                        plano: plano
                    },
                    '<?=base_url("Checkout/payment".(isset($_GET["DEV"]) ? '?debug=true' : ''))?>',
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
        number = number.replace("_","");
        console.log(number);
        var primeiroNome = nomeCompleto[0];
        var cc = Iugu.CreditCard(number, expiration[0], expiration[1], primeiroNome, sobrenome, cvv);
        Iugu.createPaymentToken(cc, tokenResponseHandler);
        return false;
    });


});
</script>

<script>
    $(document).ready(function() {
        
        $("[name='cep']").keyup(function() {
            var cep = $(this).val();

            submitdado({
                cep: cep
            }, "<?=base_url("Ajax/populaEnderecoCepCheckout")?>");
        });
    });
</script>
<script src="<?=base_url("assets/libs/tinymce/tinymce.min.js")?>"></script>
