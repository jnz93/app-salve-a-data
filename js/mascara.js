


(function(){
	if(shop==window.Shopify.Checkout.apiHost){
  var script = document.createElement('script');
  script.setAttribute('src', 'https://unpkg.com/imask');
  document.body.appendChild(script);
  var style = document.createElement('style');
  style.textContent = '.hideM {display: none;}';
  document.body.appendChild(style);
  var listaOK = new Array();
  function initMask(inId,mascara) {
	  var input = document.getElementById(inId)
    if (!input || typeof IMask === 'undefined') {
		listaOK[inId] = true;
      return setTimeout(function(){initMask(inId,mascara)}, 1000);
    }
	listaOK[inId] = false;

    input.removeAttribute('data-phone-formatter');
    var parentNode = input.parentNode;
    var btnShipping = document.querySelector('button[data-trekkie-id="continue_to_shipping_method_button"]')
					|| document.querySelector('button[data-trekkie-id="continue_to_payment_method_button"]')
					|| document.querySelector('button[data-trekkie-id="complete_order_button"]');
	
	
    var label = document.createElement('label');
    label.classList.add('hideM');
    label.innerHTML = '<span style"color:#F00">Valor inválido, preencha no formato '+mascara+"</span>";
    parentNode.appendChild(label);

    function validate(value){
		if(input.disabled){
			listaOK[inId] = true;
		}else if (new RegExp('[\\(\\)0-9\\s.-]{'+mascara.length+'}').test(value)) {
        listaOK[inId] = true;
        label.classList.add('hideM');
      } else {
		listaOK[inId] = false;
        label.classList.remove('hideM');
      }
	  var ok = true;
	  for(var x in listaOK)if(listaOK[x]==false)ok = false;
	  if(ok)btnShipping.removeAttribute('disabled');
	  else btnShipping.setAttribute('disabled', 'disabled');
	  console.log(ok);
	console.log(listaOK);
      return true;
    }

    input.addEventListener('keyup', function(evt){
      if (evt.keyCode === 8 || evt.keyCode === 46) {
        validate(masked.value);
      }
    })

    var masked = new IMask(input, {
      mask: mascara,
      validate: validate
    });
  }

  if(enPhone)initMask('checkout_shipping_address_phone','(00) 00000-0000');
  if(enCPF)initMask('checkout_shipping_address_company','000.000.000-00');
  if(enPhone)initMask('checkout_billing_address_phone','(00) 00000-0000');
  
  
	}else{
		console.log(window.Shopify.Checkout.apiHost+'!='+shop);
	}
})()