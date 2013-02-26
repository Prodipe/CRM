<h2>Cadastrar Usuário</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'usuarios', 'action' => 'index')); ?></p>

<?php
	echo $this->Form->create('Usuario');
	echo $this->Form->input('nome', array('label' => 'Nome Completo'));
	echo $this->Form->input('username', array('label' => 'Nome de Usuário'));
	echo $this->Form->input('matricula', array('label' => 'Matrícula'));
	
	//$options = array('Ativo' => 'Ativo', 'Inativo' => 'Inativo');
	//echo $this->Form->input('status', array('label' => 'Status', 'options' => $options, 'empty' => '(Escolha um)'));
	echo $this->Form->input('status', array('label' => 'Status', 'options' => array('Inativo', 'Ativo'), 'empty' => '(Escolha um)'));
	
	//echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->input('empresa_id', array('options' => $empresa, 'empty' => '(Escolha um)'));
?>	
	<fieldset>
		<legend>Senha</legend>
		<?php //echo $this->Form->inputs(array('password', 'password_confirm' => array('type' => 'password')));?>
		<?php echo $this->Form->input('password', array('label' => 'Senha', 'value' => ''));?>
		<?php echo $this->Form->input('password_confirm', array('label' => 'Repita a senha:', 'type' => 'password'));?>
	<fieldset>
	
<?php echo $this->Form->end('Salvar');?>