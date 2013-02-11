<?php
	class Cliente extends AppModel {
		// Cria relacionamentos com as outras tabelas
		public $belongsTo = 'Empresa';
		public $hasMany = 'Atendimento';
		
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
			)
		);
	}
?>