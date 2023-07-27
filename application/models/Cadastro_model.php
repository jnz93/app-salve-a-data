<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cadastro_model extends MY_model {
    public $trial = 3;
    public function __construct() {
        parent::__construct();
        
    }

    public function novoUsuario($dados,$savedate=false){
        $dados["inclusao"] = time();
        $retorno = ["sucesso"=>false,"mensagem"=>"Usuário não cadastrado"];
        $usuario = $this->db->get_where("usuario",["email"=>$dados["email"]])->row_array();
        if(!$usuario){
            $this->db->insert("usuario",$dados);
            $user = $this->db->insert_id();
            if(!$savedate){
                $savedate = $this->novoSaveDate($dados["nome"]);
            }
            if($this->db->update("usuario",["savedate"=>$savedate],["user"=>$user])){
                $retorno = ["sucesso"=>true,"mensagem"=>"Usuário adicionado com sucesso","user"=>$user];
            }
        }else{
            $retorno = ["sucesso"=>false,"mensagem"=>"E-mail já cadastrado no sistema"];
        }
        return $retorno;
    }

    public function novoSaveDate($nome){
        $insert["credVencimento"] = strtotime("+".$this->trial." days");
        $insert["nomeConta"] = $nome;
        $insert["slug"] = geraSlug($nome, "savedate", "slug");
        $insert["inclusao"] = time();
        $this->db->insert("savedate",$insert);
        $retorno = $this->db->insert_id();
        $this->novoEvento($nome,$retorno);
        return $retorno;
    }

    public function novoEvento($nome,$savedate){
        
        $insert["nome_evento"] = $nome;
        $insert["slug"] = geraSlug($nome, "evento", "slug");
        $insert["inclusao"] = time();
        $insert["savedate"] = $savedate;
        $this->db->insert("evento",$insert);
        $retorno = $this->db->insert_id();
        $this->criarAlbuns($retorno);
        return $retorno;
    }

    public function criarAlbuns($id_evento){
        $quantidade = 6;
        $insert["id_evento"] = $id_evento;
        $insert["inclusao"] = time();
        $insert["ultimoUpdate"] = time();

        for($i=1; $i <= $quantidade ;$i++){
            $insert["posicao"] = $i;
            $this->db->insert("albuns",$insert);
        }
       

        return true;
    }

}
