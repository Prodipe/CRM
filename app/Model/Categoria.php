<?php
	class Categoria extends AppModel {
		// Cria relacionamentos com as outras tabelas
		public $hasMany = 'Atendimento';
		//public $belongsTo = 'Atendimento';
	
		// Verifica os campos que não podem ficar vazios
		public $validate = array(
			'descricao' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo')
		);
	}
?>