<?php
	class Cliente extends AppModel {
		// Cria relacionamentos com as outras tabelas
		public $belongsTo = 'Empresa';
		public $hasMany = 'Atendimento';
		
		// Define a busca
		public $actsAs = array('Search.Searchable');
		
		// Verifica os campos que não podem ficar vazios
		public $validate = array(
			'nome' => array(
				'rule' => 'notEmpty',
				'message' => 'Preencha o campo'
			),
			'matricula' => array(
				'rule' => 'notEmpty',
				'message' => 'Preencha o campo'
			),
			'status' => array(
				'rule' => 'notEmpty',
				'message' => 'Preencha o campo'
			),
			'data_cadastro' => array(
				'rule' => 'notEmpty',
				'message' => 'Preencha o campo'
			),
			'email' => array(
				'rule' => 'notEmpty',
				'message' => 'Preencha o campo'
			),
			'telefone1' => array(
				'rule' => 'notEmpty',
				'message' => 'Preencha o campo'
			),
			'empresa_id' => array(
				'rule' => 'notEmpty',
				'message' => 'Preencha o campo'
			),
		);
		
		// Critérios de busca
		public $filterArgs = array(
			'nome' => array('type' => 'like'),
			'username' => array('type' => 'like'),
			'matricula' => array('type' => 'like'),
			'status' => array('type' => 'query', 'method' => 'buscaStatus'),
			'email' => array('type' => 'like'),
			'telefone1' => array('type' => 'like'),
			'data_cadastro' => array('type' => 'value', 'field' => 'Cliente.data_cadastro BETWEEN ? AND ?'),
			'empresa' => array('type' => 'like', 'field' => array('Empresa.nome'))
		);
		
		public function buscaStatus($data = array()) {
			$filtro = $data['status'];
			$conditions = array(
            'OR' => array(
                'Cliente.status LIKE' => $filtro
            ));
			return $conditions;
		}
		/*
		public function buscaData($data = array()) {
			$filtro = $data['data_cadastro'];
			$conditions = array(
            'OR' => array(
                'Cliente.data_cadastro LIKE' => '%' . $filtro . '%'
            ));
			return $conditions;
		}*/
	}
?>