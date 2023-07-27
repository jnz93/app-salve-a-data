<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Iugu_model extends CI_Model {

	//public $token_iugu = "4F91CE136C3523D96A03E7EC076D220C48285813FCD4CF420987C59BF46D4C1F"; //cake money produção;
	public $token_iugu = "51106CA1AFEF070BC25722ECBD8C7EF5D7F320D3F5AA1D133ECE36597B219C76";//cake money teste


	public function getCartoes($dados) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$url = "https://api.iugu.com/v1/customers/".$dados['interUser']."/payment_methods?api_token=" . $this->token_iugu;
		$retorno = carregar($url);
		//file_put_contents('log/getCartoes.txt', print_r([$retorno,$dados], true), FILE_APPEND);
		return $retorno;
	}

	public function getCartao($interUser) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$url = "https://api.iugu.com/v1/customers/$interUser/payment_methods?api_token=" . $this->token_iugu;
		$retorno = carregar($url);

		return $retorno;
	}

	public function getPaymentMethods($dados) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$url = "https://api.iugu.com/v1/customers/$dados[interUser]/payment_methods/$dados[interPay]?api_token=" . $this->token_iugu;
		$retorno = carregar($url);

		return $retorno;
	}

	public function getInvoice($dados) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$url = "https://api.iugu.com/v1/invoices/$dados[id_fatura]?api_token=" . $this->token_iugu;
		$retorno = carregar($url);

		return $retorno;
	}

	public function cancelarFatura($dados) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$url = "https://api.iugu.com/v1/invoices/$dados[id]/cancel?api_token=" . $this->token_iugu;
		$retorno = carregar($url,null,null,"PUT");

		return $retorno;
	}

	public function reembolsarFatura($dados){
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$url = "https://api.iugu.com/v1/invoices/$dados[id]/refund?api_token=" . $this->token_iugu;
		$retorno = carregar($url,["partial_value_refund_cents"=>$dados["valor"]],null,"POST");

		return $retorno;
	}

	//Padrão de Envio
	/* 	
	  $dados = array(
	  "email" => "",
	  "desconto" => 0,
	  "diasVencimento" => 3,
	  "order_id" => "",
	  "interUser" => "",
	  "interPay" => "",
	  "parcelas" => "",
	  "accessToken" => "",
	  "line_items" => array(
		array(
			"description" => "",
			"quantity" => 0,
			"price_cents" => 0
		)
	  ),
	  "cpf_cnpj" => "",
	  "nome" => "",
	  "numero" => "",
	  "cep" => "",
	  "rua" => "",
	  "cidade" => "",
	  "bairro" => "",
	  "estado" => "",
	  "complemento" => ""
	  );
	 */
	public function cobrancaDireta($dados) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$arr = array(
			"email" => $dados['email'],
			"discount_cents" => $dados['desconto'] * 100,
			"bank_slip_extra_days" => 3,
			"ignore_due_email" => true,
			"items" => $dados['line_items'],
			"order_id"=>$dados["order_id"],
			"notification_url"=>$dados["notification_url"]
		);
		if($dados["interUser"] == ""){
			$arr["payer"] = array(
				"cpf_cnpj" => $dados["cpf_cnpj"],
				"email" => $dados['email'],
				"name" => $dados["nome"],
				"address" => array(
					"number" => $dados["numero"],
					"zip_code" => $dados["cep"],
					"street" => $dados["rua"],
					"city" => $dados["cidade"],
					"district" => $dados["bairro"],
					"state" => $dados["estado"],
					"complement" => $dados["complemento"],
				)
			);
		}else{
			$arr["customer_id"] = $dados["interUser"];
		}

		if ($dados['token'] != "") {
			$arr["token"] = $dados['token'];
			$arr["months"] = $dados['parcelas'];
		} elseif($dados["interPay"] != "") {
			$arr["customer_payment_method_id"] = $dados['interPay'];
			$arr["months"] = $dados['parcelas'];
			$arr['method'] = "credit_card";
		}else{
			$arr['method'] = "bank_slip";
		}
		file_put_contents('log/novoPagamento.txt', print_r([$arr], true) . "\r\n", FILE_APPEND);
		$return = carregar("https://api.iugu.com/v1/charge?api_token=" . $this->token_iugu, json_encode($arr));
		return $return;
	}

	//Padrão de Envio
	/* 	
	  $dados = array(
		"cpf_cnpj" => "",
		"nome" => "",
		"email" => "",
		"prefixo" => "",
		"telefone" => "",
		"numero" => "",
		"cep" => "",
		"rua" => "",
		"cidade" => "",
		"bairro" => "",
		"estado" => "",
		"pais" => "",
		"complemento" => "",
		"notification_url" => ""
	  );
	 */
	public function creatCliente($dados) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$arr = array(
			"cpf_cnpj" => $dados['cpf_cnpj'],
			"name" => $dados['nome'],
			"phone_prefix" => $dados["prefixo"],
			"phone" => $dados["telefone"],
			"email" => $dados['email'],
			"zip_code" => $dados['cep'],
			"street" => $dados['rua'],
			"number" => $dados['numero'],
			"district" => $dados['bairro'],
			"city" => $dados['cidade'],
			"state" => $dados['estado'],
			"country" => ($dados['pais'] == '' ? 'Brasil' : $dados['pais']),
			"complement" => $dados['complemento']
		);
		//file_put_contents('log/iugu/ModelCreatCliente.txt', print_r([$dados,$arr], true), FILE_APPEND);
		if(isset($dados['accessToken'])){
			$this->token_iugu = $dados['accessToken'];
		}
		$retorno = carregar("https://api.iugu.com/v1/customers?api_token=" . $this->token_iugu, $arr);
		return $retorno;
	}

	//Padrão de Envio
	/* 	
	  $dados = array(
		"interUser" => "",
		"formaPagamento" => "credit_cart", //bank_slip
		"email" => "",
		"desconto" => 0,
		"diasVencimento" => 3,
		"line_items" => array(
			array(
			  "description" => "",
			  "quantity" => 0,
			  "price_cents" => 0
			  )
		),	  
		"notification_url" => ""
	  );
	 */
	public function novaFatura($dados,$taxas) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$arr = array(
			"email" => $dados['email'],
			"due_date" => date('Y-m-d', strtotime('+' . $dados['diasVencimento'] . ' day')),
			"customer_id" => $dados['interUser'],
			"payable_with" => $dados['formaPagamento'],
			"discount_cents" => $dados['desconto'] * 100,
			"ignore_due_email" => false,
			"items" => $dados['line_items'],	
			"external_reference" => $dados['external_reference'],
			"order_id"=>$dados["order_id"],
			"notification_url" => ($dados["notification_url"] == "" ? base_url("Pagamentos/retornoPagamento") : $dados["notification_url"]),
			"splits" => array(
				array(
					"recipient_account_id"=>"A562B3FF8DC4485F95A07DBEA2A4CE2A",
					"percent"=>$taxas["credit_card_1x_percent"],
					"pix_cents"=>$taxas["pix_cents"]*100,
					"bank_slip_cents"=>$taxas["bank_slip_cents"]*100,
					"credit_card_1x_percent"=>$taxas["credit_card_1x_percent"],
					"credit_card_2x_percent"=>$taxas["credit_card_2x_percent"],
					"credit_card_3x_percent"=>$taxas["credit_card_3x_percent"],
					"credit_card_4x_percent"=>$taxas["credit_card_4x_percent"],
					"credit_card_5x_percent"=>$taxas["credit_card_5x_percent"],
					"credit_card_6x_percent"=>$taxas["credit_card_6x_percent"],
					"credit_card_7x_percent"=>$taxas["credit_card_7x_percent"],
					"credit_card_8x_percent"=>$taxas["credit_card_8x_percent"],
					"credit_card_9x_percent"=>$taxas["credit_card_9x_percent"],
					"credit_card_10x_percent"=>$taxas["credit_card_10x_percent"],
					"credit_card_11x_percent"=>$taxas["credit_card_11x_percent"],
					"credit_card_12x_percent"=>$taxas["credit_card_12x_percent"],

				)
			)
		);
		file_put_contents('log/entrouFatura.txt', print_r([$arr], true), FILE_APPEND);

		$retorno = carregar("https://api.iugu.com/v1/invoices?api_token=" . $this->token_iugu, json_encode($arr));
		file_put_contents('log/novaFatura3.txt', print_r([$retorno,$arr], true), FILE_APPEND);
		return $retorno;
	}

	public function novaFaturaApp($dados) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$arr = array(
			"email" => $dados['email'],
			"due_date" => date('Y-m-d', strtotime('+' . $dados['diasVencimento'] . ' day')),
			"customer_id" => $dados['interUser'],
			"payable_with" => $dados['formaPagamento'],
			"discount_cents" => $dados['desconto'] * 100,
			"ignore_due_email" => false,
			"items" => $dados['line_items'],	
			"external_reference" => $dados['external_reference'],
			"order_id"=>$dados["order_id"],
			"notification_url" => ($dados["notification_url"] == "" ? base_url("Pagamentos/retornoPagamento") : $dados["notification_url"]),
		);
		file_put_contents('log/entrouFatura.txt', print_r([$arr], true), FILE_APPEND);

		$retorno = carregar("https://api.iugu.com/v1/invoices?api_token=" . $this->token_iugu, json_encode($arr));
		file_put_contents('log/novaFatura3.txt', print_r([$retorno,$arr], true), FILE_APPEND);
		return $retorno;
	}

	public function newUser($dados) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$arr = array(
			"email" => $dados['email'],
			"permissions" => "owner"
		);

		$url = "https://api.iugu.com/v1/".$dados["id_gateway"]."/user_invites?api_token=" . $this->token_iugu;
		file_put_contents('log/iugunovo.txt', print_r(["url"=>$url], true), FILE_APPEND);
		$retorno = carregar($url, $arr);
		return $retorno;
	}

	//Padrão de Envio
	/* 	
	  $dados = array(
	  "descricao" => "",
	  "token" => "",
	  "default" => true,
	  "interUser" => ""
	  );
	 */
	public function novoMetodoPagamento($dados) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$arr = array(
			"description" => $dados['descricao'],
			"token" => $dados['token'],
			"set_as_default" => $dados['default'],
		);
		$url = "https://api.iugu.com/v1/customers/$dados[interUser]/payment_methods?api_token=" . $this->token_iugu;
		file_put_contents('log/iugunovo.txt', print_r(["url"=>$url], true), FILE_APPEND);
		$retorno = carregar($url, $arr);
		return $retorno;
	}

	//Padrão de Envio
	/*
	  $dados = array(
	  "interPay" => "",
	  "interUser" => "",
	  "id_fatura" => 0,
	  "parcelas" => 1,
	  "order_id" => 0
	  );
	 */
	public function pagarFatura($dados) {
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$arr = array(
			"customer_payment_method_id" => $dados['interPay'],
			"customer_id" => $dados['interUser'],
			"invoice_id" => $dados["id_fatura"],
			"months" => $dados['parcelas'],
			"order_id" => $dados['order_id']
		);

		$retorno = carregar("https://api.iugu.com/v1/charge?api_token=" . $this->token_iugu, json_encode($arr));
		file_put_contents('log/retornoIugu.txt', print_r([$retorno], true), FILE_APPEND);
		return $retorno;
	}
	
	public function consultarFatura($dados){
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$retorno = carregar("https://api.iugu.com/v1/invoices/$dados[id]?api_token=" . $this->token_iugu);
		return $retorno;
	}


	// $dadosEnv = array(
	// 	"nome" => "",
	// 	"comissao"=>array(
	// 		"valor"=>"",
	// 		"porcentagem"=>"",
	// 		"credit_card_valor"=>"",
	// 		"credit_card_porcentagem"=>"",
	// 		"boleto_valor"=>"",
	// 		"boleto_porcentagem"=>"",
	// 		"pix_valor"=>"",
	// 		"pix_porcentagem"=>""
	// 	),
	// 	"afiliados" => array(
	// 		array(
	// 			"id_gateway"=>"",
	// 			"valor"=>"",
	// 			"porcentagem"=>"",
	// 			"credit_card_valor"=>"",
	// 			"credit_card_porcentagem"=>"",
	// 			"boleto_valor"=>"",
	// 			"boleto_porcentagem"=>"",
	// 			"pix_valor"=>"",
	// 			"pix_porcentagem"=>""
	// 		)
	// 	)
	// );
	public function newSubConta($dados){
		
		$arr = array(
			"name"=>$dados["nome"],
		);
		$arr["commissions"] = array(
			//"cents" => $dados["comissao"]["valor"]*100,
			"percent" => $dados["comissao"]["porcentagem"],
			//"credit_card_cents" => $dados["comissao"]["credit_card_valor"]*100,
			"credit_card_percent" => $dados["comissao"]["credit_card_porcentagem"],
			//"bank_slip_cents" => $dados["comissao"]["boleto_valor"]*100,
			"bank_slip_percent" => $dados["comissao"]["boleto_porcentagem"],
			//"pix_cents" => $dados["comissao"]["pix_valor"]*100,
			"pix_percent" => $dados["comissao"]["pix_porcentagem"]*100
		);

		if(isset($dados["afiliados"])){
			foreach($dados["afiliados"] as $afiliado){
				$arr["splits"][] = array(
					"recipient_account_id" => $afiliado["id_gateway"],
					//"cents" => $afiliado["valor"]*100,
					"percent" => $afiliado["porcentagem"],
					//"credit_card_cents" => $afiliado["credit_card_valor"]*100,
					"credit_card_percent" => $afiliado["credit_card_porcentagem"],
					//"bank_slip_cents" => $afiliado["boleto_valor"]*100,
					"bank_slip_percent" => $afiliado["boleto_porcentagem"],
					//"pix_cents" => $afiliado["pix_valor"]*100,
					"pix_percent" => $afiliado["pix_porcentagem"],
					"permit_aggregated" => true
				);
			}
		}
		$retorno = carregar("https://api.iugu.com/v1/marketplace/create_account?api_token=" . $this->token_iugu,json_encode($arr));
		return $retorno;
	}

	// $dadosEnv = array(
	// 	"saque_auto" => "",
	// 	"multas" => "",
	// 	"juros_mora" => "",
	// 	"multa_porcentagem" => "",
	// 	"antecipacao_auto" => "",
	// 	"antecipacao_tipo" => "",
	// 	"dia_antecipacao" => "",
	// 	"desabilita_saque" => "",
	// 	"cartao" => array(
	// 		"status" => "",
	// 		"descricao_fatura" => "",
	// 		"status_parcelamento" => "",
	// 		"parcelas" => ""
	// 	),
	// 	"cartao" => array(
	// 		"status" => "",
	// 		"descricao_fatura" => "",
	// 		"status_parcelamento" => "",
	// 		"parcelas" => ""
	// 	),
	// 	"boleto" => array(
	// 		"status" => "",
	// 		"extra_due" => "",
	// 		"reprint_extra_due" => ""
	// 	),
	// 	"comissao"=>array(
	// 		"valor"=>"",
	// 		"porcentagem"=>"",
	// 		"credit_card_valor"=>"",
	// 		"credit_card_porcentagem"=>"",
	// 		"boleto_valor"=>"",
	// 		"boleto_porcentagem"=>"",
	// 		"pix_valor"=>"",
	// 		"pix_porcentagem"=>""
	// 	),
	// 	"afiliados" => array(
	// 		array(
	// 			"id_gateway"=>"",
	// 			"valor"=>"",
	// 			"porcentagem"=>"",
	// 			"credit_card_valor"=>"",
	// 			"credit_card_porcentagem"=>"",
	// 			"boleto_valor"=>"",
	// 			"boleto_porcentagem"=>"",
	// 			"pix_valor"=>"",
	// 			"pix_porcentagem"=>""
	// 		)
	// 	),
	// "accessToken" => ""
	// );
	public function configSubConta($dados){
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$arr = array();
		// $arr = array(
		// 	"auto_withdraw" => $dados["saque_auto"],
		// 	"fines" => $dados["multas"],
		// 	"per_day_interest" => $dados["juros_mora"],
		// 	"late_payment_fine" => $dados["multa_porcentagem"],
		// 	"auto_advance" => $dados["antecipacao_auto"],
		// 	"payment_email_notification" => false,
		// 	"disabled_withdraw" => $dados["desabilita_saque"],
		// 	"customer_minimum_balance_cents" => 0 //Configuração de valor para reserva de saque
		// );

		if($dados["antecipacao_auto"]){
			$arr = array(
				"auto_advance" => $dados["antecipacao_auto"],
				"auto_advance_type" => $dados["antecipacao_tipo"],
				//"auto_advance_option" => $dados["dia_antecipacao"]
			);
		}

		if(isset($dados["cartao"])){
			$arr["credit_card"]=array(
				"active" => $dados["cartao"]["status"],
				"soft_descriptor" => $dados["cartao"]["descricao_fatura"],
				"installments" => $dados["cartao"]["status_parcelamento"],
				"max_installments" => $dados["cartao"]["parcelas"]
			);
		}

		if(isset($dados["boleto"])){
			$arr["bank_slip"] = array(
				"active" => $dados["boleto"]["status"],
				"extra_due" => $dados["boleto"]["dias_vencimento"],
				"reprint_extra_due" => $dados["boleto"]["dias_vencimento_via"]
			);
		}	

		if(isset($dados["comissao"])){
			$arr["commissions"] = array(
				//"cents" => $dados["comissao"]["valor"]*100,
				"percent" => $dados["comissao"]["porcentagem"],
				//"credit_card_cents" => $dados["comissao"]["credit_card_valor"]*100,
				"credit_card_percent" => $dados["comissao"]["credit_card_porcentagem"],
				//"bank_slip_cents" => $dados["comissao"]["boleto_valor"]*100,
				"bank_slip_percent" => $dados["comissao"]["boleto_porcentagem"],
				//"pix_cents" => $dados["comissao"]["pix_valor"]*100,
				"pix_percent" => $dados["comissao"]["pix_porcentagem"]*100
			);
		}

		if(isset($dados["afiliados"])){
			foreach($dados["afiliados"] as $afiliado){
				$arr["splits"][] = array(
					"recipient_account_id" => $afiliado["id_gateway"],
					//"cents" => $afiliado["valor"]*100,
					"percent" => $afiliado["porcentagem"],
					//"credit_card_cents" => $afiliado["credit_card_valor"]*100,
					"credit_card_percent" => $afiliado["credit_card_porcentagem"],
					//"bank_slip_cents" => $afiliado["boleto_valor"]*100,
					"bank_slip_percent" => $afiliado["boleto_porcentagem"],
					//"pix_cents" => $afiliado["pix_valor"]*100,
					"pix_percent" => $afiliado["pix_porcentagem"],
					"permit_aggregated" => true
				);
			}
		}
		
		file_put_contents('log/dadosIugu.txt', print_r([$arr], true) . "\r\n", FILE_APPEND);
		$retorno = carregar("https://api.iugu.com/v1/accounts/configuration?api_token=" . $this->token_iugu,json_encode($arr));
		file_put_contents('log/dadosIugu.txt', print_r([$retorno], true) . "\r\n", FILE_APPEND);
		return $retorno;
	}

	// $dadosEnv = array(
	// 	"accessToken" => "",
	//  "id_conta" => "",
	// 	"valor_maximo" => "",
	// 	"produtos_fisicos" => "",
	// 	"descricao_negocio" => "",
	// 	"fisica_juridica" => "", //fisica ou juridica
	// 	"saque_automatico" => "", //true or false
	// 	"rua" => "",
	// 	"cep" => "",
	// 	"cidade" => "",
	// 	"bairro" => "",
	// 	"estado" => "",
	// 	"telefone" => "",
	// 	"banco" => "",
	// 	"agencia" => "",
	// 	"conta_tipo" => "",
	// 	"conta_numero" => "",
	// 	"cpf_cnpj" => "",
	// 	"nome" => "",
	// 	"nome_responsavel" => "",
	// 	"valor_maximo" => "",
	// 	"cpf_responsavel" => ""
	// );

	public function ativarSubConta($dados){
		
		$personType = array(
			"fisica" => "Pessoa Física",
			"juridica" => "Pessoa Jurídica"
		);
		$conta = array(
			"poupanca" => "Poupança",
			"corrente" => "Corrente"
		);
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$arr["data"] = array(
			"price_range" => $dados['valor_maximo'],
			"physical_products" => $dados['produtos_fisicos'],
			"business_type" => $dados["descricao_negocio"],
			"person_type" => $personType[$dados['fisica_juridica']],
			"automatic_transfer" => $dados['saque_automatico'],
			"address" => $dados['rua'],
			"cep" => $dados["cep"],
			"city" => $dados["cidade"],
			"district" => $dados["bairro"],
			"state" => $dados["estado"],
			"telephone" => $dados["telefone"],
			"bank" => $dados["banco"],
			"bank_ag" => $dados["agencia"],
			"account_type" => $conta[$dados["conta_tipo"]],
			"bank_cc" => $dados["conta_numero"],
			"active"=>true,
			"soft_descriptor"=>"Salve a Data",
			"installments"=>true,
			"max_installments"=>12
		);

		if($dados["fisica_juridica"] == "juridica"){
			$arr["data"]["cnpj"] = $dados["cpf_cnpj"];
			$arr["data"]["company_name"] = $dados["nome"];
			$arr["data"]["resp_name"] = $dados["nome_responsavel"];
			$arr["data"]["resp_cpf"] = $dados["cpf_responsavel"];
		}else{
			$arr["data"]["cpf"] = $dados["cpf_cnpj"];
			$arr["data"]["name"] = $dados["nome"];
		}

		

		$retorno = carregar("https://api.iugu.com/v1/accounts/".$dados['id_conta']."/request_verification?api_token=" . $this->token_iugu, json_encode($arr));
		return $retorno;
	}

	// $dados = array(
	//	"agency"=> "0001",
	//  "account"=> "18931744-2",
	//  "account_type"=> "cc",
	//  "bank"=> "077"
	// )

	public function bank_verification($dados){
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}

		$arr = array(
			"agency"=> $dados["agency"],
			"account"=> $dados["account"],
			"bank"=> $dados["bank"],
			"account_type"=> $dados["account_type"]
		);

		$retorno = carregar("https://api.iugu.com/v1/bank_verification?api_token=" . $this->token_iugu, json_encode($arr));
		return $retorno;
	}

	public function listarRecebiveis(){
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$retorno = carregar("https://api.iugu.com/v1/financial_transaction_requests?api_token=" . $this->token_iugu);
		return $retorno;
	}

	public function updateSubConta($dados){
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		$arr = array(
			"name"=>$dados["nome"]
		);
		$retorno = carregar("https://api.iugu.com/v1/accounts/".$dados['id']."?api_token=" . $this->token_iugu, json_encode($arr),null,"PUT");
		
		return $retorno;
	}

	public function addCredito($dadosLogin, $rowPlano, $vencimento, $trial = false) {
		$idCursos = explode("|", $rowPlano['cursos']);
		$retorno = array();
		foreach ($idCursos as $idCurso) {
			$vencimento_cursos = $this->db->get_where("vencimento_cursos", ["user" => $dadosLogin['aluno_id'], "id_curso" => $idCurso])->row_array();
			if (!$vencimento_cursos) {
				if ($this->db->insert("vencimento_cursos", ["user" => $dadosLogin['aluno_id'], "id_curso" => $idCurso, "credVencimento" => $vencimento])) {
					$retorno = ["sucesso" => true, "acao" => "novovencimento", "validade" => $vencimento, "trial" => $trial];
				}
			} elseif ($vencimento_cursos && !$trial) {
				$this->db->update("vencimento_cursos", ["credVencimento" => $vencimento], ["user" => $dadosLogin['aluno_id'], "id_curso" => $idCurso]);
				$retorno = ["sucesso" => true, "acao" => "updatevencimento", "validade" => $vencimento, "trial" => $trial];
			}
		}

		return $retorno;
	}

	public function getDadosConta($dados){
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
	
		$retorno = carregar("https://api.iugu.com/v1/accounts/".$dados['id']."?api_token=" . $this->token_iugu);
		
		return $retorno;
	}

	public function getExtrato($dados,$start=0,$limit=30){
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
	
		$retorno = carregar("https://api.iugu.com/v1/accounts/financial?"."start=".$start."&limit=".$limit."&api_token=" . $this->token_iugu);
		
		return $retorno;	
	}

	public function novoSaque($dados){
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		
		$post = array(
			"amount"=>$dados["valor"]
		);

		$retorno = carregar("https://api.iugu.com/v1/accounts/".$dados["id_conta"]."/request_withdraw?api_token=" . $this->token_iugu,json_encode($post));
		
		return $retorno;
	}

	public function getSaques($dados,$status="",$from="",$to="",$start=0,$limit=30){
		if(isset($dados["accessToken"])){
			$this->token_iugu = $dados["accessToken"];
		}
		if($status != ""){
			$strStatus = "&status=".$status;
		}
		if($from == ""){
			$from = date("c",strtotime("-2 days"));
		}
		if($to == ""){
			$to = date("c");
		}

		$retorno = carregar("https://api.iugu.com/v1/withdraw_conciliations?start=".$start."&limit=".$limit."&api_token=" . $this->token_iugu."&from=".$from."&to=".$to.$strStatus);
		
		return $retorno;
	}

}