<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model("Savedate_model","Savedate");
    }

    public function dashboard(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $d["convidados"] = $this->db->get_where("convidados",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["mensagens"] = count($this->db->get_where("mensagens",["id_evento"=>$evento["id_evento"]])->result_array());
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Dashboard";
        $d["nav"] = "dashboard";
        $d["page"] = "pages/dashboard";
        $d["scripts"] = array();
        $this->load->view("index",$d);
    }

    public function cadastro(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        
        $this->db->order_by("id_protagonista","DESC");
        $d["protagonistas"] = $this->db->get_where("protagonistas",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["endereco"] = $this->db->get_where("enderecos",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["evento"] = $evento;
        $d["evento"] = $evento;
        $d["dadosUser"] = $dadosUser;
        $d["title"] = "Cadastro";
        $d["nav"] = "cadastro";
        $d["page"] = "pages/cadastro";
        $d["scripts"] = array(
           );
        $this->load->view("index",$d);
    }

    public function assinaturas(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $d["fatura"] = $this->db->get_where("faturas_app",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["dadosUser"] = $dadosUser;
        $d["title"] = "Assinaturas";
        $d["evento"] = $evento;
        $d["nav"] = "assinaturas";
        $d["page"] = "pages/assinaturas";
        $d["scripts"] = array(
           );
        $this->load->view("index",$d);
    }

    public function convidados(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        if(!$dadosUser) redirect("Site/index");

        $this->db->order_by("id_convidado","DESC");
        if(isset($_GET["filtroNome"]) && $_GET["filtroNome"] != ""){
            $this->db->where("nomeConvidado LIKE","%".$_GET["filtroNome"]."%");
        }

        if(isset($_GET["filtroStatus"])){
            $this->db->where("status",$_GET["filtroStatus"]);
        }
        $d["convidados"] = $this->db->get_where("convidados",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["dadosUser"] = $dadosUser;
        $d["title"] = "Convidados";
        $d["nav"] = "convidados";
        $d["evento"] = $evento;
        $d["page"] = "pages/convidados";
        $d["filtroStatus"] = array(
            "confirmado" => "Confirmados",
            "pendente" => "Pendentes"
        );
        $d["scripts"] = array(
            base_url("assets/libs/dropzone/min/dropzone.min.js"),
           );
        $this->load->view("index",$d);
    }

    public function mensagens(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

        $mensagensBd = $this->db->get_where("mensagens",["id_evento"=>$evento["id_evento"]])->result_array();
        $mensagens = array();
        foreach($mensagensBd as $mensagem){
            $mensagens[$mensagem["status"]][] = $mensagem; 
        }  
      
        $d["mensagens"] = $mensagens;
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Mensagens";
        $d["nav"] = "mensagens";
        $d["page"] = "pages/mensagens";
        $d["scripts"] = array(
           );
        $this->load->view("index",$d);
    }

    public function alteraStatusMsg($id_mensagem,$status){
        iniAjax();
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $msgStatus = array(
            "reprovada"=>"reprovada",
            "aprovada"=>"aprovada"
        );

        if($this->db->update("mensagens",["status"=>$status],["id_mensagem"=>$id_mensagem,"id_evento"=>$evento["id_evento"]])){
            $this->jphp->sucesso("Mensagem ".$msgStatus[$status]. " com sucesso!");
        }
        $this->jphp->redirect();
        $this->jphp->send();
    }

    public function presentes(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $this->db->select("*");
        $this->db->from("faturas");
        $this->db->join("orders","orders.orderId=faturas.orderId");
        $this->db->join("clientes","clientes.id_cliente=faturas.id_cliente");
        $this->db->where("faturas.id_evento",$evento["id_evento"]);
        
        $d["presentes"] = $this->db->get()->result_array();
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Presentes";
        $d["nav"] = "presentes";
        $d["page"] = "pages/presentes";
        $d["filtroStatus"] = array(
            "confirmado" => "Confirmados",
            "pendente" => "Pendentes"
        );
        $d["scripts"] = array(
            base_url("assets/libs/dropzone/min/dropzone.min.js"),
           );
        $this->load->view("index",$d);
    }

    public function protagonistas(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        
        $this->db->order_by("id_protagonista","DESC");
        $d["protagonistas"] = $this->db->get_where("protagonistas",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Anfitriões";
        $d["nav"] = "anfitrioes";
        $d["page"] = "pages/protagonistas";
        $d["scripts"] = array(
           );
        $this->load->view("index",$d);
    }

    public function protagonista($id_protagonista){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        
        $d["protagonista"] = $this->db->get_where("protagonistas",["id_protagonista"=>$id_protagonista,"id_evento"])->row_array();

        $perfilCompleto = 0;
        if($d["protagonista"]["firstName"] != ""){
            $perfilCompleto+= 16.666666666666667;
        }
        
        if($d["protagonista"]["telefone"] != ""){
            $perfilCompleto+= 16.666666666666667;
        }
        if($d["protagonista"]["email"] != ""){
            $perfilCompleto+= 16.666666666666667;
        }
        if($d["protagonista"]["foto"] != ""){
            $perfilCompleto+= 16.666666666666667;
        }
        if($d["protagonista"]["papel"] != ""){
            $perfilCompleto+= 16.666666666666667;
        }
        if($d["protagonista"]["descricao"] != ""){
            $perfilCompleto+= 16.666666666666667;
        }
        $d["perfilCompleto"] = round($perfilCompleto,2);
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Anfitrião";
        $d["nav"] = "anfitriao";
        $d["page"] = "pages/protagonista";
        $d["scripts"] = array(
            base_url("assets/libs/dropzone/min/dropzone.min.js"),
           );
        $this->load->view("index",$d);
    }

    public function localevento(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $d["endereco"] = $this->db->get_where("enderecos",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Local do Evento";
        $d["nav"] = "localevento";
        $d["page"] = "pages/localevento";
        $d["scripts"] = array(
           );
        $this->load->view("index",$d);
    }

    public function listadepresentes(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $juros = 6;
        $d["juros"] = $juros;
        if(isset($_GET["filtroNome"])){
            $this->db->where("produto LIKE","%".$_GET["filtroNome"]."%");
        }
        $d["presentes"] = $this->db->get_where("presentes",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Lista de Presentes";
        $d["nav"] = "listadepresentes";
        $d["page"] = "pages/listapresentes";
        $d["filtroStatus"] = array(
            "confirmado" => "Confirmados",
            "pendente" => "Pendentes"
        );
        $d["scripts"] = array(
            base_url("assets/libs/dropzone/min/dropzone.min.js"),
           
           );
        $this->load->view("index",$d);
    }

    public function escolhaseulayout(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
       
        $d["evento"] = $evento;
        $d["dadosUser"] = $dadosUser;
        $d["title"] = "Escolha seu layout";
        $d["nav"] = "escolhaseulayout";
        $d["page"] = "pages/layouts";
        $d["scripts"] = array(
           );
        $this->load->view("index",$d);
    }

    public function avisoAssinatura($tipo){
        iniAjax();
        $tipos = array(
            "dominios"=>"Para ter acesso ao domínio personalizado, você precisa fazer o upgrade para o Plano Premium, deseja alterar seu plano agora?",
            "paginas"=>"Para ter acesso as páginas personalizadas, você precisa fazer o upgrade para o Plano Básico ou o Plano Premium, deseja alterar seu plano agora?",
        );

        if(isset($_POST["confirm"])){
            $this->jphp->redirect(base_url("assinaturas"));
        }else{
            $this->jphp->confirm($tipos[$tipo]);
        }
        $this->jphp->send();

    }

    public function dominiopersonalizado(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $d["dominios"] = $this->db->get_where("dominios",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Personalizar seu domínio";
        $d["nav"] = "dominiopersonalizado";
        $d["page"] = "pages/personalizardominio";
        $d["scripts"] = array(
           );
        $this->load->view("index",$d);
    }

    public function albunsmidia(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        // if($evento["id_plano"]==2){
        //     $this->db->order_by("posicao","ASC");
        //     $albunsBd = $this->db->get_where("albuns",["id_evento"=>$evento["id_evento"]])->result_array();
        //     $albuns = array();
        //     foreach($albunsBd as $album){
    
        //         $albuns[$album["posicao"]] = $album;
        //         if($album["titulo"] == ""){
        //             $albuns[$album["posicao"]]["titulo"] = "Álbum ".$album["posicao"];
        //         }
        //         $albuns[$album["posicao"]]["midias"] = $album["midias"]." Mídias";
        //         if($album["midias"] == 1){
        //             $albuns[$album["posicao"]]["midias"] = $album["midias"]." Mídia";
        //         }
        //     }
        //     $d["albuns"] = $albuns;
        //     $d["evento"] = $evento;
        //     $d["dadosUser"] = $dadosUser;
        //     $d["title"] = "Albúns de mídia";
        //     $d["nav"] = "albunsmidia";
        //     $d["page"] = "pages/albumfotos";
        //     $d["scripts"] = array(
        //         base_url("assets/libs/dropzone/min/dropzone.min.js"),
        //        );
        //     $this->load->view("index",$d);

        // }else{
            $this->db->order_by("posicao","ASC");
            $albunsBd = $this->db->get_where("albuns",["id_evento"=>$evento["id_evento"]])->result_array();
            $this->midias($albunsBd[0]["id_album"]);
       // }
    }
    
    public function midias($id_album){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $this->db->order_by("posicao","ASC");
        $album = $this->db->get_where("albuns",["id_album"=>$id_album,"id_evento"=>$evento["id_evento"]])->row_array();
        if($album["titulo"] == ""){
            $album["titulo"] = "Álbum ".$album["posicao"];
        }
        $d["album"] = $album;
        $d["midias"] = $this->db->get_where("midias",["id_album"=>$id_album])->result_array();
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Albúns de mídia";
        $d["nav"] = "albunsmidia";
        $d["page"] = "pages/midias";
        $d["scripts"] = array(
            base_url("assets/libs/dropzone/min/dropzone.min.js"),
           );
        $this->load->view("index",$d);
    }

    public function introducao(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $introducao = $this->db->get_where("introducao",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["introducao"] = $introducao;
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Introdução do Evento";
        $d["nav"] = "introducao";
        $d["page"] = "pages/introducao";
        $d["scripts"] = array(
            base_url("assets/libs/tinymce/tinymce.min.js"),
            base_url("assets/js/pages/form-editor.init.js")
           );
        $this->load->view("index",$d);
    }

    public function paginasPersonalizadas(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $paginas = $this->db->get_where("paginas",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["paginas"] = $paginas;
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Páginas personalizadas";
        $d["nav"] = "paginaspersonalizadas";
        $d["page"] = "pages/paginas";
        $d["scripts"] = array(
            base_url("assets/libs/tinymce/tinymce.min.js"),
            base_url("assets/js/pages/form-editor.init.js")
           );
        $this->load->view("index",$d);
    }

    public function contagemregressiva(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $paginas = $this->db->get_where("paginas",["id_evento"=>$evento["id_evento"]])->result_array();
        $d["paginas"] = $paginas;
        $d["dadosUser"] = $dadosUser;
        $d["title"] = "Contagem regressiva";
        $d["nav"] = "contagemregressiva";
        $d["page"] = "pages/timer";
        $d["scripts"] = array(
           );
        $this->load->view("index",$d);
    }

    public function usuarios(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        
        $this->db->order_by("user","DESC");
        $d["usuarios"] = $this->db->get_where("usuario",["savedate"=>$dadosUser["savedate"]])->result_array();
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Usuários";
        $d["nav"] = "usuarios";
        $d["page"] = "pages/usuarios";
        $d["scripts"] = array(
           );
        $this->load->view("index",$d);
    }

    public function cancelarevento(){
        $this->load->library('Login', ['login' => true], 'login');
		$dadosUser = $this->login->usuario;
        if(!$dadosUser) redirect("Site/index");
        $evento = $this->Savedate->getEvento($dadosUser["savedate"]);
        $cancelamento = $this->db->get_where("cancelamento",["id_evento"=>$evento["id_evento"]])->row_array();
        $d["evento"] = $evento;
        $d["cancelamento"] = $cancelamento;
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "Cancelamento do Evento";
        $d["nav"] = "cancelamento";
        $d["page"] = "pages/cancelarevento";
        $d["scripts"] = array(
            base_url("assets/libs/tinymce/tinymce.min.js"),
            base_url("assets/js/pages/form-editor.init.js")
           );
        $this->load->view("index",$d);
    }

    public function recuperarSenha(){
        iniAjax();
        $this->load->helper("email");
        $email = $this->input->post("email");

        $dadosUser = $this->db->query("SELECT email,nome,user FROM usuario WHERE email LIKE '$email'")->row_array();
        if($dadosUser){
            $novaSenha=random_str(8);
            $senhaCripto = md5($novaSenha);
            enviaEmail(array($dadosUser["email"], $dadosUser["email"]), array("mensagem" => "Você solicitou uma nova senha para acessar seu painel Salve a Data.</br> Segue sua nova senha: ".$novaSenha."</br></br> Acesse <a href='https://salveadata.com.br'>www.salveadata.com.br</a>", "assunto" => "Salve a Data: Recuperação de senha","altMensagem"=>"","anexo"=>""), 'PHP');
            $this->db->update("usuario",["senha"=>$senhaCripto],["user"=>$dadosUser["user"]]);
            $this->jphp->replace(".recSenhaAlvo","Foi enviado para seu e-mail sua nova senha, caso não encontre ele na sua caixa de entrada favor verificar na caixa de spam.");
        }else{
            $this->jphp->alert("Cadastro não encontrado em nossa base de dados.");
        }

        $this->jphp->send();
    }

    public function enviaEmail(){
        $this->load->helper("email");
        $emailcliente = "andreyleocadiodev@gmail.com";
        enviaEmail(array($emailcliente, $emailcliente), array("mensagem" => "Email de teste", "assunto" => "E-mail de teste busca senha: ".random_str(8),"altMensagem"=>"","anexo"=>""), 'PHP');
    }

    public function getDadosPlano(){
        iniAjax();
        $idPlano = $this->input->post("idplano");

        $plano = $this->db->get_where("planos",["id_plano"=>$idPlano])->row_array();

        $descricaoPlano = '<span class="descriptionPlanPayment col-8">'.$plano["nome"].'</span>
        <span class="pricePlanPayment col-4">R$'.nf($plano["valor"]).'</span>';
        $installments = "";

        for($i=1;$i<=6;$i++){
            if($i == 1){
                $valorParcelado = nf($plano["valor"]);
            }else{
                $valorParcelado = nf($plano["valorParcelado"]/$i);
            }
            $installments.="<option value'$i'>".$i."x de R$ $valorParcelado</option>";
        }
        $this->jphp->replace(".boxDescriptionPayment",$descricaoPlano);
        $this->jphp->replace(".totalFinal","R$".nf($plano["valor"]));
        $this->jphp->replace('[name="installments"]',$installments);
        $this->jphp->val('.id_plano',$plano["id_plano"]);
        $this->jphp->executa('scrolldiv("pagamento");');
        $this->jphp->send();
    }
   
}
