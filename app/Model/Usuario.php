<?php
	App::uses('AuthComponent', 'Controller/Component');

	class Usuario extends AppModel {
		public $name = 'Usuario';
	
		// Cria relacionamentos com as outras tabelas
		public $belongsTo = 'Empresa';
		public $hasMany = 'Atendimento';
		
		// Verifica os campos que não podem ficar vazios e define outras regras de validação
		public $validate = array(
			'nome' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'matricula' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'status' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'empresa_id' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'username' => array(
				array('rule' => 'notEmpty', 'message' => 'Preencha o campo'), 
				array('rule' => 'isUnique', 'message' => 'Este nome de usuário já existe')
			),
			'password' => array(
				array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
				array('rule' => array('minLength', 4), 'message' => 'A senha deve ter pelo menos quatro caracteres'),
				array('rule' => array('passCompare'), 'message' => 'As senhas não conferem')
			)
		);
		
		// Criptografia para a senha
		public function beforeSave($options = array()) {
			if (!empty($this->data['Usuario']['password'])) {
				$this->data['Usuario']['password'] = AuthComponent::password($this->data['Usuario']['password']);
			}
			return true;
		}
		
		public function passCompare() {
			return ($this->data[$this->alias]['password'] === $this->data[$this->alias]['password_confirm']);        
		}
	}
?>