<?php
	class Categoria extends AppModel {
		public $hasMany = 'Atendimento';
		//public $belongsTo = 'Atendimento';
	
		public $validate = array(
			'descricao' => array('rule' => 'notEmpty')
		);
	}
?>