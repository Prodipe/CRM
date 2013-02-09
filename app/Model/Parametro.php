<?php
	class Parametro extends AppModel {
		public $belongsTo = 'Empresa'; //hasAndBelongsToMany
		
		public $validate = array(
			'descricao' => array(
				'rule' => 'notEmpty'
			),
			'valor' => array(
				'rule' => 'notEmpty'
			),
			'empresa_id' => array(
				'rule' => 'notEmpty'
			)
		);
	}
?>