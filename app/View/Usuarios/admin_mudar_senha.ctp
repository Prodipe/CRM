<h2>Mudar senha</h2>

<?php
	echo $this->Form->create('Usuario');
	echo $this->Form->input('password', array('label' => 'Nova senha', 'value' => ''));
	echo $this->Form->input('password_confirm', array('label' => 'Repita a senha:', 'type' => 'password'));
	echo $this->Form->end('Salvar');
?>