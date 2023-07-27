<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuario_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'usuario';
        $this->colId = 'user';
    }

    function getUsuario($refino = array()) {
        $this->db->select('*');
        if (isset($refino['usuario'])) {
            $this->db->where('email', $refino['usuario']);
        } elseif (isset($refino['user'])) {
            $this->db->where('user', $refino['user']);
        } else {
            $this->db->where('user', -10);
        }
        // $query = $this->db->order_by('data','ASC');
        $query = $this->db->get('usuario');
        $campo = $query->row_array();

        return $campo;
    }

    function getContas($user) {
        $this->db->select('*');
        $this->db->where('user', $user);
        $query = $this->db->get('contas');
        $campo = $query->result_array();

        return $campo;
    }
    
    function getInstalacoesApp($user) {
        $this->db->select('*');
        $this->db->where('user_afiliado', $user);
        $query = $this->db->get('instalacoes_apps');
        $campo = $query->result_array();

        return $campo;
    }
    
    function getInstalacoesTodos() {
        $this->db->select('instalacoes_apps.*,usuario.nome');
        $this->db->from('instalacoes_apps');
        $this->db->join('usuario','usuario.user=instalacoes_apps.user_afiliado');
        $query = $this->db->get();
        $campo = $query->result_array();

        return $campo;
    }

    function getLink($id = '', $user = '', $id_afiliado = '') {
        $this->db->select('*');
        if ($id != '') {
            $this->db->where('id_produto', $id);
        }
        if ($user != '') {
            $this->db->where('user', $user);
        }
        if ($id_afiliado != '') {
            $this->db->where('link_afiliado', $id_afiliado);
        }
        $query = $this->db->get('produto_afiliado');
        $campo = $query->row_array();

        return $campo;
    }

    function getLinks($id = '', $user = '', $id_afiliado = '') {
        $this->db->select('*');
        if ($id != '') {
            $this->db->where('id_produto', $id);
        }
        if ($user != '') {
            $this->db->where('user', $user);
        }
        if ($id_afiliado != '') {
            $this->db->where('link_afiliado', $id_afiliado);
        }
        $query = $this->db->get('produto_afiliado');
        $campo = $query->result_array();

        return $campo;
    }
    
    function getLinksGeral($id = '', $user = '', $id_afiliado = '') {
        $this->db->select('usuario.nome,produto_afiliado.*');
        $this->db->from('produto_afiliado');
        $this->db->join('usuario','usuario.user=produto_afiliado.user');
        if ($id != '') {
            $this->db->where('produto_afiliado.id_produto', $id);
        }
        if ($user != '') {
            $this->db->where('produto_afiliado.user', $user);
        }
        if ($id_afiliado != '') {
            $this->db->where('produto_afiliado.link_afiliado', $id_afiliado);
        }
        $query = $this->db->get();
        $campo = $query->result_array();

        return $campo;
    }

    function addLink($dados) {
        $this->db->insert('produto_afiliado', $dados);
    }

    function insertClick($dados) {
        $this->db->insert('cliques', $dados);
    }

    function getCliques($user) {
        $this->db->select('*');
        $this->db->where('user', $user);
        $query = $this->db->get('cliques');
        $campo = $query->result_array();

        return $campo;
    }

    function getCliquesApp($user) {
        GLOBAL $produtos;
        $this->db->select('*');
        $this->db->where('user', $user);
        $query = $this->db->get('cliques');
        $campo = $query->result_array();
        $retorno = array();

        foreach ($campo as $row) {
            if (!isset($retorno[$row['id_produto']]['nomeProduto'])) {
                $retorno[$row['id_produto']]['nomeProduto'] = $produtos[$row['id_produto']]['produto'];
                $retorno[$row['id_produto']]['cliques']=1;
            }else{
                $retorno[$row['id_produto']]['cliques']++;
            }
        }

        return $retorno;
    }
    
    function getOrigemTrafego($user) {
        GLOBAL $produtos;
        $this->db->select('*');
        $this->db->where('user', $user);
        $query = $this->db->get('cliques');
        $campo = $query->result_array();
        $retorno = array();

        foreach ($campo as $row) {
            if (!isset($retorno[$row['origem']]['cliques'])) {
                $retorno[$row['origem']]['cliques']=1;
            }else{
                $retorno[$row['origem']]['cliques']++;
            }
        }
        

        return $retorno;
    }

}
