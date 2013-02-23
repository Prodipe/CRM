<h2>Mudar senha</h2>

<?php 
	if (AuthComponent::user('nivel_acesso') != 1) {
		echo $this->HTML->link('Voltar', array('controller' => 'usuarios', 'action' => 'index')); 
	}
	else {
		echo $this->HTML->link('Voltar', array('admin' => true, 'controller' => 'usuarios', 'action' => 'index')); 
	}
?>

<?php
	echo $this->Form->create('Usuario');
	echo $this->Form->input('password', array('label' => 'Nova senha', 'value' => ''));
	echo $this->Form->input('password_confirm', array('label' => 'Repita a senha:', 'type' => 'password'));
	echo $this->Form->end('Salvar');
?>