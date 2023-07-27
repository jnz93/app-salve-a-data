<?php

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class MY_model extends CI_Model{

	// Variável que define o nome da tabela
	protected $table = "";
        protected $colId = "";
        public $data = null;

	/**
	 * Método Construtor
	 */
	function __construct(){
		parent::__construct();
	}

	/**
	 * 
	 * @param type $where
	 * @return int
	 */
	function Contar($where,$table=null){
		if(!is_array($where))
			return false;
		if($table==null)$table = $this->table;
		foreach($where as $k=> $v){
			$this->db->where($k, $v);
		}
		return $this->db->count_all_results($table);
	}

	/**
	 * Insere um registro na tabela
	 *
	 * @param array $data Dados a serem inseridos
	 *
	 * @return boolean
	 */
	function Insert($data,$table = null){
		if(is_null($table))$table = $this->table;
		if(!isset($data))
			return false;
		return $this->db->insert($table, $data);
	}

	/**
	 * Recupera um registro a partir de um ID
	 *
	 * @param integer $id ID do registro a ser recuperado
	 * @param string $idColName coluna que será buscado $id
	 * @return array
	 */
	function GetById($id, $idColName = NULL){
		if(is_null($idColName))$idColName = $this->colId;
		if(is_null($id))
			return false;
		$this->db->where($idColName, $id);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return $query->row_array();
		}else{
			return null;
		}
	}

	/**
	 * Recupera um registro a partir de um ID
	 *
	 * @param array(campo1=>valor1,campo2=>valor2) a ser recuperado
	 *
	 * @param array $col colunas a serem incluidas na resposta, padrão * todas
	 * @param string $forma para agrupar varios elementos em Where, AND | OR 
	 * 
	 * @return array
	 */
	function GetWhere($where, $col = array('*'), $forma = 'AND',$table = null){
		if(is_null($table))$table = $this->table;
		$wh = array();

		foreach($where as $k=> $v)
			$wh[] = "$k = '".addslashes($v)."'";
		$query = $this->db->query('SELECT '.implode(',', $col)." FROM $table WHERE ".implode(" $forma ", $wh));
		return $query->result_array();
	}

	/**
	 * Lista todos os registros da tabela
	 *
	 * @param string $sort Campo para ordenação dos registros
	 *
	 * @param string $order Tipo de ordenação: ASC ou DESC
	 *
	 * @return array
	 */
	function GetAll($sort, $order = 'asc'){
		$this->db->order_by($sort, $order);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return null;
		}
	}

	/**
	 * Atualiza um registro na tabela
	 *
	 * @param integer $int ID do registro a ser atualizado
	 *
	 * @param array $data Dados a serem editados
	 * @param array $where associativa condição onde os dados devem ser editados
	 * @return boolean
	 */
	function Update($data, $where,$table = null){
		if(is_null($table))$table = $this->table;
		if(!is_array($where) || !is_array($data))
			return false;

		foreach($where as $k=> $v){
			$this->db->where($k, $v);
		}
		return $this->db->update($table, $data);
	}

	/**
	 * Remove um registro na tabela
	 *
	 * @param integer $int ID do registro a ser removido
	 *
	 *
	 * @return boolean
	 */
	function Delete($where,$table = null){
		if(is_null($table))$table = $this->table;
		if(!is_array($where))
			return false;
		foreach($where as $k=> $v){
			$this->db->where($k, $v);
		}
		return $this->db->delete($table);
	}

}
