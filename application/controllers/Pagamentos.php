<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pagamentos extends CI_Controller
{   
    
    //public $access_token = "3DBEB9545146A921D1A8B08B5A22D88DC45AE7DB84959DB7092D56246917EF01";//teste
    public $access_token = "E879FD571CAA272A71F455D7139693870C825D241D4782F85BC591B18D6625B0";//producao
    public $id_iugu = "A562B3FF8DC4485F95A07DBEA2A4CE2A";

    public function iniPagamento()
	{
		iniAjax();
        $this->load->model("Savedate_model","Savedate");
		$this->load->library('Login', null, 'login');
		$dadosUser = $this->login->usuario;
		if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

		$env["accessToken"] = $this->access_token;
		$env["id_plano"] = $this->input->post("id_plano");
		$env["teste"] = false;
		$env["email"] = $dadosUser['email'];
        $env["nome"] = $this->input->post("nome");
        $env["telefone"] = str_replace(["(",")"," ","-"],"",$this->input->post("telefone"));
        $env["cpf"] = $this->input->post("cpf");
        $env["cep"] = $this->input->post("cep");
        $env["logradouro"] = $this->input->post("logradouro");
        $env["numero"] = $this->input->post("numero");
        $env["complemento"] = $this->input->post("complemento");
        $env["bairro"] = $this->input->post("bairro");
        $env["cidade"] = $this->input->post("cidade");
        $env["uf"] = $this->input->post("uf");
		$env["parcelas"] = $this->input->post("installments");
		$env["token"] = $this->input->post("token");
		$env["ref"] = $dadosUser["user"];
		//file_put_contents('log/retornoPagamentoIugu.txt', print_r(["entrou" => $env], true), FILE_APPEND);
		
        $dadosCliente = array(
			"cpf_cnpj" => $env["cpf"],
			"nome" => $env["nome"],
			"prefixo" => substr($env["telefone"], 0, 2),
			"telefone" => substr($env["telefone"], 2),
			"email" => $env["email"],
			"numero" => $env["numero"],
			"cep" => $env["cep"],
			"rua" => $env["logradouro"],
			"cidade" => $env["cidade"],
			"bairro" => $env["bairro"],
			"estado" => $env["uf"],
			"pais" => $env["pais"],
			"complemento" => $env["complemento"],
			"accessToken" => $this->access_token
		);

		$cliente = $this->Savedate->interUser($dadosCliente, $evento);
        $evento["interUser"] = $cliente["interUser"];
        if ($env["token"] != "") {
            
            $dadosMetodoPagamento = array(
                "descricao" => $env["email"].time(),
                "token" => $env["token"],
                "default" => true,
                "interUser" => $cliente["interUser"],
                "accessToken" => $this->access_token
            );
            $metodoPagamento = $this->Savedate->interPay($dadosMetodoPagamento, $evento);
        }
        $formaPagamento = $this->input->post("formaPagamento");
        $id_plano = $this->input->post("id_plano");
        $plano = $this->db->get_where("planos",["id_plano"=>$id_plano])->row_array();
        $dadosCobranca = array(
            "email" => $env["email"],
            "desconto" => 0,
            "diasVencimento" => 1,
            // "order_id" => $dados["orderId"],
            "interUser" => $evento["interUser"],
            "formaPagamento" => $formaPagamento ,
            "external_reference" => $evento["id_evento"] . "_" . $plano["id_plano"],
            "accessToken" => $this->access_token,
            "notification_url" => base_url("Pagamentos/retornoPagamento")
        );
        if($env["parcelas"] > 1){
            $valorPagar = $plano["valorParcelado"];
        }else{
            $valorPagar = $plano["valor"];
        }
        
        
            $dadosCobranca["line_items"][] = array(
                "description" => $plano["descricao"],
                "quantity" => 1,
                "price_cents" => intval($valorPagar)*100
            );

            $novaFatura = $this->Iugu->novaFaturaApp($dadosCobranca);
            file_put_contents('log/novaFatura.txt', print_r([$novaFatura], true), FILE_APPEND);
            if(isset($novaFatura["id"])){
                $faturaApp = array(
                    "TransacaoID"=>$novaFatura["id"],
                    "id_evento"=>$evento["id_evento"],
                    "inclusao"=>time(),
                    "forma"=>$formaPagamento,
                    "valor"=>$valorPagar,
                    "parcelas"=>($env["parcelas"] == "" ? 1 : $env["parcelas"]),
                    "status"=>"pending",
                    "url_fatura"=>$novaFatura["secure_url"]
                );
                $this->db->insert("faturas_app",$faturaApp);
            }
            $idFaturaGateway = $novaFatura["id"];
            //$totalPago = $novaFatura["total_cents"];
            if($formaPagamento == "credit_card"){
                $cobrar = array(
                    "interPay" => $metodoPagamento['interPay'],
                    "interUser" => $cliente['interUser'],
                    "id_fatura" => $idFaturaGateway,
                    "parcelas" => $env["parcelas"],
                    // "order_id" => $dados['orderId']
                    "accessToken"=>$this->access_token
                );
                $retornoPagamento = $this->Iugu->pagarFatura($cobrar);
            }
            if (($retornoPagamento['status'] == 'inicial' || $retornoPagamento['status'] == 'captured' || $retornoPagamento['status'] == 'paid')) {
                $approved = true;
                $success = true;
            } elseif (($retornoPagamento['status'] == 'error' || $retornoPagamento['status'] == 'canceled' || $retornoPagamento['status'] == 'unauthorized')) {
                // echo "failed";
                $this->Iugu->cancelarFatura(["accessToken" =>$this->access_token, "id" => $novaFatura["id"]]);
                $approved = false;
                $success = false;
            }
		
			if ($success) {
                $this->db->update("evento",["id_plano"=>$plano["id_plano"]],["id_evento"=>$evento["id_evento"]]);
				$this->jphp->sucesso("Parabéns, seu pagamento está sendo processado, caso sua conta não seja liberada em até 4 horas entre em contato com o suporte.");
				$this->jphp->redirect();
			} else {
				$this->jphp->alert("Pagamento negado. Tente novamente ou entre em contato com o suporte.");
			}
		$this->jphp->executa('$(".main-dialog.load").fadeOut(0.1);');
		//		print_r($retorno);
		$this->jphp->send();
	}

    public function payment(){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;

        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
       
        if(!$dadosUser) return;

        $jurosBd = $this->db->get_where("parcelados", ["id_evento" => $dadosUser["id_evento"]])->result_array();
		if (!$jurosBd) {
			$jurosBd = $this->db->get_where("parcelados", ["id_evento" => -1])->result_array();
		}
		$juros = array();
		foreach ($jurosBd as $juro) {
			$juros[$juro["parcela"]] = $juro["juros"];
		}
        $access_token = $dadosUser["access_token"];
		if ($dadosUser["testMode"] == "1") {
			$access_token = $dadosUser["access_token_teste"];
		}
        
       
        $dados=array(
            "cpf_cnpj"=>$this->input->post("cpf"),
            "nome"=>$this->input->post("nome"),
            "email"=>$this->input->post("email"),
            "prefixo"=>$this->input->post("prefixo"),
            "telefone"=>$this->input->post("telefone"),
            "numero"=>$this->input->post("numero"),
            "cep"=>$this->input->post("cep"),
            "logradouro"=>$this->input->post("logradouro"),
            "cidade"=>$this->input->post("cidade"),
            "bairro"=>$this->input->post("bairro"),
            "uf"=>$this->input->post("uf"),
            "cpf"=>$this->input->post("cpf"),
            "pais"=>"BR",
            "complemento"=>$this->input->post("complemento"),
            "id_evento"=>$id_evento,
            "token"=>$this->input->post("token"),
            "installments"=>$this->input->post("installments"),
            "formaPagamento"=>$this->input->post("formaPagamento"),
        );
        if(isset($_GET["debug"])){
            print_r($dados);
        }
        $parcelas = ($dados["installments"] == "" ? 1 : $dados["installments"]);
        $formaPagamento = "credit_card";
        $dadosCliente = array(
			"cpf_cnpj" => $dados["cpf"],
			"nome" => $dados["nome"],
			"prefixo" => substr($dados["telefone"], 3, 2),
			"telefone" => substr($dados["telefone"], 5),
			"email" => $dados["email"],
			"numero" => $dados["numero"],
			"cep" => $dados["cep"],
			"rua" => $dados["logradouro"],
			"cidade" => $dados["cidade"],
			"bairro" => $dados["bairro"],
			"estado" => $dados["uf"],
			"pais" => $dados["pais"],
			"complemento" => $dados["complemento"],
			"accessToken" => $access_token
		);

		$cliente = $this->Savedate->newCliente($dadosCliente, $dadosUser["id_evento"]);
        if(isset($_GET["debug"])){
            print_r($cliente);
        }
        if ($dados["token"] != "") {
            $dadosMetodoPagamento = array(
                "descricao" => $dados["email"].time(),
                "token" => $dados["token"],
                "default" => true,
                "interUser" => $cliente["interUser"],
                "accessToken" => $access_token
            );
            $metodoPagamento = $this->Savedate->novoMetodoPagamento($dadosMetodoPagamento, $cliente["id_cliente"], $dadosUser["id_evento"]);
        }
        if(isset($_GET["debug"])){
            print_r(["Metodo pagamento"=>$metodoPagamento]);
        }
        //file_put_contents('log/passos.txt', print_r($metodoPagamento, true) . "\r\n", FILE_APPEND);
        $dadosCobranca = array(
            "email" => $dados["email"],
            "desconto" => 0,
            "diasVencimento" => 1,
            // "order_id" => $dados["orderId"],
            "interUser" => $cliente["interUser"],
            "formaPagamento" => $formaPagamento,
            "external_reference" => $id_evento . "_" . $cliente["id_cliente"],
            "accessToken" => $access_token,
            "notification_url" => base_url("Checkout/retornoPagamento")
        );
        //file_put_contents('log/passos.txt', print_r("7<br>", true) . "\r\n", FILE_APPEND);
        $idCart = addslashes(explode("|",decodifica($_POST["tokenCart"]))[0]);
        $line_items = $this->db->get_where("line_items",["orderId"=>$idCart])->result_array();
        if(isset($_GET["debug"])){
            print_r(["Produtos"=>$line_items]);
        }
        foreach ($line_items as $lineItem) {
            $jurosAplicado = 0;
        
            if ($juros[$parcelas] > 0) {
                $jurosAplicado = number_format(($lineItem["price"] / 100) * $juros[$parcelas], 2, ".", "");
            }

            $dadosCobranca["line_items"][] = array(
                "description" => $lineItem["description"],
                "quantity" => $lineItem["quantity"],
                "price_cents" => intval(strval(($lineItem["price"] + $jurosAplicado) * 100))
            );
        }
      
            $taxas = $this->db->get_where("taxas_cliente", ["id_evento" => $dadosUser["id_evento"]])->row_array();
            if (!$taxas) {
                $taxas = $this->db->get_where("taxas_cliente", ["id_evento" => -1])->row_array();
            }
            $novaFatura = $this->Iugu->novaFatura($dadosCobranca, $taxas);
            if(isset($_GET["debug"])){
                print_r($novaFatura);
            }

            $idFaturaGateway = $novaFatura["id"];
            $totalPago = $novaFatura["total_cents"];
            $cobrar = array(
                "interPay" => $metodoPagamento['interPay'],
                "interUser" => $cliente['interUser'],
                "id_fatura" => $idFaturaGateway,
                "parcelas" => $parcelas,
                // "order_id" => $dados['orderId']
            );
            $retornoPagamento = $this->Iugu->pagarFatura($cobrar);
            if(isset($_GET["debug"])){
                print_r($retornoPagamento);
            }

            file_put_contents('log/novoPagamento2.txt', print_r([$novaFatura, $retornoPagamento, $dadosCobranca], true) . "\r\n", FILE_APPEND);
            $success = false;
            if (($retornoPagamento['status'] == 'inicial' || $retornoPagamento['status'] == 'captured' || $retornoPagamento['status'] == 'paid')) {
                $approved = true;
                $success = true;
            } elseif (($retornoPagamento['status'] == 'error' || $retornoPagamento['status'] == 'canceled' || $retornoPagamento['status'] == 'unauthorized')) {
                // echo "failed";
                $this->Iugu->cancelarFatura(["accessToken" => $access_token, "id" => $novaFatura["id"]]);
                $approved = false;
                $success = false;
            }
        

        if ($metodoPagamento['interPay'] != "") {
            $metodoPagamento["data"]["firstDigits"] = $dados["firstDigits"];
            $dadosFatura = array(
                "formaPagamento" => $formaPagamento,
                "parcelas" => $parcelas,
                "orderId" => $idCart,
                "bankId" => $metodoPagamento["data"]["brand"],
                "id_cliente" => $cliente["id_cliente"],
                "dadosUser" => $dadosUser,
                "id_payment" => $metodoPagamento['id_payment'],
                "fatura_id" => $idFaturaGateway,
                "total_cents" => $totalPago,
                "data" => $metodoPagamento["data"]
            );
            $this->Savedate->geraFatura($dadosFatura, $approved);
        }
        $retorno = json_encode(["data" => ["success" => $success, "error_code" => "", "message" => $retornoPagamento["info_message"]]]);
        if($success){
            $this->jphp->sucesso("Compra aprovada com sucesso");
        }else{
            $this->jphp->alert("Cartão recusado");
        }
        $this->jphp->send();
    }

    public function paymentBankSlip(){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->model("Iugu_model","Iugu");
        $id_evento = addslashes($this->input->post("id_evento"));
        $dadosUser = $this->db->get_where("evento",["id_evento"=>$id_evento])->row_array();
        if(!$dadosUser) return;
        $access_token = $dadosUser["access_token"];
		if ($dadosUser["testMode"] == "1") {
			$access_token = $dadosUser["access_token_teste"];
		}

        $idCart = addslashes(explode("|",decodifica($_POST["tokenCart"]))[0]);
        $line_items = $this->db->get_where("line_items",["orderId"=>$idCart])->result_array();
        $telefone = str_replace(["(",")"," ","-"],"",$this->input->post("telefone"));
      
        $dadosIni=array(
                "cpf_cnpj"=>str_replace([".","-"],"",$this->input->post("cpf")),
                "nome"=>$this->input->post("nome"),
                "email"=>$this->input->post("email"),
                "prefixo" => substr($telefone, 0, 2),
			    "telefone" => substr($telefone, 2),
                "numero"=>$this->input->post("numero"),
                "cep"=>str_replace([".","-"],"",$this->input->post("cep")),
                "logradouro"=>$this->input->post("logradouro"),
                "cidade"=>$this->input->post("cidade"),
                "bairro"=>$this->input->post("bairro"),
                "uf"=>$this->input->post("uf"),
                "cpf"=>$this->input->post("cpf"),
                "pais"=>"BR",
                "complemento"=>$this->input->post("complemento"),
                "id_evento"=>$id_evento,
                "formaPagamento"=>$this->input->post("formaPagamento"),
            );

        $dadosCliente = array(
			"cpf_cnpj" => $dadosIni["cpf_cnpj"],
			"nome" => $dadosIni["nome"],
			"prefixo" => $dadosIni["prefixo"],
			"telefone" => $dadosIni["telefone"],
			"email" => $dadosIni["email"],
			"numero" => $dadosIni["numero"],
			"cep" => $dadosIni["cep"],
			"rua" => $dadosIni["logradouro"],
			"cidade" => $dadosIni["cidade"],
			"bairro" => $dadosIni["bairro"],
			"estado" => $dadosIni["uf"],
			"pais" => $dadosIni["pais"],
			"complemento" => $dadosIni["complemento"],
			"accessToken" => $access_token
		);

		$cliente = $this->Savedate->newCliente($dadosCliente, $dadosUser["id_evento"]);
       
        $dados = array(
            "email" => $this->input->post("email"),
            "desconto" => 0,
            "diasVencimento" => 3,
            "order_id" => $idCart."2",
            "interUser" => $cliente["interUser"],
            "interPay" => "",
            "parcelas" => "",
            "accessToken" => $access_token,
            );

        
        if(isset($_GET["debug"])){
            print_r(["Produtos"=>$line_items]);
        }
        $totalPago = 0;
        foreach ($line_items as $lineItem) {
            $dados["line_items"][] = array(
                "description" => $lineItem["description"],
                "quantity" => $lineItem["quantity"],
                "price_cents" => intval(strval($lineItem["price"] * 100))
            );
            $totalPago+=($lineItem["price"]*$lineItem["quantity"]);
        }

        $retorno = $this->Iugu->cobrancaDireta($dados);
        if($retorno["success"]){
            $dadosFatura = array(
                "formaPagamento" => $dadosIni["formaPagamento"],
                "parcelas" => 1,
                "orderId" => $idCart,
                "bankId" => "",
                "id_cliente" => $cliente["id_cliente"],
                "dadosUser" => $dadosUser,
                "id_payment" => "",
                "fatura_id" => $retorno["invoice_id"],
                "total_cents" => $totalPago
            );
            $this->Savedate->geraFatura($dadosFatura, true);

            $this->jphp->sucesso("Compra finalizada");
            $this->jphp->redirect(base_url("success/".$dadosUser["slug"]."/".$_POST["tokenCart"]));
        }
        
        $this->jphp->send();
    }

    public function addCart(){
        iniAjax();
        $id = addslashes($this->input->post("id"));
        $idCart = explode("|",decodifica($this->input->post("tokencart")))[0];
        $quantidade = addslashes($this->input->post("quantidade"));
        $total = addslashes($this->input->post("total"));
        $evento = addslashes($this->input->post("evento"));
        $price = $this->input->post("price");
        $description = $this->input->post("description");
        $img = $this->input->post("img");
        $dadosEvento = $this->db->get_where("evento",["id_evento"=>$evento])->row_array();
        $dadosOrder = $this->db->get_where("orders",["orderId"=>$idCart,"id_evento"=>$evento])->row_array();
        if(!$idCart || $dadosOrder["id_fatura"]){
            $cart = array(
                "id_evento"=>$evento,
                "total"=>$total,
                "inclusao"=>time(),
                "ultimo_update"=>time()
            );
            $this->db->insert("orders",$cart);
            $idCart = $this->db->insert_id();
        }else{
            $cart = array(
                "total"=>$total,
                "ultimo_update"=>time()
            );
            $this->db->update("orders",$cart,["orderId"=>$idCart]);
        }

        $line_items = $this->db->get_where("line_items",["orderId"=>$idCart,"id_presente"=>$id])->row_array();

        if(!$line_items){
            $item = array(
                "description" => $description,
                "quantity" => $quantidade,
                "price" => $price,
                "orderId"=>$idCart,
                "id_presente"=>$id,
                "img"=>$img,
                "inclusao"=>time(),
                "ultimoUpdate"=>time(),
                "id_evento"=>$evento
            );
            $this->db->insert("line_items",$item);
        }else{
            $item = array(
                "quantity" => $line_items["quantity"]+$quantidade,
                "ultimoUpdate"=>time()
            );
            $this->db->update("line_items",$item,["id_item"=>$line_items["id_item"]]);
        }
        $tokenGerado = codifica($idCart."|".time());
        $this->jphp->executa("localStorage.setItem('tokencart', '".$tokenGerado."')");
        $this->jphp->sucesso("Presente adicionado no carrinho");
        $this->jphp->redirect(base_url("checkout/".$dadosEvento["slug"]."/".$tokenGerado));
        $this->jphp->send();
    }

    public function quantityCart(){
        iniAjax();
        $id = addslashes($this->input->post("id"));
        $idCart = explode("|",decodifica($this->input->post("tokencart")))[0];
        $quantidade = addslashes($this->input->post("quantidade"));
        if($quantidade > 0){
            $item = array(
                "quantity"=>$quantidade
            );
           // print_r([$id,$idCart,$quantidade]);
            $this->db->update("line_items",$item,["id_item"=>$id,"orderId"=>$idCart]);
            $this->jphp->redirect();
        }else{
            $this->db->delete("line_items",["id_item"=>$id,"orderId"=>$idCart]);
            $this->jphp->redirect();
        }
        $this->jphp->send();
    }

    

    public function removeItem($id_item,$tokencart){
        iniAjax();
        if(isset($_POST["confirm"])){
            $idCart = explode("|",decodifica($tokencart))[0];
            $this->db->delete("line_items",["id_item"=>$id_item,"orderId"=>$idCart]);
            $this->jphp->redirect();
        }else{
            $this->jphp->confirm("Deseja remover esse presente do carrinho?");
        }
        $this->jphp->send();
    }
}