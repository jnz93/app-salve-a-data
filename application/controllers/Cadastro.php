<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cadastro extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model("Savedate_model","Savedate");
    }

    public function novoUsuario(){
        iniAjax();
        $this->load->model("Cadastro_model","Cadastro");
        $insert["nome"] = $this->input->post("nome") ." ".$this->input->post("sobrenome");
        $insert["email"] = $this->input->post("login");
        $insert["senha"] = md5($this->input->post("senha"));
        if(isset($_POST["termos"])){
            $cadastro = $this->Cadastro->novoUsuario($insert);
            if($cadastro["sucesso"]){
                $this->load->library('Login',array(),'login');
                $this->jphp->redirect(base_url("cadastro"));
            }else{
               $this->jphp->alert($cadastro["mensagem"]);
            }
        }else{
            $this->jphp->alert("Você precisa aceitar os termos e condições para finalizar o cadastro!");
        }
        
        $this->jphp->send();
    }

    public function novoProtagonista(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        iniAjax();
       
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $this->load->model("Cadastro_model","Cadastro");
        $insert["firstName"] = $this->input->post("nome");
        $insert["lastName"] = $this->input->post("sobrenome");
        $insert["email"] = $this->input->post("email");
        $insert["telefone"] = $this->input->post("telefone");
        $insert["inclusao"] = time();
        $insert["savedate"] = $dadosUser["savedate"];
        $insert["id_evento"] = $evento["id_evento"];

        if($this->db->insert("protagonistas",$insert)){
            $id = $this->db->insert_id();
            $this->jphp->sucesso("Anfitrião cadastrado com sucesso");
            $this->jphp->redirect(base_url("anfitriao/".$id));

        }
        
        
        $this->jphp->send();
    }

    public function novoConvidado($id_convidado=""){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        iniAjax();
       
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
   
        $insert["nomeConvidado"] = $this->input->post("nome");
        $insert["sobrenomeConvidado"] = $this->input->post("sobrenome");
        $insert["telefoneConvidado"] = $this->input->post("telefone");
        $insert["emailConvidado"] = $this->input->post("email");
        $insert["inclusao"] = time();
        $insert["savedate"] = $dadosUser["savedate"];
        $insert["id_evento"] = $evento["id_evento"];
        if($insert["telefoneConvidado"] == ""){
            $this->jphp->alert("Campo de telefone é obrigatório para validação do convite.");
        }else{
            if($id_convidado != ""){
                $update=array(
                    "nomeConvidado"=>$insert["nomeConvidado"],
                    "sobrenomeConvidado"=>$insert["sobrenomeConvidado"],
                    "emailConvidado"=>$insert["emailConvidado"],
                    "telefoneConvidado"=>$insert["telefoneConvidado"],
                );
                if($this->db->update("convidados",$update,["id_convidado"=>$id_convidado,"savedate"=>$dadosUser["savedate"]])){
                    $this->jphp->sucesso("Convidado alterado com sucesso");
                    $this->jphp->redirect();
                }
            }else{
                if($this->db->insert("convidados",$insert)){
                    $this->jphp->sucesso("Convidado cadastrado com sucesso");
                    $this->jphp->redirect();
                }
            }
        }
        
        
        $this->jphp->send();
    }

    public function enderecoEvento(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        iniAjax();
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $endereco = $this->db->get_where("enderecos",["id_evento"=>$evento["id_evento"]])->row_array();
        $insert["cep"] = $this->input->post("cep");
        $insert["logradouro"] = $this->input->post("logradouro");
        $insert["numero"] = $this->input->post("numero");
        $insert["bairro"] = $this->input->post("bairro");
        $insert["cidade"] = $this->input->post("cidade");
        $insert["estado"] = $this->input->post("estado");
        $insert["pais"] = $this->input->post("pais");
        $insert["nomeLocal"] = $this->input->post("nomeLocal");
        $insert["id_evento"] = $evento["id_evento"];
        $insert["inclusao"] = time();

        if($endereco){
            $this->db->update("enderecos",$insert,["id_endereco"=>$endereco["id_endereco"]]);
        }else{
            $this->db->insert("enderecos",$insert,["id_endereco"=>$endereco["id_endereco"]]);
        }
        $this->jphp->sucesso("Endereço salvo com sucesso!");
        $this->jphp->send();
    }

    public function dataEvento(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        iniAjax();
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $insert["dataInicio"] = $this->input->post("dataInicio");
        $insert["dataTermino"] = $this->input->post("dataTermino");

        $this->db->update("evento",$insert,["id_evento"=>$evento["id_evento"]]);
        $this->jphp->sucesso("Datas salvas com sucesso!");
        $this->jphp->send();
    }

    public function presente(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $insert["produto"] = $this->input->post("nomePresente");
        $insert["valor"] = str_replace(",",".",str_replace(".","",$this->input->post("valorPresente")));
        $insert["descricao"] = $this->input->post("descricaoPresente");
        $imagem = $_FILES["imagemPresente"];
        $ext = strtolower(substr($imagem['name'],-4));
        $new_name = time().$dadosUser["user"].$ext;
        move_uploaded_file($imagem['tmp_name'], "presentesimg/".$new_name);
        $insert["imagem"] = base_url("presentesimg/".$new_name); 
        $insert["inclusao"] = time();
        $insert["ultimoUpdate"] = time();
        $insert["id_evento"] = $evento["id_evento"];

        $this->db->insert("presentes",$insert);
        $this->repasse($evento);
        redirect(base_url("listadepresentes"));
        // $this->jphp->sucesso("Presente adicionado com sucesso!");
        // $this->jphp->redirect();
        // $this->jphp->send();
    }

    public function deletarPresente($id_presente){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        if(isset($_POST["confirm"])){
            $protagonista = $this->db->get_where("presentes",["id_presente"=>$id_presente])->row_array();
            if($protagonista["imagem"] != ""){
                unlink(str_replace(base_url(),"",$protagonista["imagem"]));
            }
            $this->db->delete("presentes",["id_presente"=>$id_presente,"id_evento"=>$evento["id_evento"]]);
            $this->jphp->sucesso("Presente deletado com sucesso!");
            $this->jphp->redirect();
        }else{
            $this->jphp->confirm("Deseja deletar esse presente?",["Ok","Cancelar"]);
        }

        $this->jphp->send();
    }

    public function enviaImagens($id_album){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $fotos = $_FILES;

        $limit = 0;
        if(!$evento["id_plano"]){
            $limit = 5;
        }
        $totalFotos = $this->db->get_where("midias",["id_album"=>$id_album])->num_rows();
        foreach($fotos as $foto){
            if($limit && $totalFotos == $limit){
                break;
            }
            $ext = strtolower(substr($foto['name'],-4));
            $new_name = "albumFotos/album".$id_album.time().$dadosUser["user"].$ext;
            move_uploaded_file($foto['tmp_name'], $new_name);
            $midia = array(
                "midia"=>base_url($new_name),
                "id_album"=>$id_album,
                "id_evento"=>$evento["id_evento"],
                "inclusao"=>time()
            );
            $this->db->insert("midias",$midia);
            $totalFotos++;
            
        }

        $quantidade = $this->db->get_where("midias",["id_album"=>$id_album])->num_rows();

        $this->db->update("albuns",["midias"=>$quantidade],["id_album"=>$id_album]);
        header('Content-Type: application/json');
        echo json_encode(["retorno"=>true]);
    }

    public function trocaCapa($id_album){
        
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $fotos = $_FILES;
        foreach($fotos as $foto){
            $ext = strtolower(substr($foto['name'],-4));
            $new_name = "albumFotos/capaalbum".$id_album.time().$dadosUser["user"].$ext;
            move_uploaded_file($foto['tmp_name'], $new_name);
           
            $this->db->update("albuns",["capa"=>base_url($new_name)],["id_album"=>$id_album]);

        }
       echo "<script>alert('oi');</script>";
    }

    public function novaIntroducao(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        iniAjax();
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $introducao = $this->db->get_where("introducao",["id_evento"=>$evento["id_evento"]])->row_array();
        $insert["titulo"] = $this->input->post("titulo");
        $insert["texto"] = $this->input->post("introducao");
        $insert["inclusao"] = time();
        $insert["ultimoUpdate"] = time();
        $insert["id_evento"] = $evento["id_evento"];

        if($introducao){
            $this->db->update("introducao",$insert,["id_introducao"=>$introducao["id_introducao"]]);
        }else{
            $this->db->insert("introducao",$insert);
        }
        $this->jphp->sucesso("Introdução atualizada com sucesso!");
        $this->jphp->redirect();
        $this->jphp->send();
    }

    public function novaPagina($id_pagina=false){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        iniAjax();
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $insert["titulo"] = $this->input->post("titulo");
        $insert["html"] = $this->input->post("html");
        $insert["inclusao"] = time();
        $insert["ultimoUpdate"] = time();
        $insert["id_evento"] = $evento["id_evento"];
        $insert["handle"] = geraSlug($insert["titulo"],"paginas","handle");
        if($id_pagina){
            $update = array(
                "titulo"=>$insert["titulo"],
                "html"=>$insert["html"]
            );
            $this->db->update("paginas",$update,["id_pagina"=>$id_pagina]);
            $msg = "Página alterada com sucesso!";
        }else{
            $this->db->insert("paginas",$insert);
            $msg = "Página criada com sucesso!";
        }

        $this->jphp->sucesso($msg);
        $this->jphp->redirect();
        $this->jphp->send();
    }

    public function enviaConvidadoMassa(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $arquivo = $_FILES['file']['tmp_name'];
        $arquivo = fopen($arquivo, 'r');
        $convidados = array();
        // Lê o conteúdo do arquivo

        while (!feof($arquivo)) {
            // Pega os dados da linha
            $linha = fgets($arquivo, 1024);

            // Divide as Informações das celular para poder salvar

            $dados = explode(';', $linha);
            //if ($dados[24] != "") {
            $convidados[] = $dados;
            //}
        }
        $insert = array();
        foreach($convidados as $i=>$convidado){
            if($i > 0){
                $insert = array(
                    "nomeConvidado"=>$convidado[0],
                    "sobrenomeConvidado"=>$convidado[1],
                    "emailConvidado"=>$convidado[2],
                    "telefoneConvidado"=>$convidado[3],
                    "id_evento"=>$evento["id_evento"],
                    "inclusao"=>time(),
                    "savedate"=>$evento["savedate"],
                    "status"=>"pendente"
                );
               
                $existe = $this->db->query("SELECT * FROM convidados WHERE savedate='".$evento["savedate"]."' AND (telefoneConvidado='".$insert["telefoneConvidado"]."' OR emailConvidado='".$insert["emailConvidado"]."')")->row_array();
                if(!$existe){
                    $this->db->insert("convidados",$insert);
                }
            }
        }
        echo "<script>window.location.reload(true);</script>";
    }

    public function novoUsuarioSistema($user=false){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        iniAjax();
        $this->load->model("Cadastro_model","Cadastro");
        $insert["nome"] = $this->input->post("nome");
        $insert["email"] = $this->input->post("email");
        $insert["telefone"] = $this->input->post("telefone");
        $insert["senha"] = md5($this->input->post("senha"));
        if($user){
            if($_POST["senha"] == ""){
                unset($insert["senha"]);
            }
            $this->db->update("usuario",$insert,["user"=>$user,"savedate"=>$dadosUser["savedate"]]);
            $cadastro = array("sucesso"=>true,"mensagem"=>"Usuário alterado com sucesso!");
        }else{
            $cadastro = $this->Cadastro->novoUsuario($insert,$dadosUser["savedate"]);
        }
        if($cadastro["sucesso"]){
            $this->jphp->sucesso($cadastro['mensagem']);
            $this->jphp->redirect();
        }else{
            $this->jphp->alert($cadastro['mensagem']);
        }
        
        $this->jphp->send();
    }

  

    public function novoCancelamento(){
        iniAjax();
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;

        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
       
        $email = $this->input->post("email");
        $senha = md5($this->input->post("senha"));
        
        $insert["motivo"] = $this->input->post("motivo");
        $insert["inclusao"] = time();
        $insert["id_evento"] = $evento["id_evento"];
        
        if($email == $dadosUser["email"] && $senha == $dadosUser["senha"] && $evento["status"] != "cancelado"){
            $this->db->insert("cancelamento",$insert);
            $this->db->update("evento",["status"=>"cancelado"],["id_evento"=>$evento["id_evento"]]);
            $this->jphp->sucesso("Evento cancelado com sucesso!");
            $this->jphp->redirect();
        }else{
            $this->jphp->alert("Seu dados de acesso não estão corretos.");
        }
        
        $this->jphp->send();
    }

    public function alteraDadosProtagonista($id_protagonista){
        iniAjax();
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;

        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
       
        $insert["firstName"] = $this->input->post("nome");
        $insert["lastName"] = $this->input->post("sobrenome");
        $insert["email"] = $this->input->post("email");
        $insert["telefone"] = $this->input->post("telefone");
        $insert["papel"] = $this->input->post("papel");
        $insert["descricao"] = $this->input->post("descricao");
       
        $this->db->update("protagonistas",$insert,["id_protagonista"=>$id_protagonista,"id_evento"=>$evento["id_evento"]]);
        $this->jphp->sucesso("Protagonista atualizado com sucesso!");
        if($insert["firstName"] != "" && $insert["lastName"] != "" && $insert["email"] != "" && $insert["telefone"] != "" && $insert["papel"] != "" && $insert["descricao"] != ""){
            $this->jphp->redirect(base_url("anfitrioes"));
        }else{
            $this->jphp->redirect();
        }
        
        $this->jphp->send();
    }

    public function imagemProtagonista($id_protagonista){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $fotos = $_FILES;
        foreach($fotos as $foto){
            $ext = strtolower(substr($foto['name'],-4));
            $new_name = "fotosProtagonistas/protagonista".$id_protagonista.time().$dadosUser["user"].".".$ext;
            move_uploaded_file($foto['tmp_name'], $new_name);
           
            $this->db->update("protagonistas",["foto"=>base_url($new_name)],["id_protagonista"=>$id_protagonista,"id_evento"=>$evento["id_evento"]]);

        }
    }

    public function deletarProtagonista($id_protagonista){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        if(isset($_POST["confirm"])){
            $protagonista = $this->db->get_where("protagonistas",["id_protagonista"=>$id_protagonista])->row_array();
            unlink(str_replace(base_url(),"",$protagonista["foto"]));
            $this->db->delete("protagonistas",["id_protagonista"=>$id_protagonista,"id_evento"=>$evento["id_evento"]]);
            $this->jphp->sucesso("Protagonista deletado com sucesso!");
            $this->jphp->redirect();
        }else{
            $this->jphp->confirm("Deseja deletar esse protagonista?",["Ok","Cancelar"]);
        }

        $this->jphp->send();
    }

    public function deletarPagina($id_pagina){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        if(isset($_POST["confirm"])){
            $this->db->delete("paginas",["id_pagina"=>$id_pagina,"id_evento"=>$evento["id_evento"]]);
            $this->jphp->sucesso("Página deletada com sucesso!");
            $this->jphp->redirect();
        }else{
            $this->jphp->confirm("Deseja deletar esse protagonista?",["Ok","Cancelar"]);
        }

        $this->jphp->send();
    }

    public function deletarConvidado($id_convidado){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        if(isset($_POST["confirm"])){
            $this->db->delete("convidados",["id_convidado"=>$id_convidado,"id_evento"=>$evento["id_evento"]]);
            $this->jphp->sucesso("Convidado deletado com sucesso!");
            $this->jphp->redirect();
        }else{
            $this->jphp->confirm("Deseja deletar esse convidado?",["Ok","Cancelar"]);
        }

        $this->jphp->send();
    }

    public function deletarUsuario($user){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        if(isset($_POST["confirm"])){
            $this->db->delete("usuario",["user"=>$user,"savedate"=>$evento["savedate"]]);
            $this->jphp->sucesso("Usuário deletado com sucesso!");
            $this->jphp->redirect(base_url("usuarios"));
        }else{
            $this->jphp->confirm("Deseja deletar esse usuário?",["Ok","Cancelar"]);
        }

        $this->jphp->send();
    }

    public function defineTemplate($template){
        iniAjax();
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $templates = array(
            "template_aniversario" => array(
                "corPrincipal"=>"#000000",
                "corTextoMenu"=>"#FFFFFF",
                "corTitulos"=>"#3B3E44",
                "corTitulosBanner"=>"#FFFFFF",
                "corComplementar"=>"#FA9362",
                "corTextosBanner"=>"#FFFFFF"
            ),
            "template_casamento" => array(
                "corPrincipal"=>"#CCB9D6",
                "corTextoMenu"=>"#FFFFFF",
                "corTitulos"=>"#3B3E44",
                "corTitulosBanner"=>"#FFFFFF",
                "corComplementar"=>"#FA9362",
                "corTextosBanner"=>"#FFFFFF"
            ),
            "template_baby" => array(
                "corPrincipal"=>"#E1AD84",
                "corTextoMenu"=>"#FFFFFF",
                "corTitulos"=>"#3B3E44",
                "corTitulosBanner"=>"#FFFFFF",
                "corComplementar"=>"#FA9362",
                "corTextosBanner"=>"#FFFFFF"
            ),
            "template_formatura" => array(
                "corPrincipal"=>"#000000",
                "corTextoMenu"=>"#FFFFFF",
                "corTitulos"=>"#3B3E44",
                "corTitulosBanner"=>"#FFFFFF",
                "corComplementar"=>"#FA9362",
                "corTextosBanner"=>"#FFFFFF"
            )
        );
        $insert = $templates[$template];
        $insert["template"] = $template;

        $templateBd = $this->db->get_where("config_template",["id_evento"=>$evento["id_evento"],"savedate"=>$evento["savedate"]])->row_array();
        $this->db->update("evento",["template"=>$template],["id_evento"=>$evento["id_evento"]]);
        if($templateBd){
            $this->db->update("config_template",$insert,["id_evento"=>$evento["id_evento"],"savedate"=>$evento["savedate"]]);
        }else{
            $insert["id_evento"] = $evento["id_evento"];
            $insert["savedate"] = $evento["savedate"];
            $this->db->insert("config_template",$insert);
        }
       
        $this->jphp->sucesso("Template alterado com sucesso");
        $this->jphp->redirect();

        $this->jphp->send();
    }

    public function novoAccessToken()
	{
		iniAjax();
		$this->load->library('Login', array('login' => true), 'login');
		$dadosUser = $this->login->usuario;
        $this->load->model("Savedate_model","Savedate");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

		$lang = array(
			"prodfisico" => "Produto Físico",
			"descricaonegocio" => "Descrição do seu negócio",
			"persontype" => "Tipo da conta",
			"persontype" => "Tipo da conta",
			"reponsavel_nome" => "Nome do responsável",
			"reponsavel_cpf" => "CPF do responsável",
			"nome" => "Nome",
			"cpf" => "CPF",
			"cnpj" => "CNPJ",
			"telefone" => "Telefone",
			"cep" => "CEP",
			"rua" => "Rua",
			"numero" => "Número",
			"bairro" => "Bairro",
			"cidade" => "Cidade",
			"estado" => "Estado",
			"tipo_conta" => "Tipo da conta",
			"banco" => "Banco",
			"agencia" => "Agência",
			"n_conta" => "Número da conta"
		);

		$errorMsg = array(
			"prodfisico" => "",
			"descricaonegocio" => "required",
			"persontype" => "",
			"persontype" => "",
			"reponsavel_nome" => "",
			"reponsavel_cpf" => "",
			"nome" => "required",
			"telefone" => "required",
			"cep" => "required",
			"rua" => "required",
			"numero" => "required",
			"bairro" => "required",
			"cidade" => "required",
			"estado" => "required",
			"tipo_conta" => "",
			"banco" => "required",
			"agencia" => "required",
			"n_conta" => "required"
		);

		$errorMsg["cpf"] = "required";
		$errorMsg["cnpj"] = "";

		if ($_POST["persontype"] == "juridica") {
			$errorMsg["cpf"] = "";
			$errorMsg["cnpj"] = "required";
			$errorMsg["responsavel_nome"] = "required";
			$errorMsg["responsavel_cpf"] = "required";
		}

		foreach ($_POST as $t => $c) {
			$this->form_validation->set_rules($t, $lang[$t], $errorMsg[$t], $this->msgError);
		}

		if ($this->form_validation->run() != FALSE) {
			$dadosUpdate = array(
				"prodfisico" => 'nao',
				"descricaonegocio" => $this->input->post("descricaonegocio"),
				"persontype" => "fisica",
				"nome" => $this->input->post("nome"),
				"telefone" => $this->input->post("telefone"),
				"cep" => $this->input->post("cep"),
				"rua" => $this->input->post("rua"),
				"numero" => $this->input->post("numero"),
				"bairro" => $this->input->post("bairro"),
				"cidade" => $this->input->post("cidade"),
				"estado" => $this->input->post("estado"),
				"tipo_conta" => $this->input->post("tipo_conta"),
				"banco" => $this->input->post("banco"),
				"agencia" => $this->input->post("agencia"),
				"n_conta" => $this->input->post("n_conta"),
				"documento" => $this->input->post("cpf"),
				"cadastroCompleto" => true,
				"currency" => "BRL"
			);
			

			$this->jphp->inputError(array());
			$this->db->update('evento', $dadosUpdate, array('id_evento' => $evento['id_evento']));
			if ($dadosUser["contaAtiva"]) {
				$this->jphp->executa("$('#proximopasso').modal('hide')");
			} else {
				$ret = $this->ativarConta();
                $this->jphp->sucesso($ret);
			}
			if ($dadosUser["contaAtiva"]) {
				$this->jphp->sucesso("Conta ativada com sucesso");
                $this->jphp->redirect();
			}
		} else {
			$this->jphp->notif("Erro ao ativar sua conta, confira seus dados antes de submeter a ativação novamente.", 'error');
		}

		$this->jphp->send();
	}

    public function ativarConta()
	{
		$this->load->library('Login', array('login' => true), 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $retorno = "erro";
		if ($evento["id_iugu"] == "") {
			$subConta = $this->Savedate->criarSubConta($evento);
			if ($subConta["success"]) {
				$evento = $subConta["dadosUser"];
			}
		}
		if (!$evento["contaAtiva"]) {
			$ativarSubConta = $this->Savedate->ativarSubConta($evento);
			$erros = "";
			$formatError = json_decode($ativarSubConta['erro'], true);
			file_put_contents('log/ativarConta.txt', print_r([$formatError], true) . "\r\n", FILE_APPEND);
            if (!empty($formatError)) {
				foreach ($formatError["errors"] as $res) {
					foreach ($res as $r) $erros .= $r . "\r\n";
				}
			}
			
			file_put_contents('log/ativarConta.txt', print_r([$subConta], true) . "\r\n", FILE_APPEND);
		}

        return $retorno;
            
		
			
	}

    public function repasse($evento){
        $taxa = 6;
        if($evento["repasseJuros"]){
            $this->db->update("presentes",["valorRepasse"=>0.00],["id_evento"=>$evento["id_evento"]]);
            $this->db->update("evento",["repasseJuros"=>false],["id_evento"=>$evento["id_evento"]]);
        }else{
            $presentes = $this->db->get_where("presentes",["id_evento"=>$evento["id_evento"]])->result_array();
            foreach($presentes as $presente){
                $valorRepasse = ($presente["valor"]/100)*$taxa;
                $this->db->update("presentes",["valorRepasse"=>$valorRepasse],["id_presente"=>$presente["id_presente"],"id_evento"=>$evento["id_evento"]]);
            }
            
            $this->db->update("evento",["repasseJuros"=>true],["id_evento"=>$evento["id_evento"]]);
        }
    }

    public function changeRepasse(){
        iniAjax();
        $this->load->library('Login', array('login' => true), 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $this->repasse($evento);
        $this->jphp->sucesso("Modelo de repasse alterado");
        $this->jphp->redirect();
        $this->jphp->send();
    }

    public function ativarAcompanhantes(){
        iniAjax();
        $this->load->library('Login', array('login' => true), 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
       
        if($evento["acompanhanteLista"]){
            $this->db->update("evento",["acompanhanteLista"=>false],["id_evento"=>$evento["id_evento"]]);
            $this->jphp->sucesso("Campo para acompanhates desativado com sucesso");
        }else{
            
            $this->db->update("evento",["acompanhanteLista"=>true],["id_evento"=>$evento["id_evento"]]);
            $this->jphp->sucesso("Campo para acompanhates ativado com sucesso");
        }
        $this->jphp->redirect();
        $this->jphp->send();
    }
		

    

    
    
   
}