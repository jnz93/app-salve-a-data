var IDSITE = IDSITE||0;

var exibMenu = exibMenu||true;
var tempoPause = tempoPause||6000;

function mascaraMutuario(o, f) {
    v_obj = o
    v_fun = f
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}


function MascaraMoeda(objTextBox, e) {
    var SeparadorMilesimo = '';
    var SeparadorDecimal = ',';
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13)
        return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1)
        return false; // Chave inválida
    len = objTextBox.value.length;
    for (i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal))
            break;
    aux = '';
    for (; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i)) != -1)
            aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0)
        objTextBox.value = '';
    if (len == 1)
        objTextBox.value = '0' + SeparadorDecimal + '0' + aux;
    if (len == 2)
        objTextBox.value = '0' + SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
            objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}




//usar mascara de moeda "onKeyPress="return(MascaraMoeda(this,'',',',event))"


function cpfCnpj(v) {

    //Remove tudo o que não é dígito
    v = v.replace(/\D/g, "")

    if (v.length <= 14) { //CPF

        //Coloca um ponto entre o terceiro e o quarto dígitos
        v = v.replace(/(\d{3})(\d)/, "$1.$2")

        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v = v.replace(/(\d{3})(\d)/, "$1.$2")

        //Coloca um hífen entre o terceiro e o quarto dígitos
        v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2")

    } else { //CNPJ

        //Coloca ponto entre o segundo e o terceiro dígitos
        v = v.replace(/^(\d{2})(\d)/, "$1.$2")

        //Coloca ponto entre o quinto e o sexto dígitos
        v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")

        //Coloca uma barra entre o oitavo e o nono dígitos
        v = v.replace(/\.(\d{3})(\d)/, ".$1/$2")

        //Coloca um hífen depois do bloco de quatro dígitos
        v = v.replace(/(\d{4})(\d)/, "$1-$2")

    }

    return v

}





// This function loads the data from Vimeo


function hashLoad(){
	var HH = window.location.hash;
	if(HH!=''){
		HH = HH.substr(1);
		if(HH=='close'){
			closePop('#popbox');
			$('#popbox').html('');
		}else{
			var arg = new ArrayArg(HH);
			if(arg.to){
				scrollToPos('#'+arg.to);
			}

		}
	}
}

function getNotificacao(){

	//submitdado({}, PATHRAIZ+'Ajax/verificaVagas');


}
$(function(){
	var acentos = ['[aáàãâä]', '[eéèêë]', '[iíìîï]', '[oóòõôö]', '[uúùûü]', '[yýÿ]', '[nñ]', '[cç]'];
	$('.filtro').each(function(){
		var $t = $(this);
		var $alvo = $($t.data('alvo'));
		var col = $t.data('col')
		$t.keyup(function(){			
			var pat = $t.val();
			if(pat=='')
				$alvo.find('tr').show();
			else{
				for(var x in acentos)
					pat = pat.replace(new RegExp(acentos[x], 'gi'), acentos[x]);
				$alvo.find('tr').show().each(function(){					
					var txt;
						if(col=='')txt	= $(this).text();
						else txt = $(this).find(col).text();
					if(txt==txt.replace(new RegExp(pat, 'gi'), '')){
						$(this).hide();
					}
				});
			}
		});
	});

})


$(document).ready(function(){
var height = $(window).height();
	var width = $(window).width();



	if(window.location.hash!=''){
		hashLoad();
	}
	$(window).on('hashchange', function(){
		hashLoad();
	});
	$('body').on('hidden.bs.modal', function(){//apagar hash quando fechar modal
		window.location.hash = '!';
	});

	//Configurações para telefone de 9 digitos
	var phoneBR = function(val){
		return val.replace(/\D/g, '').length===11?'(00) 00000-0000':'(00) 0000-00009';
	},
			upOptions = {
				onKeyPress: function(val, e, field, options){
					field.mask(phoneBR.apply({}, arguments), options);
				}
			};
	$('.mask').each(function(){
		var $t = $(this);
		if($t.attr('data-mask')=='phoneBR'){
			$t.mask(phoneBR, upOptions);
		}else{
			var opt = {};
			if(existe($t.attr('data-mask-placeholder')))
				opt.placeholder = $t.attr('data-mask-placeholder');
			if(existe($t.attr('data-mask-selectonfocus')))
				opt.selectOnFocus = ($t.attr('data-mask-selectonfocus')=='true');
			if(existe($t.attr('data-mask-clearifnotmatch')))
				opt.clearIfNotMatch = ($t.attr('data-mask-clearifnotmatch')=='true');
			if(existe($t.attr('data-mask-reverse')))
				opt.reverse = ($t.attr('data-mask-reverse')=='true');
			$t.mask($t.attr('data-mask'), opt);

		}
	});
	$('body').on('submit', 'form.ajax', function(){

		var wait = $(this).attr('data-wait');

		//var formData = new FormData($(this)[0]);
		//console.log(formData);
		//console.log($(this).serializeArray());
		this.tempo = new Date().getTime();
		var act = ouPadrao($(this).attr('data-ac'), $(this).attr('action'));
		var dados = $(this).serializeArray();



		submitdado(dados, act, function(){}, wait, this);
		return false;
	});
	$('body').on('click', 'a.ajax', function(){

		var wait = existe($(this).attr('data-wait'));
		this.tempo = new Date().getTime();
		var href = ouPadrao($(this).attr('data-ac'), $(this).attr('href'));

		var dados = {};
		var post = '';
		var contPost = '';
		var contPost = $(this).attr('data-contPost');
		var post = $(this).attr('data-post');
		if(contPost!=''){
			dados = {cat: contPost};
		}
		//dados.IDSITE = IDSITE;

		submitdado(dados, href, function(){}, wait, this);

		return false;
	});

	$("body").on('mouseenter', '.vtip',
			function(){

				vtip($(this));
			}
	);
	$('.click').click(function(){
		window.location = $(this).attr('data-href');
	});



	$('select.autosend').each(function(){
		var $t = $(this);
		var ini = {v: $.trim($t.val())};
		$t.change(function(){
			autosend($t, ini);
		});
	});
	$('.switch .autosend').change(function(){
		var $input = $(this);
		var val = $input.is(':checked')?$input.val():'';
		submitdado({'campo': $input.attr('name'), 'valor': val}, $input.attr('data-ac'));
	});
	function autosend($t, ini){
		var val = $t.val();
		if(val!=ini.v){
			if(existe($t.attr('data-validate'))){
				submitdado({'campo': ouPadrao($t.attr('data-campo'), $t.attr('name')), 'valor': val}, $t.attr('data-validate'), function(param){
					if(typeof param==='undefined'||param){
						val = $t.val();
						submitdado({'campo': ouPadrao($t.attr('data-campo'), $t.attr('name')), 'valor': val}, $t.attr('data-ac'), function(param2){
							if(typeof param2==='undefined'||param2)
								ini.v = val;
						});
					}
				});
			}else{
				submitdado({'campo': ouPadrao($t.attr('data-campo'), $t.attr('name')), 'valor': val}, $t.attr('data-ac'), function(param){
					if(typeof param==='undefined'||param)
						ini.v = val;
				});
			}
		}
	}







	$('body').on('keyup', 'textarea.autosize', function(){
		var nh = $(this)[0].scrollHeight;
		var h = $(this).outerHeight();
		var mh = $(this).css('max-height');
		//console.log(h+' '+nh+' '+mh);
		if(nh>mh)
			nh = mh;
		if(h<nh){
			$(this).outerHeight(nh+2);
		}
	});




});
