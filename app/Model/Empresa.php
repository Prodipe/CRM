<?php
	class Empresa extends AppModel {
		// Cria relacionamentos com as outras tabelas
		public $hasMany = array('Usuario', 'Cliente', 'Parametro', 'Atendimento');
		
		// Verifica os campos que não podem ficar vazios
		// O nome da empresa é único
		public $validate = array(
			'nome' => array(
				'nome_vazio' => array(
					'rule' => 'notEmpty',
					'message' => 'Preencha o campo'
				),
				'nome_unico' => array(
					'rule' => 'isUnique',
					'message' => 'O nome desta empresa já existe'
				),
			),
			'razao_social' => array(
				'rule' => 'notEmpty',
				'message' => 'Preencha o campo'
			)
		);
	}
?>