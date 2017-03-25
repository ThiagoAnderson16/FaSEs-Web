<?php

class Projeto_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'projeto';
    }

    function Inserir_ideia($table, $data) {
        if (!isset($data) || !isset($table))
            return false;
        return $this->db->insert($table, $data);
    }
    
    function GetStart($table) {
        $data['projeto'] = $this->db->get($table, 4, 0)->result();
        $data['projeto2'] = $this->db->get($table, 4, 4)->result();
        
        return $data;
  }

    /**
     * Formata os contatos para exibição dos dados na home
     *
     * @param array $contatos Lista dos contatos a serem formatados
     *
     * @return array
     * 
     * FAZER FUNÇÕES ESPECÍFICAS
     * 
     */
}
