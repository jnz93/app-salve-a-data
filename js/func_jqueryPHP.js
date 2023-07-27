var nivelback = 0;


var PATHRAIZ = PATHRAIZ || '';









/*! jquery.cookie v1.4.0 | MIT */

//cookies removecookies

!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){function b(a){return h.raw?a:encodeURIComponent(a)}function c(a){return h.raw?a:decodeURIComponent(a)}function d(a){return b(h.json?JSON.stringify(a):String(a))}function e(a){0===a.indexOf('"')&&(a=a.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{a=decodeURIComponent(a.replace(g," "))}catch(b){return}try{return h.json?JSON.parse(a):a}catch(b){}}function f(b,c){var d=h.raw?b:e(b);return a.isFunction(c)?c(d):d}var g=/\+/g,h=a.cookie=function(e,g,i){if(void 0!==g&&!a.isFunction(g)){if(i=a.extend({},h.defaults,i),"number"==typeof i.expires){var j=i.expires,k=i.expires=new Date;k.setDate(k.getDate()+j)}return document.cookie=[b(e),"=",d(g),i.expires?"; expires="+i.expires.toUTCString():"",i.path?"; path="+i.path:"",i.domain?"; domain="+i.domain:"",i.secure?"; secure":""].join("")}for(var l=e?void 0:{},m=document.cookie?document.cookie.split("; "):[],n=0,o=m.length;o>n;n++){var p=m[n].split("="),q=c(p.shift()),r=p.join("=");if(e&&e===q){l=f(r,g);break}e||void 0===(r=f(r))||(l[q]=r)}return l};h.defaults={},a.removeCookie=function(b,c){return void 0!==a.cookie(b)?(a.cookie(b,"",a.extend({},c,{expires:-1})),!0):!1}});





// jQuery Mask Plugin v1.14.3

// github.com/igorescobar/jQuery-Mask-Plugin

var $jscomp={scope:{},findInternal:function(a,k,c){a instanceof String&&(a=String(a));for(var n=a.length,f=0;f<n;f++){var b=a[f];if(k.call(c,b,f,a))return{i:f,v:b}}return{i:-1,v:void 0}}};$jscomp.defineProperty="function"==typeof Object.defineProperties?Object.defineProperty:function(a,k,c){if(c.get||c.set)throw new TypeError("ES3 does not support getters and setters.");a!=Array.prototype&&a!=Object.prototype&&(a[k]=c.value)};

$jscomp.getGlobal=function(a){return"undefined"!=typeof window&&window===a?a:"undefined"!=typeof global&&null!=global?global:a};$jscomp.global=$jscomp.getGlobal(this);$jscomp.polyfill=function(a,k,c,n){if(k){c=$jscomp.global;a=a.split(".");for(n=0;n<a.length-1;n++){var f=a[n];f in c||(c[f]={});c=c[f]}a=a[a.length-1];n=c[a];k=k(n);k!=n&&null!=k&&$jscomp.defineProperty(c,a,{configurable:!0,writable:!0,value:k})}};

$jscomp.polyfill("Array.prototype.find",function(a){return a?a:function(a,c){return $jscomp.findInternal(this,a,c).v}},"es6-impl","es3");

(function(a,k,c){"function"===typeof define&&define.amd?define(["jquery"],a):"object"===typeof exports?module.exports=a(require("jquery")):a(k||c)})(function(a){var k=function(b,h,e){var d={invalid:[],getCaret:function(){try{var a,p=0,h=b.get(0),e=document.selection,g=h.selectionStart;if(e&&-1===navigator.appVersion.indexOf("MSIE 10"))a=e.createRange(),a.moveStart("character",-d.val().length),p=a.text.length;else if(g||"0"===g)p=g;return p}catch(A){}},setCaret:function(a){try{if(b.is(":focus")){var d,

l=b.get(0);a+=1;l.setSelectionRange?l.setSelectionRange(a,a):(d=l.createTextRange(),d.collapse(!0),d.moveEnd("character",a),d.moveStart("character",a),d.select())}}catch(z){}},events:function(){b.on("keydown.mask",function(a){b.data("mask-keycode",a.keyCode||a.which)}).on(a.jMaskGlobals.useInput?"input.mask":"keyup.mask",d.behaviour).on("paste.mask drop.mask",function(){setTimeout(function(){b.keydown().keyup()},100)}).on("change.mask",function(){b.data("changed",!0)}).on("blur.mask",function(){c===

d.val()||b.data("changed")||b.trigger("change");b.data("changed",!1)}).on("blur.mask",function(){c=d.val()}).on("focus.mask",function(b){!0===e.selectOnFocus&&a(b.target).select()}).on("focusout.mask",function(){e.clearIfNotMatch&&!k.test(d.val())&&d.val("")})},getRegexMask:function(){for(var a=[],b,d,e,g,c=0;c<h.length;c++)(b=m.translation[h.charAt(c)])?(d=b.pattern.toString().replace(/.{1}$|^.{1}/g,""),e=b.optional,(b=b.recursive)?(a.push(h.charAt(c)),g={digit:h.charAt(c),pattern:d}):a.push(e||

b?d+"?":d)):a.push(h.charAt(c).replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&"));a=a.join("");g&&(a=a.replace(new RegExp("("+g.digit+"(.*"+g.digit+")?)"),"($1)?").replace(new RegExp(g.digit,"g"),g.pattern));return new RegExp(a)},destroyEvents:function(){b.off("input keydown keyup paste drop blur focusout ".split(" ").join(".mask "))},val:function(a){var d=b.is("input")?"val":"text";if(0<arguments.length){if(b[d]()!==a)b[d](a);d=b}else d=b[d]();return d},getMCharsBeforeCount:function(a,b){for(var d=0,e=0,

g=h.length;e<g&&e<a;e++)m.translation[h.charAt(e)]||(a=b?a+1:a,d++);return d},caretPos:function(a,b,e,c){return m.translation[h.charAt(Math.min(a-1,h.length-1))]?Math.min(a+e-b-c,e):d.caretPos(a+1,b,e,c)},behaviour:function(e){e=e||window.event;d.invalid=[];var h=b.data("mask-keycode");if(-1===a.inArray(h,m.byPassKeys)){var c=d.getCaret(),l=d.val(),g=l.length,k=d.getMasked(),f=k.length,n=d.getMCharsBeforeCount(f-1)-d.getMCharsBeforeCount(g-1),l=c<g&&k!==l;d.val(k);l&&(8!==h&&46!==h?c=d.caretPos(c,

g,f,n):--c,d.setCaret(c));return d.callbacks(e)}},getMasked:function(a,b){var c=[],l=void 0===b?d.val():b+"",g=0,k=h.length,f=0,n=l.length,p=1,v="push",w=-1,r,u;e.reverse?(v="unshift",p=-1,r=0,g=k-1,f=n-1,u=function(){return-1<g&&-1<f}):(r=k-1,u=function(){return g<k&&f<n});for(var y;u();){var x=h.charAt(g),t=l.charAt(f),q=m.translation[x];if(q)t.match(q.pattern)?(c[v](t),q.recursive&&(-1===w?w=g:g===r&&(g=w-p),r===w&&(g-=p)),g+=p):t===y?y=void 0:q.optional?(g+=p,f-=p):q.fallback?(c[v](q.fallback),

g+=p,f-=p):d.invalid.push({p:f,v:t,e:q.pattern}),f+=p;else{if(!a)c[v](x);t===x?f+=p:y=x;g+=p}}l=h.charAt(r);k!==n+1||m.translation[l]||c.push(l);return c.join("")},callbacks:function(a){var l=d.val(),k=l!==c,f=[l,a,b,e],g=function(a,b,d){"function"===typeof e[a]&&b&&e[a].apply(this,d)};g("onChange",!0===k,f);g("onKeyPress",!0===k,f);g("onComplete",l.length===h.length,f);g("onInvalid",0<d.invalid.length,[l,a,b,d.invalid,e])}};b=a(b);var m=this,c=d.val(),k;h="function"===typeof h?h(d.val(),void 0,b,

e):h;m.mask=h;m.options=e;m.remove=function(){var a=d.getCaret();d.destroyEvents();d.val(m.getCleanVal());d.setCaret(a-d.getMCharsBeforeCount(a));return b};m.getCleanVal=function(){return d.getMasked(!0)};m.getMaskedVal=function(a){return d.getMasked(!1,a)};m.init=function(c){c=c||!1;e=e||{};m.clearIfNotMatch=a.jMaskGlobals.clearIfNotMatch;m.byPassKeys=a.jMaskGlobals.byPassKeys;m.translation=a.extend({},a.jMaskGlobals.translation,e.translation);m=a.extend(!0,{},m,e);k=d.getRegexMask();if(c)d.events(),

d.val(d.getMasked());else{e.placeholder&&b.attr("placeholder",e.placeholder);b.data("mask")&&b.attr("autocomplete","off");c=0;for(var f=!0;c<h.length;c++){var l=m.translation[h.charAt(c)];if(l&&l.recursive){f=!1;break}}f&&b.attr("maxlength",h.length);d.destroyEvents();d.events();c=d.getCaret();d.val(d.getMasked());d.setCaret(c+d.getMCharsBeforeCount(c,!0))}};m.init(!b.is("input"))};a.maskWatchers={};var c=function(){var b=a(this),c={},e=b.attr("data-mask");b.attr("data-mask-reverse")&&(c.reverse=

!0);b.attr("data-mask-clearifnotmatch")&&(c.clearIfNotMatch=!0);"true"===b.attr("data-mask-selectonfocus")&&(c.selectOnFocus=!0);if(n(b,e,c))return b.data("mask",new k(this,e,c))},n=function(b,c,e){e=e||{};var d=a(b).data("mask"),h=JSON.stringify;b=a(b).val()||a(b).text();try{return"function"===typeof c&&(c=c(b)),"object"!==typeof d||h(d.options)!==h(e)||d.mask!==c}catch(u){}};a.fn.mask=function(b,c){c=c||{};var e=this.selector,d=a.jMaskGlobals,f=d.watchInterval,d=c.watchInputs||d.watchInputs,h=function(){if(n(this,

b,c))return a(this).data("mask",new k(this,b,c))};a(this).each(h);e&&""!==e&&d&&(clearInterval(a.maskWatchers[e]),a.maskWatchers[e]=setInterval(function(){a(document).find(e).each(h)},f));return this};a.fn.masked=function(a){return this.data("mask").getMaskedVal(a)};a.fn.unmask=function(){clearInterval(a.maskWatchers[this.selector]);delete a.maskWatchers[this.selector];return this.each(function(){var b=a(this).data("mask");b&&b.remove().removeData("mask")})};a.fn.cleanVal=function(){return this.data("mask").getCleanVal()};

a.applyDataMask=function(b){b=b||a.jMaskGlobals.maskElements;(b instanceof a?b:a(b)).filter(a.jMaskGlobals.dataMaskAttr).each(c)};var f={maskElements:"input,td,span,div",dataMaskAttr:"*[data-mask]",dataMask:!0,watchInterval:300,watchInputs:!0,useInput:function(a){var b=document.createElement("div"),c;a="on"+a;c=a in b;c||(b.setAttribute(a,"return;"),c="function"===typeof b[a]);return c}("input"),watchDataMask:!1,byPassKeys:[9,16,17,18,36,37,38,39,40,91],translation:{0:{pattern:/\d/},9:{pattern:/\d/,

optional:!0},"#":{pattern:/\d/,recursive:!0},A:{pattern:/[a-zA-Z0-9]/},S:{pattern:/[a-zA-Z]/}}};a.jMaskGlobals=a.jMaskGlobals||{};f=a.jMaskGlobals=a.extend(!0,{},f,a.jMaskGlobals);f.dataMask&&a.applyDataMask();setInterval(function(){a.jMaskGlobals.watchDataMask&&a.applyDataMask()},f.watchInterval)},window.jQuery,window.Zepto);







function is_touch_device(){

	return 'ontouchstart' in window        // works on most browsers 

			||navigator.maxTouchPoints;       // works on IE10/11 and Surface

}

;



function fn(n,d){

	if(typeof d === 'undefined')d=2;

	return n.toFixed(d).replace('.', ',');

}

function gn(n){

	var v = parseFloat(n.replace('R$', '').replace('.', '').replace(',', '.'));

	if(v.toString()=="NaN")

		v = 0;

	return v;

}

function ArrayArg(str){

	var par = str.split('&');

	var v;

	for(var x in par){

		v = par[x].split('=');

		this[v[0]] = v[1];

	}

}

function existe(a){

	if(a!=undefined&& (typeof a!='undefined')&&a!='')

		return true;

	else

		return false;

}

function ouPadrao(a, padrao){

	if(a!=undefined&&a!='undefined'&&a!='')

		return a;

	else

		return padrao;

}

function trackEvent(cat, act, lab, val){

	try{

		if(val==undefined){

			gtag('event', act, {'event_category': cat,'event_label': lab});	

		}else{

			if(isNaN(val))

				val = 0;			

			gtag('event', act, {'event_category': cat,'event_label': lab,'value': val});

		}

	}catch(e){}

}

function eventFB(event){

	try{

		fbq('track', event);

	}catch(e){

	}

}

/**

 * 

 * @param {json} dados

 * @param string action

 * @param function callback

 * @param boolean wait

 * @param domObject form

 */
function submitdadoForm(dados, action, callback, wait, form){	var $block = null;	if(wait==='form')		$block = blockForm(form);	else if(wait==='all')		$block = blockForm('body');	else if(typeof wait==='string'||typeof wait==="object")		$block = blockForm(wait);		if(!existe(form))		form = document;	form.tempo = new Date().getTime();	var type = 'POST';	if(existe($(form).attr('method'))){		type = $(form).attr('method');	}	if(action.substr(0, 1)=='/')		action = action;	var callback2;	if($block!==null){		callback2 = function(par){			$block.remove();			if($.isFunction(callback))				callback(par);		}	}else{		callback2 = function(par){			if($.isFunction(callback))				callback(par);		}	}	$.ajax({		url: action,		type: type,		cache: false,		async: $(form).attr('data-async')==='false'?false:true,		dataType: 'json',		context: $(form),		processData: false,		        contentType: false,		data: dados,		success: function(data){			concluijson(data, form, callback2);		},		error: function(a, b, c){			if(a.responseText=='reload'){				location.reload();			}else{				if(existe(form.tagName)&&form.tagName.toUpperCase()=='FORM'){					if(confirm('Ocorreu um erro inesperado durante o envio de dados, deseja repetir o envio?')){						callback2();						$(form).submit();					}else{						callback2();					}				}else{					callback2();				}			}		}	});} 
function submitdado(dados, action, callback, wait, form){

	var $block = null;

	if(wait==='form')

		$block = blockForm(form);

	else if(wait==='all')

		$block = blockForm('body');

	else if(typeof wait==='string'||typeof wait==="object")

		$block = blockForm(wait);

	

	if(!existe(form))

		form = document;

	form.tempo = new Date().getTime();

	var type = 'POST';

	if(existe($(form).attr('method'))){

		type = $(form).attr('method');

	}

	if(action.substr(0, 1)=='/')

		action = action;

	var callback2;

	if($block!==null){

		callback2 = function(par){

			$block.remove();

			if($.isFunction(callback))

				callback(par);

		}

	}else{

		callback2 = function(par){

			if($.isFunction(callback))

				callback(par);

		}

	}

	$.ajax({

		url: action,

		type: type,

		cache: false,

		async: $(form).attr('data-async')==='false'?false:true,

		dataType: 'json',

		context: $(form),
		data: dados,

		success: function(data){

			concluijson(data, form, callback2);

		},

		error: function(a, b, c){

			if(a.responseText=='reload'){

				location.reload();

			}else{

				if(existe(form.tagName)&&form.tagName.toUpperCase()=='FORM'){

					if(confirm('Ocorreu um erro inesperado durante o envio de dados, deseja repetir o envio?')){

						callback2();

						$(form).submit();

					}else{

						callback2();

					}

				}else{

					callback2();

				}

			}

		}

	});

}



function submitparalelo(isto, action,callback) {

	var $f = $(isto).closest('form');

	submitdado($f.serializeArray(), action, function(){if($.isFunction(callback))callback()}, ouPadrao($(this).attr('data-wait'),false), $f);

}

function submitfile(form, wait, callback){

	var target = 'upload'+(1+$('iframe').size());

	var $iframe = $('<iframe name="'+target+'"></iframe>');

	$iframe.hide();

	form.target = target;

	$iframe.appendTo('body');

	var $block = '';

	if(wait==='form')

		$block = blockForm(form);

	else if(wait==='all')

		$block = blockForm('body');

	var callback2;

	if(wait=='form'||wait=='all'){

		callback2 = function(){

			$block.remove();

			if($.isFunction(callback))

				callback();

		}

	}else{

		callback2 = function(){

			if($.isFunction(callback))

				callback();

		}

	}



	$iframe.load(function(){

		var texto = $(this).contents().text();

		if(texto=='reload'){

			location.reload();

		}else{

			form.tempo = new Date().getTime();

			concluijson($.parseJSON(texto), form, callback2);

		}

	});

}

function Sucesso(msg,icon){

	swal(
            '',
            msg,
            icon
          )

}

function concluijson(data, form, callback){

	var tempo2 = new Date().getTime();

	var y,m,scroll = '';

	if(existe(data.cmd)){

		for(var x = 0, t = data.cmd.length; x<t; x++){

			y = data.cmd[x];

			if(y.type=='val'){

				if(y.global=='1')

					$(y.target).val(y.content);

				else

					$(form).find(y.target).val(y.content);

			}else if(y.type=='rCl'){

				if(existe(y.target)){

					$(y.target).removeClass(y.content);

				}else{

					$(form).find('.'+y.content).removeClass(y.content);

				}

			}else if(y.type=='aCl'){

				var temp = form;

				if(y.global=='1')

					temp = 'body';

				$(temp).find(y.target).addClass(y.content);

				if(y.scroll=='1'&&scroll=='')

					scroll = y.target;

			}else if(y.type=='rep'){

				$(y.target).html(y.content);

			}else if(y.type=='app'){

				$(y.target).append(y.content);

			}else if(y.type=='pre'){

				$(y.target).prepend(y.content);

			}else if(y.type=='attr'){

				$(y.target).attr(y.attr, y.value);

			}else if(y.type=='af'){

				$(y.target).after(y.content);

			}else if(y.type=='del'){

				$(y.target).remove();

			}else if(y.type=='show'){

				$(y.target).show();

			}else if(y.type=='hide'){

				$(y.target).hide();

			}else if(y.type=='ex'){

				eval(y.content);

			}else if(y.type=='scroll'){

				scroll = y.target;

			}else if(y.type=='an'){

				trackEvent(y.p1, y.p2, y.p3, parseInt(y.p4==-1?tempo2-form.tempo:y.p4));

			}

		}

	}

	if(scroll!='')

		scrollToPos(scroll);



	if(existe(data.rel)){

		setTimeout(function(){

			if(data.rel.link=='self')

				window.location.reload();

			else

				$(window.location).attr('href', data.rel.link);

		}, data.rel.time);

	}

	if(data.rsform==1){

		try{

			$(form)[0].reset();

		}catch(e){

		}

	}

	if(existe(data.sus)){

		y = data.sus;

		if(y.length>1){

			m = '<ul>';

			for(var z in y){

				m = m+'<li>'+y[z].msg+'</li>';

				if(y[z].An=='')

					y[z].An = y[z].msg;

				if(y[z].An!='nao')

					trackEvent('Retorno', 'Sucesso', y[z].An, tempo2-form.tempo);

			}

			m = m+'</ul>';

		}else{

			m = y[0].msg;

			if(y[0].An=='')

				y[0].An = y[0].msg;

			if(y[0].An!='nao')

				trackEvent('Retorno', 'Sucesso', y[0].An, tempo2-form.tempo);

		}

		if($.isFunction(Sucesso))

			Sucesso(m,y[0].icon);

	}

	if(existe(data.al)){

		for(x in data.al){

			y = data.al[x];

			if(y.length>1){

				m = '<ul>';

				for(var z in y){

					m = m+'<li>'+y[z].msg+'</li>';

					if(y[z].An=='')

						y[z].An = y[z].msg;

					if(y[z].An!='nao')

						trackEvent('Retorno', x, y[z].An, tempo2-form.tempo);

				}

				m = m+'</ul>';

			}else{

				m = y[0].msg;

				if(y[0].An=='')

					y[0].An = y[0].msg;

				if(y[0].An!='nao')

					trackEvent('Retorno', x, y[0].An, tempo2-form.tempo);

			}

			//$.msgbox(m, {type: x});

			if(x=='alert')x = 'warning';

				swal({

				//  title: 'Are you sure?',

				  text: m,

				  type: x,

				  confirmButtonText: 'Ok!'

				});

			 

			

			

			

		}

	}

	if(existe(data.cnf)){

		y = data.cnf;

	swal({
        text: y.msg,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: y.bt[0],
		cancelButtonText:y.bt[1]
      }).then((result)=> {
        if (result.value) {
		
		submitdado({confirm:1}, y.action, function(){}, true, form);          
        }
      })


	}

	if(existe(data.form)){

		y = data.form;

		$.msgbox(y.msg, y.opt);

	}



	if($.isFunction(callback)){

		callback(data.call);

	}

}

function scrollToPos(alvo){	

	if(!isNaN(alvo)||$(alvo).size()>0){

		var alvoN,

		hW = $(window).height(),

		tW = $(document).scrollTop(),

		vai = true;

		

		if(isNaN(alvo)){

			alvoN = $(alvo).offset().top;

			if(alvoN<tW+100)alvoN= alvoN-100;

			else if(alvoN>tW+hW+200)alvoN= alvoN;//muito longe

			else if(alvoN>tW+hW-200)alvoN= alvoN-hW+210;//um pouco para fora

			else vai = false;

		}else{

			alvoN = alvo;

		}

		

		if(vai)

		$('html,body').animate({

			scrollTop: (alvoN)

		}, 2000);

	}

	if(isNaN(alvo))

		return $(alvo).size();

}

function blockForm(form){

	var $f = $(form),

			p = $f.offset(),

			h = $f.height(),

			$l = $('<div class="cssload"><div></div></div>'),

			$d = $('<div />').css({'position': 'absolute','z-index':9999, 'width': $f.width()+'px', 'height': h+'px','border-radius':$f.css('border-radius'), 'background-color': 'rgba(0,0,0,0.3)', 'top': p.top, 'left': p.left, 'line-height': h+'px', 'font-size': '69px', 'vertical-align': 'middle', 'text-align': 'center'}).appendTo('body');

	$d.append($l);

	if(form==='body'){

		$l.css({'position': 'fixed', 'top': 'calc(50% - 35px)', 'left': '0'})

	}

	return $d;

}





/**

 * 

 * @param {array ['.class',$(this)]} obj

 * @param {function} fback

 */

(function( $ ){

	$.fn.mouseleavedelay = function(callin, callback, tempo, obj){

		return this.each(function(i){

			var t=this, $j=$(t),sobre=false;

			if(obj==undefined)obj = [];

			if(tempo==undefined)tempo = 200;

			var ishover = function($jj){

				var sim = false;

				if($(':hover').is($jj)){

					sim = true;

				}

				return sim;

			}

			var msOut = function(){

				setTimeout(function(){

					if(!ishover($j)){

						$j.unbind('mouseleave', msOut);

						sobre = false;

						if($.isFunction(callback)){

							$.proxy(callback, t)();

						}

					}

				}, tempo);

			};

			for(var x in obj){

				$j = $j.add($(obj[x]));

			}

			$(t).mouseenter(function(){

				if(!sobre){

					sobre = true;

					$.proxy(callin, this)();

					$j.bind('mouseleave', msOut);

				}

			});

		});

	};

})( jQuery );





function vtip($t2){

	$t2.each(function(){

		var $t = $(this);

		var t = '';

		if(existe($t.attr('data-descr')))

			t = $t.attr('data-descr');

		else if(existe($t.attr('alt')))

			t = $t.attr('alt');

		else if(existe($t.attr('title'))){

			t = $t.attr('title');

			$t.attr('data-descr',t);

			$t.attr('title','');

		}

		

		var xOffset = -15; // x distance from object

		var yOffset = 10; // y distance from object

		var pos = $t.offset();

		var limJan = $(window).width();	



		pos.h = $t.outerHeight();

		pos.w = $t.outerWidth();

		var posBx = pos.left+pos.w/2+xOffset;

		var mov = 0;

		var $c = $('<p id="vtip"><span id="vtipArrow" />' + t + '</p>');

		$c.find('#vtipArrow').css('left',(mov-xOffset)+'px');

		$c.css({'left':posBx+'px','top':(pos.top+pos.h+yOffset)+'px'}).fadeIn(100);

		if(existe(t))$('body').append( $c);

		//if(existe(t))$c.insertAfter( $t);

		if(t.length<20)$c.css({'font-size':'15px','font-weight':'bold'});

//		mouseleavedelay([$t,$c],function(){

//			$c.remove();

//		});

		$t.mouseleave(function() {

			$c.fadeOut(100).remove();

		});

		setTimeout(function(){//correção caso esteja fora da tela

			var bxTam = 200;//$c.width();		

			if(posBx<0){

				mov = posBx;

				posBx = 0;

			}else if(posBx+bxTam>limJan){

				mov = posBx+bxTam-limJan;

				posBx = limJan-bxTam;

			}

			$c.css({'left':posBx+'px'});

			$c.find('#vtipArrow').css('left',(mov-xOffset-10)+'px');

		},3);

	});

}







