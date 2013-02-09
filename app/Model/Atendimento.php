<?php
	class Atendimento extends AppModel {
		//public $hasMany = 'Categoria';
		public $belongsTo = array('Empresa', 'Usuario', 'Cliente', 'Categoria');
	
		public $validate = array(
			'protocolo' => array('rule' => 'notEmpty'),
			'data_hora' => array('rule' => 'notEmpty'),
			'status' => array('rule' => 'notEmpty'),
			'prioridade' => array('rule' => 'notEmpty'),
			'plano_atendimento' => array('rule' => 'notEmpty'),
			'nota' => array('rule' => 'notEmpty'),
			'empresa_id' => array('rule' => 'notEmpty'),
			'usuario_id' => array('rule' => 'notEmpty'),
			'cliente_id' => array('rule' => 'notEmpty'),
			'categoria_id' => array('rule' => 'notEmpty'),
		);
	}
?>