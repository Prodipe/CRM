<h2>Cadastrar Usuário</h2>

<!-- Link para voltar -->
<p><?php //echo $this->HTML->link('Voltar', array('controller' => 'usuarios', 'action' => 'index')); ?></p>

<?php
	echo $this->Form->create('Usuario');
	echo $this->Form->input('nome', array('label' => 'Nome Completo'));
	echo $this->Form->input('username', array('label' => 'Nome de Usuário'));
	echo $this->Form->input('password', array('label' => 'Senha', 'value' => ''));
	echo $this->Form->input('matricula', array('label' => 'Matrícula'));
	
	$options = array('Ativo' => 'Ativo', 'Inativo' => 'Inativo');
	echo $this->Form->input('status', array('label' => 'Status', 'options' => $options, 'empty' => '(Escolha um)'));
	//echo $this->Form->input('status', array('label' => 'Status', 'options' => array('Ativo', 'Inativo'), 'empty' => '(Escolha um)'));
	
	//echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->input('empresa_id', array('options' => $empresa, 'empty' => '(Escolha um)'));
	echo $this->Form->end('Salvar');
?>