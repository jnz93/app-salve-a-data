<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        iniAjax();
    }

    public function populaEnderecoCep(){
        $cep = $this->input->post("cep");
        $dados = viaCep($cep);

        $this->jphp->val(".logradouro",$dados["logradouro"]);
        $this->jphp->val(".bairro",$dados["bairro"]);
        $this->jphp->val(".cidade",$dados["localidade"]);
        $this->jphp->val(".estado",$dados["uf"]);
        //print_r($dados);
        $this->jphp->send();
    }

    public function populaEnderecoCepCheckout(){
        $cep = $this->input->post("cep");
        $dados = viaCep($cep);

        $this->jphp->val("[name='logradouro']",$dados["logradouro"]);
        $this->jphp->val("[name='bairro']",$dados["bairro"]);
        $this->jphp->val("[name='cidade']",$dados["localidade"]);
        $this->jphp->val("[name='uf']",$dados["uf"]);
        //print_r($dados);
        $this->jphp->send();
    }

    public function modalPresente($id_presente){
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $presente = $this->db->get_where("presentes",["id_presente"=>$id_presente,"id_evento"=>$evento["id_evento"]])->row_array();
        $this->jphp->attr(".card .card-img-top","src",$presente["imagem"]);
        $this->jphp->replace(".modal-body .card .card-title",$presente["produto"]);
        $this->jphp->replace(".modal-body .card .card-text",$presente["descricao"]);
        $this->jphp->replace(".modal-body .card .list-group .list-group-item","R$ ".nf($presente["valor"]));
        
        $this->jphp->executa("$('#visualizaPresente').modal('show')");
        $this->jphp->send();
    }

    public function deletarMidia($id_midia,$id_album){
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        if(isset($_POST["confirm"])){
            $this->db->delete("midias",["id_midia"=>$id_midia,"id_evento"=>$evento["id_evento"]]);
            
            $quantidade = $this->db->get_where("midias",["id_album"=>$id_album])->num_rows();
            $this->db->update("albuns",["midias"=>$quantidade],["id_album"=>$id_album]);
            $this->jphp->sucesso("Mídia deletada com sucesso!");
            $this->jphp->redirect();
        }else{
            $this->jphp->confirm("Deseja deletar essa mídia?");
        }

        $this->jphp->send();
    }

    public function alteraNomeAlbum($id_album){
        $this->load->model("Savedate_model","Savedate");
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $titulo = $this->input->post("titulo");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $this->db->update("albuns",["titulo"=>$titulo],["id_album"=>$id_album,"id_evento"=>$evento["id_evento"]]);

        $this->jphp->sucesso("Titulo alterado com sucesso!");
        $this->jphp->redirect();
        $this->jphp->send();
    }

    public function sair()
	{
		$this->load->library('Login', NULL, 'login');
		$this->login->deslogar();
		$this->jphp->redirect('self');
		$this->jphp->send();
	}

    public function login()
	{
		$this->load->library('Login', NULL, 'login');
		if ($this->login->usuario) {
			$this->jphp->redirect(base_url("cadastro"));
		} else {
			$msg = $this->login->getMensagem();
			$this->jphp->alert($msg);
		}

		$this->jphp->send();
	}

    public function enviarContato(){
        iniAjax();
        $email = $this->input->post("email");
        $nome = $this->input->post("nome");
        $sou = $this->input->post("sou");
        $tipoContato = $this->input->post("tipoContato");
        $assunto = $this->input->post("assunto");
        $mensagem = $this->input->post("mensagem");

        if (!$nome || !$email || !$mensagem || !$sou || !$tipoContato || !$assunto) {
			$this->jphp->alert('Todos os campos são obrigatórios');
			$this->jphp->send();
			return;
		}

		$mensagemWhats = "Oi, meu nome é $nome, sou $sou, meu contato é para $assunto, meu email é $email e gostaria de: $mensagem";
		$this->load->helper('url');


		$this->jphp->executa("window.open('https://wa.me/555596880204/?text=$mensagemWhats', '_blank')");

        $this->jphp->send();
    }


    public function teste(){
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        if(1 == 1){
            echo "verdadeiro";
        }

        if(1 != 2){
            echo "verdadeiro";
        }

        if(1 > 0){
            echo "verdadeiro";
        }

        if(2 < 4){
            echo "verdadeiro";
        }

        if(3 <= 2){
            echo "verdadeiro";
        }elseif(4 <= 2){
            echo "verdadeiro";
        }else{
            echo "falsa";
        }

        if(3 >= 4){
            echo "verdadeiro";
        }else{
            echo "falso";
        }



    }

    
   
}