<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dominios extends CI_Controller
{
  public function check_domain_availability($fqdn, $parameters) {
    $client = new AvailClient();
    $client->setParam($parameters);
    $response = $client->send_query($fqdn);
    return $response;
  }

  public function testebuscaDominio($dominio){

    require "Avail.php";
   
    $atrib = array(
      "lang"        => 0,            # EN (PT = 1)
      "server"      => SERVER_ADDR,
      "port"        => SERVER_PORT,
      "cookie_file" => COOKIE_FILE,
      "ip"          => "",
      "suggest"     => 0,            # No tmdomain suggestions
    );
  
    $domain_info = $this->check_domain_availability($dominio, $atrib);
    echo "<pre>";
    print_r($domain_info);
    echo nl2br($domain_info);
   
  }

  public function buscaDominio($dominio){

      require "Avail.php";
     
      $atrib = array(
        "lang"        => 0,            # EN (PT = 1)
        "server"      => SERVER_ADDR,
        "port"        => SERVER_PORT,
        "cookie_file" => COOKIE_FILE,
        "ip"          => "",
        "suggest"     => 0,            # No domain suggestions
      );
    
      $domain_info = $this->check_domain_availability($dominio, $atrib);
     
      $existe = preg_match("/Registered/",nl2br($domain_info));
      return $existe;
    }

    public function consultaDominio(){
      iniAjax();
      $dominio = $this->input->post("dominio");
      $existe = $this->buscaDominio($dominio);
      if($existe){
        $msg = "Domínio já registrado.";
        $this->jphp->addClass(".retornoDominio","indisponivel");
        $this->jphp->removeClass("disponivel",".retornoDominio");
      }else{
        $msg = "Domínio disponível para registro.";
        $this->jphp->addClass(".retornoDominio","disponivel");
        $this->jphp->removeClass("indisponivel",".retornoDominio");
      }
      $this->jphp->replace(".retornoDominio",$msg);
      $this->jphp->send();
    }

    public function addDominio(){
      iniAjax();
      $this->load->model("Savedate_model","Savedate");
      $this->load->library('Login', ['login' => true], 'login');
		  $dadosUser = $this->login->usuario;
      $evento = $this->Savedate->getEvento($dadosUser["savedate"]);

      $dominio = $this->input->post("dominio");
      $existe = $this->buscaDominio($dominio);
      $existeBd = $this->db->get_where("dominios",["dominio"=>$dominio,"id_evento"=>$evento["id_evento"]])->row_array();

      if(!$existe && !$existeBd){
        $this->db->insert("dominios",["dominio"=>$dominio,"id_evento"=>$evento["id_evento"],"inclusao"=>time()]);
        $this->jphp->sucesso("Domínio adicionado com sucesso.");
        $this->jphp->redirect();
      }else{
        $this->jphp->alert("Dominio não esta disponível.");
      }
      $this->jphp->send();
    }
}
