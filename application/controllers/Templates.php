<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Templates extends CI_Controller
{

    public function siteCliente($slug,$secao=""){
       
        if($secao != ""){
            redirect(base_url("site/".$slug."#".$secao));
        }
        $this->load->model("Savedate_model","Savedate");
        $evento = $this->db->get_where("evento",["slug"=>addslashes($slug)])->row_array();
       
        $mensagens = $this->db->get_where("mensagens",["id_evento"=>$evento["id_evento"],"status"=>"aprovada"])->result_array();
        $protagonistas = $this->db->get_where("protagonistas",["id_evento"=>$evento["id_evento"]])->result_array();
        $iniciais = "";
        foreach($protagonistas as $prot){
            $iniciais .= substr($prot["firstName"],0,1)." ";
        }
        $albumMidias = $this->Savedate->albumMidias($evento["id_evento"]);
        $d["evento"] = $evento;
        $d["paginas"] = $this->db->get_where("paginas",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["config"] = $this->db->get_where("config_template",["id_evento"=>$evento["id_evento"],"savedate"=>$evento["savedate"]])->row_array();
        $d["endereco"] = $this->db->get_where("enderecos",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["cancelamento"] = $this->db->get_where("cancelamento",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["mensagens"] = $mensagens;
        $d["albuns"] = $albumMidias["albuns"];
        $d["midias"] = $albumMidias["midias"];
        $d["iniciais"] = $iniciais;
        // echo "<pre>";
        // print_r($albumMidias["midias"]);
        $d["protagonistas"] = $protagonistas;
        $d["introducao"] = $this->db->get_where("introducao",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["evento"] = $evento;
        if($d["cancelamento"]){
            redirect(base_url());
        }
        $this->load->view($d["config"]["template"],$d);
    }

    public function lista($slug){
        $evento = $this->db->get_where("evento",["slug"=>addslashes($slug)])->row_array();
        $d["paginas"] = $this->db->get_where("paginas",["id_evento"=>$evento["id_evento"]])->result_array();
        $presentes = $this->db->get_where("presentes",["id_evento"=>$evento["id_evento"]])->result_array();
        $listaPresentes = [];
        foreach($presentes as $i=>$presente){
            $listaPresentes[$i] = $presente;
            $listaPresentes[$i]["valor"] = $presente["valor"]+$presente["valorRepasse"];
        }
        $d["presentes"] = $listaPresentes;
        $d["config"] = $this->db->get_where("config_template",["id_evento"=>$evento["id_evento"],"savedate"=>$evento["savedate"]])->row_array();
        $d["introducao"] = $this->db->get_where("introducao",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["endereco"] = $this->db->get_where("enderecos",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["evento"] = $evento;
        $d["titulo"] = "Em comemoração aos 30 anos de vida";
        $d["bt_criar_site"] = "Confirmar presença";
        $d["pagina"] = "lista";
        $d["titulo_personalize"] = "Personalize o seu layout e tenha uma página exclusiva!";
        $d["texto_personalize"] = "No Save The Date você pode personalizar os Layouts disponibilizados e criar um visual completamente seu.";

        $this->load->view($d["config"]["template"]."_lista",$d);
    }

    public function checkout($slug,$tokencart){
        $idCart = addslashes(explode("|",decodifica($tokencart))[0]);
        $evento = $this->db->get_where("evento",["slug"=>addslashes($slug)])->row_array();
        $dadosOrder = $this->db->get_where("orders",["orderId"=>$idCart,"id_evento"=>$evento["id_evento"]])->row_array();
        if($dadosOrder["id_fatura"]){
            redirect(base_url("success/".$slug."/".$tokencart));
        }
        $d["line_items"] = $this->db->get_where("line_items",["orderId"=>$idCart,"id_evento"=>$evento["id_evento"]])->result_array();
        $d["paginas"] = $this->db->get_where("paginas",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["endereco"] = $this->db->get_where("enderecos",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["presentes"] = $this->db->get_where("presentes",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["config"] = $this->db->get_where("config_template",["id_evento"=>$evento["id_evento"],"savedate"=>$evento["savedate"]])->row_array();
        $d["introducao"] = $this->db->get_where("introducao",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["tokencart"] = $tokencart;
        $d["evento"] = $evento;
        $this->load->view("checkout",$d);
    }

    public function finalizarPagamento($slug,$tokencart){
        $evento = $this->db->get_where("evento",["slug"=>addslashes($slug)])->row_array();
        $idCart = addslashes(explode("|",decodifica($tokencart))[0]);
        $installments = 6;
        $dadosOrder = $this->db->get_where("orders",["orderId"=>$idCart,"id_evento"=>$evento["id_evento"]])->row_array();
        $jurosIugu=array(
            1 => 0,
            2 => 6.90,
            3 => 10.35,
            4 => 13.80,
            5 => 17.25,
            6 => 20.70,
            7 => 24.15,
            8 => 27.60,
            9 => 31.50,
            10 => 34.50,
            11 => 37.95,
            12 => 41.40,
        );

        $jurosSaveDateBd = $this->db->get_where("parcelados",["id_evento"=>-1])->result_array();
        $jursoSaveDate = [];
        foreach($jurosSaveDateBd as $jbd){
            $jursoSaveDate[$jbd["pacela"]] = $jbd["juros"];
        }
        $jurosFinal = [];
        foreach($jurosIugu as $i=>$jur){
            $jurosFinal[$i] = $jur+$jursoSaveDate[$i];
        }

        foreach($jurosIugu as $i=>$jur){
            $jurosFinal[$i] = $jur;
        }
        if($dadosOrder["id_fatura"]){
            redirect(base_url("success/".$slug."/".$tokencart));
        }
        $d["paginas"] = $this->db->get_where("paginas",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["line_items"] = $this->db->get_where("line_items",["orderId"=>$idCart,"id_evento"=>$evento["id_evento"]])->result_array();
        $d["presentes"] = $this->db->get_where("presentes",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["endereco"] = $this->db->get_where("enderecos",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["config"] = $this->db->get_where("config_template",["id_evento"=>$evento["id_evento"],"savedate"=>$evento["savedate"]])->row_array();
        $d["introducao"] = $this->db->get_where("introducao",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["evento"] = $evento;
        $d["installments"] = $installments;
        $d["juros"] = $jurosFinal;
        $d["tokencart"] = $tokencart;
        $this->load->view("finalizarPagamento",$d);
    }

    public function checkoutsuccess($slug,$tokencart){
        $evento = $this->db->get_where("evento",["slug"=>addslashes($slug)])->row_array();
        $idCart = addslashes(explode("|",decodifica($tokencart))[0]);
        $this->load->model("Iugu_model","Iugu");
        $installments = 12;
        $access_token = $evento["access_token"];
		if ($evento["testMode"] == "1") {
			$access_token = $evento["access_token_teste"];
		}
        $d["fatura"] = $this->db->get_where("faturas",["orderId"=>$idCart])->row_array();
        $d["dadosFatura"] = $this->Iugu->getInvoice(["accessToken"=>$access_token,"id_fatura"=>$d["fatura"]["TransacaoID"]]);
        $d["paginas"] = $this->db->get_where("paginas",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["line_items"] = $this->db->get_where("line_items",["orderId"=>$idCart,"id_evento"=>$evento["id_evento"]])->result_array();
        $d["endereco"] = $this->db->get_where("enderecos",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["presentes"] = $this->db->get_where("presentes",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["config"] = $this->db->get_where("config_template",["id_evento"=>$evento["id_evento"],"savedate"=>$evento["savedate"]])->row_array();
        $d["introducao"] = $this->db->get_where("introducao",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["evento"] = $evento;
        $d["installments"] = $installments;
        $d["tokencart"] = $tokencart;
        $this->load->view("checkoutSuccess",$d);
    }

    public function pagina($slug,$handle){
        
        $evento = $this->db->get_where("evento",["slug"=>addslashes($slug)])->row_array();
        $pagina = $this->db->get_where("paginas",["id_evento"=>$evento["id_evento"],"handle"=>$handle])->row_array();
        $d["paginas"] = $this->db->get_where("paginas",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["pagina"] = $pagina;
        $d["config"] = $this->db->get_where("config_template",["id_evento"=>$evento["id_evento"],"savedate"=>$evento["savedate"]])->row_array();
        $d["endereco"] = $this->db->get_where("enderecos",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["introducao"] = $this->db->get_where("introducao",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["evento"] = $evento;

        $this->load->view($d["config"]["template"]."_pagina",$d);
    }

    public function editarTemplate($slug){
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect(base_url("Site/index"));
        $this->load->model("Savedate_model","Savedate");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
      
        $mensagens = $this->db->get_where("mensagens",["id_evento"=>$evento["id_evento"],"status"=>"aprovada"])->result_array();
        $protagonistas = $this->db->get_where("protagonistas",["id_evento"=>$evento["id_evento"]])->result_array();
        $albumMidias = $this->Savedate->albumMidias($evento["id_evento"]);
        $iniciais = "";
        foreach($protagonistas as $prot){
            $iniciais .= substr($prot["firstName"],0,1)." ";
        }
        $d["slug"] = $slug;
        $d["config"] = $this->db->get_where("config_template",["id_evento"=>$evento["id_evento"],"savedate"=>$evento["savedate"]])->row_array();
        $d["mensagens"] = $mensagens;
        $d["endereco"] = $this->db->get_where("enderecos",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["albuns"] = $albumMidias["albuns"];
        $d["midias"] = $albumMidias["midias"];
        $d["protagonistas"] = $protagonistas;
        $d["introducao"] = $this->db->get_where("introducao",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["evento"] = $evento;
        $d["titulo"] = "Em comemoração aos 30 anos de vida";
        $d["bt_criar_site"] = "Confirmar presença";
        $d["titulo_personalize"] = "Personalize o seu layout e tenha uma página exclusiva!";
        $d["texto_personalize"] = "No Save The Date você pode personalizar os Layouts disponibilizados e criar um visual completamente seu.";
        $d["iniciais"] = $iniciais;
        $this->load->view($evento["template"]."_edit",$d);
    }

    public function aniversario_modelo(){
        $d["titulo"] = "Em comemoração aos 30 anos de vida";
        $d["bt_criar_site"] = "Confirmar presença";
        $d["titulo_personalize"] = "Personalize o seu layout e tenha uma página exclusiva!";
        $d["texto_personalize"] = "No Save The Date você pode personalizar os Layouts disponibilizados e criar um visual completamente seu.";

        $this->load->view("template_aniversario_modelo",$d);
    }

    public function novaMensagem(){
        iniAjax();
        $slug = addslashes($this->input->post("handle"));
        $evento = $this->db->get_where("evento",["slug"=>$slug])->row_array();
        $insert["nome"] = addslashes($this->input->post("nome")." ".$this->input->post("sobrenome"));
        $insert["email"] = addslashes($this->input->post("email"));
        $insert["telefone"] = addslashes($this->input->post("telefone"));
        $insert["mensagem"] = addslashes($this->input->post("mensagem"));
        $insert["inclusao"] = time();
        $insert["ultimoUpdate"] = time();
        $insert["status"] = "pendente";
        $insert["id_evento"] = $evento["id_evento"];

        $caracteres = strlen($insert["mensagem"]);
        if($caracteres < 251){
            $this->jphp->alert("Sua mensagem deve conter no minimo 250 caracteres.");
        }else{
            if($insert["nome"] != "" && $insert["email"] != "" && $insert["mensagem"] != ""){
                $this->db->where("emailConvidado",$insert["email"]);
                $this->db->or_where("telefoneConvidado",$insert["telefone"]);
                $convidado = $this->db->get("convidados")->row_array();
               // print_r($convidado);
                if($convidado){
                    $presenca = $this->input->post("presenca");
                    if($presenca == "on"){
                        $this->db->update("convidados",["status"=>"confirmado"],["id_convidado"=>$convidado["id_convidado"],"id_evento"=>$evento["id_evento"]]);
                        $this->jphp->sucesso("Sua presença foi confirmada com sucesso!");
                    }
                    $insert["id_convidado"] = $convidado["id_convidado"];
                }
    
                if($this->db->insert("mensagens",$insert)){
                    $this->jphp->sucesso("Mensagem enviada com sucesso!");
                    $this->jphp->redirect();
                }
            }else{
                $this->jphp->alert("Preencha todos os dados para enviar uma mensagem.");
            }
        }
        
       
        $this->jphp->send();
        
    }

    public function salvaBanners(){
        iniAjax();
        $this->jphp->sucesso("Banners atualizados com sucesso");
        $this->jphp->redirect();
        $this->jphp->send();
    }

    public function confirmarPresenca(){
        iniAjax();
        $slug = addslashes($this->input->post("handle"));
        $evento = $this->db->get_where("evento",["slug"=>$slug])->row_array();
        $insert["nome"] = addslashes($this->input->post("nome")." ".$this->input->post("sobrenome"));
        $insert["email"] = addslashes($this->input->post("email"));
        $insert["telefone"] = addslashes($this->input->post("telefone"));

        if(isset($_POST["acompanhantes"])){
            $insert["acompanhantes"] = addslashes($this->input->post("acompanhantes"));
        }
       
        
        if($insert["nome"] != "" && $insert["email"] != "" && $insert["telefone"] != ""){
            $this->db->where("emailConvidado",$insert["email"]);
            $this->db->or_where("telefoneConvidado",$insert["telefone"]);
            $convidado = $this->db->get("convidados")->row_array();
           // print_r($convidado);
            if($convidado){
               $this->db->update("convidados",["status"=>"confirmado","acompanhantes"=>$insert["acompanhantes"]],["id_convidado"=>$convidado["id_convidado"],"id_evento"=>$evento["id_evento"]]);
               $this->jphp->sucesso("Sua presença foi confirmada com sucesso!");
               $this->jphp->redirect();
            }else{
                $this->jphp->alert("Seu nome não foi identificado em nossa lista. Confira se preencheu seus dados corretamente, bem como esta no convite.");
            }
        }else{
            $this->jphp->alert("Preencha todos os dados para confirmar sua presença.");
        }
       
        $this->jphp->send();
    }

    public function trocaBanner($tipo){
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $tipos = array(
            "principal"=>"bgTopo",
            "mensagens"=>"bgMsg",
            "presentes"=>"bgLista",
            "rodape"=>"bgFim",
            "principalMobile"=>"bgTopoMobile"
        );
        $fotos = $_FILES;
        $dados = json_decode($_POST["slim"][0],true);
        $ext = explode("/",$dados["input"]["type"])[1];
        foreach($fotos as $foto){
            $ext = strtolower(substr($foto['name'],-4));
            $new_name = "banners/".$tipo.$evento["id_evento"].time().$dadosUser["user"].".".$ext;
            move_uploaded_file($foto['tmp_name'], $new_name);
           
            $this->db->update("config_template",[$tipos[$tipo]=>base_url($new_name)],["id_evento"=>$evento["id_evento"]]);

        }
    }

    public function salvaConfigGerais(){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $insert["headLine"] = $this->input->post("headLine");
        $insert["textoBtHeadLine"] = $this->input->post("textoBtHeadLine");
        $insert["corPrincipal"] = $this->input->post("corPrincipal");
        $insert["corTextoMenu"] = $this->input->post("corTextoMenu");
        $insert["corTitulos"] = $this->input->post("corTitulos");
        $insert["corTitulosBanner"] = $this->input->post("corTitulosBanner");
        $insert["corComplementar"] = $this->input->post("corComplementar");
        $insert["corTextosBanner"] = $this->input->post("corTextosBanner");
        $insert["corContadorTempo"] = $this->input->post("corContadorTempo");
        $insert["textoContadoTempo"] = $this->input->post("textoContadoTempo");
        $insert["corFundoMsg"] = $this->input->post("corFundoMsg");
        
        $this->db->update("config_template",$insert,["id_evento"=>$evento["id_evento"]]);
        $this->jphp->sucesso("Dados atualizados com sucesso!");
        $this->jphp->redirect();
        $this->jphp->send();
    }

    public function envImg(){
        header('Access-Control-Allow-Origin: *');
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', array('login' => true), 'login');
        $dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $img=$_FILES["upload"];
      
         $this->db->insert("imagens",["id_evento"=>$evento["id_evento"],"inclusao"=>time(),"size"=>$img["size"]]);
         $id_img = $this->db->insert_id();
        $size = $img["size"];
        $type = explode("/",$img["type"])[1];
        $name = "imgPaginas/".$id_img.".".$type;
        $url = base_url($name);
        move_uploaded_file($img['tmp_name'], $name);
        $this->db->update("imagens",["url"=>$url,"name"=>$name],["id_img"=>$id_img]);
        
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["uploaded"=>true,"filename"=> $url,"url"=> $url]);
    }

    public function salvaTitulos(){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $insert["titMsg"] = $this->input->post("titMsg");
        $insert["textoBtMsg"] = $this->input->post("textoBtMsg");
        $insert["textoMidias"] = $this->input->post("textoMidias");
        $insert["titLista"] = $this->input->post("titLista");
        $insert["textoBtLista"] = $this->input->post("textoBtLista");

        $this->db->update("config_template",$insert,["id_evento"=>$evento["id_evento"]]);
        $this->jphp->sucesso("Dados atualizados com sucesso!");
        $this->jphp->redirect();
        $this->jphp->send();
    }

    public function salvaMusica(){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) return;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $musica = $this->input->post("video");

        $musica = explode("?v=",$musica);
        $musica = explode("&",$musica[1])[0];
        $this->db->update("evento",["video"=>$musica],["id_evento"=>$evento["id_evento"]]);
        $this->jphp->sucesso("Dados salvos com sucesso!");
        $this->jphp->redirect();

        $this->jphp->send();
    }

    public function contagemRegressiva(){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) return;

        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $contagemRegressiva = $this->input->post("contagemRegressiva");
        if($contagemRegressiva == "on"){
            $ativar = true;
        }else{
            $ativar = false;
        }
        $this->db->update("evento",["contagemRegressiva"=>$ativar],["id_evento"=>$evento["id_evento"]]);
        $this->jphp->sucesso("Dados salvos com sucesso!");
        $this->jphp->redirect();
       
        $this->jphp->send();
    }

    public function salvaSeo(){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) return;

        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $slug = $this->input->post("slug");
        $slug = str_replace(" ","-",tiraMaiuscula(tiraPontuacao(tiraAcento($slug))));
        $urlInvalida = $this->db->get_where("evento",["slug"=>$slug])->row_array();
        if(!$urlInvalida){
            $this->db->update("evento",["slug"=>$slug],["id_evento"=>$evento["id_evento"]]);
            $this->jphp->sucesso("Dados salvos com sucesso!");
            $this->jphp->redirect(base_url("tema/".$slug));
        }
        $this->jphp->send();
    }

    public function consultaUrl(){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) return;

        //$evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $url = $this->input->post("url");
        $url = str_replace(" ","-",tiraMaiuscula(tiraPontuacao(tiraAcento($url))));
        $urlInvalida = $this->db->get_where("evento",["slug"=>$url])->row_array();
        if($urlInvalida){
            $this->jphp->replace(".retValidaUrl","<p class='error'>Url indisponível</p>");
        }else{
            $this->jphp->replace(".retValidaUrl","<p class='success'>Url disponível</p><br> https://salveadata.com.br/site/".$url);
        }
        $this->jphp->send();
    }
}