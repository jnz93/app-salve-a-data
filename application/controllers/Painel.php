<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Painel extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model("Savedate_model","Savedate");
    }

    public function emails($tipo="boasvindas"){
        
        $dadosEmail  = $this->db->get_where("emails",["tipo"=>$tipo])->row_array();
        $d["dadosEmail"] = $dadosEmail;
        $d["dadosUser"] = $dadosUser;
        $d["evento"] = $evento;
        $d["title"] = "E-mails";
        $d["nav"] = $tipo;
        $d["page"] = "painel/emails";
        $d["scripts"] = array();
        $this->load->view("indexpainel",$d);
    }


    public function salvaEmail(){
        iniAjax();
        $d["assunto"] = $this->input->post("assunto");
        $tipo = $this->input->post("tipo");
        $d["texto"] = $this->input->post("email");

        $this->db->update("emails",$d,["tipo"=>$tipo]);
       
        $this->jphp->sucesso("E-mail salvo com sucesso!");
        $this->jphp->redirect();
        $this->jphp->send();
    }

    public function envImg($tipo){
        header('Access-Control-Allow-Origin: *');
        $img=$_FILES["upload"];
      
        $this->db->insert("imagens_email",["tipo"=>$tipo,"inclusao"=>time(),"size"=>$img["size"]]);
        $id_img = $this->db->insert_id();
        $size = $img["size"];
        $type = explode("/",$img["type"])[1];
        $name = "imgEmails/".$id_img.".".$type;
        $url = base_url($name);
        move_uploaded_file($img['tmp_name'], $name);
        $this->db->update("imagens_email",["url"=>$url,"name"=>$name],["id_img"=>$id_img]);
        
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["uploaded"=>true,"filename"=> $url,"url"=> $url]);
    }

   
   
}
