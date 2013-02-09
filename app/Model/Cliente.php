<?php
	class Cliente extends AppModel {
		public $belongsTo = 'Empresa';
		public $hasMany = 'Atendimento';
		
		public $validate = array(
			'nome' => array(
				'rule' => 'notEmpty'
			),
			'matricula' => array(
				'rule' => 'notEmpty'
			),
			'status' => array(
				'rule' => 'notEmpty'
			),
			'data_cadastro' => array(
				'rule' => 'notEmpty'
			),
			'email' => array(
				'rule' => 'notEmpty'
			),
			'telefone1' => array(
				'rule' => 'notEmpty'
			),
			'empresa_id' => array(
				'rule' => 'notEmpty'
			)
		);
	}
?>