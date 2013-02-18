<?php
	App::uses('AuthComponent', 'Controller/Component');

	class Usuario extends AppModel {
		public $name = 'Usuario';
	
		// Cria relacionamentos com as outras tabelas
		public $belongsTo = 'Empresa';
		public $hasMany = 'Atendimento';
		
		// Verifica os campos que não podem ficar vazios
		public $validate = array(
			'nome' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'matricula' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'status' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'empresa_id' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'username' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'password' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo')
		);
		
		// Criptografia para a senha
		public function beforeSave($options = array()) {
			if (!empty($this->data['Usuario']['password'])) {
				$this->data['Usuario']['password'] = AuthComponent::password($this->data['Usuario']['password']);
			}
			return true;
		}
	}
?>