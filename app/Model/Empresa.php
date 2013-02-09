<?php
	class Empresa extends AppModel {
		public $hasMany = array('Usuario','Cliente', 'Parametro', 'Atendimento');
		
		public $validate = array(
			'nome' => array(
				'rule' => 'notEmpty'
			),
			'razao_social' => array(
				'rule' => 'notEmpty'
			)
		);
	}
?>