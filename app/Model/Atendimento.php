<?php
	class Atendimento extends AppModel {
		// Cria relacionamentos com as outras tabelas
		//public $hasMany = 'Categoria';
		public $belongsTo = array('Empresa', 'Usuario', 'Cliente', 'Categoria');
		
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
	}
?>