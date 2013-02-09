<?php
	class Usuario extends AppModel {
		public $belongsTo = 'Empresa';
		public $hasMany = 'Atendimento';
		
		public $validate = array(
			'nome' => array('rule' => 'notEmpty'),
			'matricula' => array('rule' => 'notEmpty'),
			'status' => array('rule' => 'notEmpty'),
			'empresa_id' => array('rule' => 'notEmpty')
		);
	}
?>