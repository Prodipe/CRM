<?php
	class Parametro extends AppModel {
		// Cria relacionamentos com as outras tabelas
		public $belongsTo = 'Empresa'; //hasAndBelongsToMany
		
		// Verifica os campos que não podem ficar vazios
		public $validate = array(
			'descricao' => array(
				'rule' => 'notEmpty', 
				'message' => 'Preencha o campo'
			),
			'valor' => array(
				'rule' => 'notEmpty',
				'message' => 'Preencha o campo'
			),
			'empresa_id' => array(
				'rule' => 'notEmpty',
				'message' => 'Preencha o campo'
			)
		);
	}
?>