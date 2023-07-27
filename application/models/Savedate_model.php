<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Savedate_model extends MY_model {

    public function __construct() {
       
    }

    public function getEvento($savedate){
        $this->db->select("*");
        $this->db->from("savedate");
        $this->db->join("evento","evento.savedate=savedate.savedate");
        $this->db->where("savedate.savedate",$savedate);
        $retorno = $this->db->get()->row_array();

        return $retorno;
    }

    public function albumMidias($id_evento){
        $this->db->order_by("posicao","ASC");
        $albunsBd = $this->db->get_where("albuns",["id_evento"=>$id_evento])->result_array();
        $midiasBd = $this->db->get_where("midias",["id_evento"=>$id_evento])->result_array();
        $albuns = array();
        foreach($albunsBd as $album){

            $albuns[$album["posicao"]] = $album;
            if($album["titulo"] == ""){
                $albuns[$album["posicao"]]["titulo"] = "Álbum ".$album["posicao"];
            }
            $albuns[$album["posicao"]]["midias"] = $album["midias"]." Mídias";
            if($album["midias"] == 1){
                $albuns[$album["posicao"]]["midias"] = $album["midias"]." Mídia";
            }
            $midias[$album["id_album"]][$album["posicao"]] = array();
        }
        
        foreach($midiasBd as $i=>$midia){
            $midias[$midia["id_album"]][$i] = $midia;
        }
        $retorno = array("midias"=>$midias,"albuns"=>$albuns);

        return $retorno;

    }

	public function interUser($dadosCliente, $evento){
		$this->load->model("Iugu_model", "Iugu");
		
		$retorno = array();
		if($evento["interUser"] == ""){
			$cliente = $this->Iugu->creatCliente($dadosCliente);
			//print_r([$dadosCliente,$cliente]);
			file_put_contents('log/novocliente.txt', print_r([$cliente,$dadosCliente], true) );
			$insertCliente = array(
				"documento" => $dadosCliente["cpf_cnpj"],
				"nome" => $dadosCliente["nome"],
				"email" => $dadosCliente["email"],
				"telefone" => $dadosCliente["prefixo"].$dadosCliente["telefone"],
				"numero" => $dadosCliente["numero"],
				"cep" => $dadosCliente["cep"],
				"rua" => $dadosCliente["rua"],
				"cidade" => $dadosCliente["cidade"],
				"bairro" => $dadosCliente["bairro"],
				"estado" => $dadosCliente["estado"],
				"gateway" => "iugu",
				"interUser" => $cliente["id"],
				
			);
			$this->db->update("evento", $insertCliente,["id_evento"=>$evento["id_evento"]]);
		}else{
			$cliente["id"] = $evento["interUser"];
		}
	
			
			$retorno = array(
				"interUser" => $cliente["id"]
			);
        

            
		//file_put_contents('log/iugu/clienteExiste.txt', print_r([$clienteExiste], true) . "\r\n", FILE_APPEND);

		return $retorno;
	}

    public function newCliente($dadosCliente, $id_evento){
		$this->load->model("Iugu_model", "Iugu");
		$clienteExiste = $this->db->get_where("clientes", ["email" => $dadosCliente["email"], "cpf_cnpj" => $dadosCliente["cpf_cnpj"], "id_evento" => $id_evento])->row_array();
		$retorno = array();
		if ($clienteExiste) {
			$retorno = array(
				"id_cliente" => $clienteExiste["id_cliente"],
				"interUser" => $clienteExiste["interUser"]
			);
		} else {
			$cliente = $this->Iugu->creatCliente($dadosCliente);
			//print_r([$dadosCliente,$cliente]);
			//file_put_contents('log/iugu/novocliente.txt', print_r([$cliente,$dadosCliente], true) . "\r\n", FILE_APPEND);
			$insertCliente = array(
				"cpf_cnpj" => $dadosCliente["cpf_cnpj"],
				"name" => $dadosCliente["nome"],
				"email" => $dadosCliente["email"],
				"phone_prefix" => $dadosCliente["prefixo"],
				"phone" => $dadosCliente["telefone"],
				"number" => $dadosCliente["numero"],
				"zip_code" => $dadosCliente["cep"],
				"street" => $dadosCliente["rua"],
				"city" => $dadosCliente["cidade"],
				"district" => $dadosCliente["bairro"],
				"state" => $dadosCliente["estado"],
				"country" => $dadosCliente["pais"],
				"complement" => $dadosCliente["complemento"],
				"gateway" => "iugu",
				"interUser" => $cliente["id"],
				"status" => true,
				"id_evento" => $id_evento
			);

			$this->db->insert("clientes", $insertCliente);
			$idCliente = $this->db->insert_id();
			$retorno = array(
				"id_cliente" => $idCliente,
				"interUser" => $cliente["id"]
			);
        }

            
		//file_put_contents('log/iugu/clienteExiste.txt', print_r([$clienteExiste], true) . "\r\n", FILE_APPEND);

		return $retorno;
	}

	public function interPay($dadosMetodoPagamento,$evento)
	{
		$this->load->model("Iugu_model", "Iugu");
		$retorno = array();
		$metodoPagamento = $this->Iugu->novoMetodoPagamento($dadosMetodoPagamento);
		file_put_contents('log/meioPagamento.txt', print_r([$dadosMetodoPagamento, $metodoPagamento], true) . "\r\n", FILE_APPEND);
		

		$this->db->update("evento",["interPay"=>$metodoPagamento["id"]], ["id_evento"=>$evento["id_evento"]]);
		
		$retorno = array(
			"interPay" => $metodoPagamento["id"],
		);

		return $retorno;
	}

    public function novoMetodoPagamento($dadosMetodoPagamento, $id_cliente, $id_evento)
	{
		$this->load->model("Iugu_model", "Iugu");
		$retorno = array();
		$metodoPagamento = $this->Iugu->novoMetodoPagamento($dadosMetodoPagamento);
		file_put_contents('log/meioPagamento.txt', print_r([$dadosMetodoPagamento, $metodoPagamento], true) . "\r\n", FILE_APPEND);
		$dadosMetodoPagamentoInsert = array(
			"id_cliente" => $id_cliente,
			"interPay" => $metodoPagamento["id"],
			"id_evento" => $id_evento
		);

		$this->db->insert("payment_methods", $dadosMetodoPagamentoInsert);
		$id = $this->db->insert_id();
		$retorno = array(
			"id_payment" => $id,
			"interPay" => $metodoPagamento["id"],
			"data" => $metodoPagamento["data"]
		);

		return $retorno;
	}

	public function geraFatura($dadosFatura, $approved = true, $recorrencia = false)
	{
		$retorno = ["success" => false, "id_fatura" => ""];
		$valorPago = $dadosFatura["total_cents"] / 100;
		if ($dadosFatura["fatura_id"] == "") {
			print_r(["Fatura com problema" => $dadosFatura]);
		}
		$fatura = array(
			"TransacaoID" => $dadosFatura["fatura_id"],
			"id_evento" => $dadosFatura["dadosUser"]["id_evento"],
			"id_cliente" => $dadosFatura["id_cliente"],
			"id_payment" => $dadosFatura['id_payment'],
			"inclusao" => time(),
			"forma" => $dadosFatura["formaPagamento"],
			"valor" => $valorPago,
			"parcelas" => $dadosFatura["parcelas"],
			"status" => 0,
			"orderId" => $dadosFatura["orderId"],
			"bankId" => $dadosFatura["bankId"]
		);
		$this->db->insert("faturas", $fatura);
		$idFatura = $this->db->insert_id();
		$this->db->update("orders",["id_fatura"=>$idFatura],["orderId"=>$dadosFatura["orderId"]]);
		if ($approved) {
			$retorno = ["success" => true, "id_fatura" => $idFatura];	
		} else {
			if ($this->db->update("faturas", ["status" => -1], ["id" => $idFatura])) {
				$retorno = ["success" => true, "id_fatura" => $idFatura];
			}
		}

		return $retorno;
	}

	public function criarSubConta($evento, $plataforma = "Iugu")
	{
		$this->load->model($plataforma . "_model", $plataforma);
		$retorno = ["success" => false];
		$dadosEnv = array(
			"nome" => $evento["nome"],
			"comissao" => array(
				"valor" => 0,
				"porcentagem" => 0,
				"credit_card_valor" => 0,
				"credit_card_porcentagem" => 0,
				"boleto_valor" => 0,
				"boleto_porcentagem" => 0,
				"pix_valor" => 0,
				"pix_porcentagem" => 0
			)
		);
		$retorno = $this->$plataforma->newSubConta($dadosEnv);
		if (isset($retorno["account_id"])) {
			$this->db->update("evento", ["access_token" => $retorno["live_api_token"], "access_token_teste" => $retorno["test_api_token"], "id_iugu" => $retorno["account_id"], "user_token" => $retorno["user_token"]], ["id_evento" => $evento["id_evento"]]);
			$evento = $this->db->get_where("evento", ["id_evento" => $evento["id_evento"]])->row_array();
			$retorno = ["success" => true, "id" => $retorno["account_id"], "dadosUser" => $evento];
		} else {
			$retorno = ["success" => false, "erro" => json_encode($retorno)];
			file_put_contents('log/erroAoCriarSubConta.txt', print_r(["data" => convertData(time()), "dadosEnv" => $dadosEnv, "retorno" => $retorno], true) . "\r\n", FILE_APPEND);
		}

		return $retorno;
	}

	public function ativarSubConta($evento, $plataforma = "Iugu")
	{
		$this->load->model($plataforma . "_model", $plataforma);
		$retorno = ["success" => false];
		$dadosEnv = array(
			"accessToken" => $evento["access_token"],
			"id_conta" => $evento["id_iugu"],
			"valor_maximo" => "Subconta",
			"produtos_fisicos" => $evento["prodfisico"],
			"descricao_negocio" => $evento["descricaonegocio"],
			"fisica_juridica" => $evento["persontype"], //fisica ou juridica
			"saque_automatico" => false, //true or false
			"rua" => $evento["rua"],
			"cep" => $evento["cep"],
			"cidade" => $evento["cidade"],
			"bairro" => $evento["cidade"],
			"estado" => $evento["estado"],
			"telefone" => $evento["telefone"],
			"banco" => $evento["banco"],
			"agencia" => $evento["agencia"],
			"conta_tipo" => $evento["tipo_conta"],
			"conta_numero" => $evento["n_conta"],
			"cpf_cnpj" => $evento["documento"],
			"nome" => $evento["nome"],
			"valor_maximo" => ""
		);

		$retorno = $this->$plataforma->ativarSubConta($dadosEnv);
		if (isset($retorno["id"])) {
			$this->db->update("evento", ["contaAtiva" => true], ["id_evento" => $evento["id_evento"]]);
			$retorno = ["success" => true, "id" => $retorno["account_id"]];
		} else {
			$retorno = ["success" => false, "erro" => json_encode($retorno)];
			file_put_contents('log/erroAoCriarSubConta.txt', print_r(["data" => convertData(time()), "dadosEnv" => $dadosEnv, "retorno" => $retorno], true) . "\r\n", FILE_APPEND);
		}

		return $retorno;
	}


}