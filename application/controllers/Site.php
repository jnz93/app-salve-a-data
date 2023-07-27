<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{

    public function index(){
        $d["titulo"] = "Organize seu evento<br> de forma prática com o <br>Salve a Data.";
        $d["bt_criar_site"] = "Criar um site";
        $d["titulo_personalize"] = "Personalize o seu layout e tenha uma página exclusiva!";
        $d["texto_personalize"] = "No Save The Date você pode personalizar os Layouts disponibilizados e criar um visual completamente seu.";

        $this->load->view("site",$d);
    }

    public function contato(){
        $d["titulo"] = "Organize e planeje<br> seu evento de forma prática e segura com Salve a Data.";
        $d["bt_criar_site"] = "Criar um site";
        $d["titulo_personalize"] = "Personalize o seu layout e tenha uma página exclusiva!";
        $d["texto_personalize"] = "No Save The Date você pode personalizar os Layouts disponibilizados e criar um visual completamente seu.";

        $this->load->view("contato",$d);
    }
}
