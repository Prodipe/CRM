﻿<?php
	class Atendimento extends AppModel {
		// Cria relacionamentos com as outras tabelas
		//public $hasMany = 'Categoria';
		public $belongsTo = array('Empresa', 'Usuario', 'Cliente', 'Categoria');
		
		// Define a busca
		public $actsAs = array('Search.Searchable');
		
		// Verifica os campos que não podem ficar vazios
		public $validate = array(
			'protocolo' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'data_hora' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'status' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'prioridade' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'plano_atendimento' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'nota' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'empresa_id' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'usuario_id' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'cliente_id' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'categoria_id' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
		);
		
		// Critérios de busca
		public $filterArgs = array(
			'protocolo' => array('type' => 'like'),
			'plano_atendimento' => array('type' => 'like'),
			'observacoes' => array('type' => 'like'),
			'status' => array('type' => 'query', 'method' => 'buscaStatus'),
			'nota' => array('type' => 'value'),
			'empresa' => array('type' => 'like', 'field' => array('Empresa.nome')),
			'usuario' => array('type' => 'like', 'field' => array('Usuario.nome')),
			'cliente' => array('type' => 'like', 'field' => array('Cliente.nome')),
			'prioridade' => array('type' => 'query', 'method' => 'buscaPrioridade'),
			//'categoria' => array('type' => 'like', 'field' => array('Categoria.descricao'))
			'categoria' => array('type' => 'query', 'method' => 'buscaCategoria', 'field' => array('Categoria.descricao'))
		);
		
		public function buscaStatus($data = array()) {
			$filtro = $data['status'];
			$conditions = array(
            'OR' => array(
                'Atendimento.status LIKE' => $filtro
            ));
			
			return $conditions;
		}
		
		public function buscaCategoria($data = array()) {
			$filtro = $data['categoria'];
			$conditions = array(
            'OR' => array(
                'Categoria.id LIKE' => $filtro
            ));
			
			return $conditions;
		}
		
		public function buscaPrioridade($data = array()) {
			$filtro = $data['prioridade'];
			$conditions = array(
            'OR' => array(
                'Atendimento.prioridade LIKE' => $filtro
            ));
			
			return $conditions;
		}
	}
?>