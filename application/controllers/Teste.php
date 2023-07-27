<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Teste extends CI_Controller
{

    public function index(){
      $dados =  $this->db->get("email_stats")->result_array();
        //Arquivo txt
$arquivo = "email.txt";

//abrir arquivo txt 
$arq = fopen($arquivo,"w");
fwrite($arq, "teste");
      foreach($dados as $dado){
        fwrite($arq,$dado["email_address"]."\n");
      }
      fclose($arq);
    }
}
