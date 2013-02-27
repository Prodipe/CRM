﻿<h2>Editar informações do usuário</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'usuarios', 'action' => 'index')); ?></p>

<p><?php echo $this->HTML->link('Mudar senha do usuário', array('controller' => 'usuarios', 'action' => 'mudar_senha', $usuario['Usuario']['id'])); ?></p>

<?php
    echo $this->Form->create('Usuario');
	echo $this->Form->input('nome');
	
	echo $this->Form->input('username', array('label' => 'Nome de Usuário'));
	//echo $this->Form->input('password', array('label' => 'Nova Senha')); Opção trocar senha
	
    echo $this->Form->input('matricula');
	
	//$options = array('Ativo' => 'Ativo', 'Inativo' => 'Inativo');
	//echo $this->Form->input('status', array('options' => $options, 'empty' => '(Escolha um)'));
	echo $this->Form->input('status', array('options' => array('Inativo', 'Ativo'), 'empty' => '(Escolha um)'));
	
	//echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->input('empresa_id', array('options' => $empresa, 'empty' => '(Escolha um)'));
    echo $this->Form->input('id', array('type' => 'hidden'));
?>	

<!-- Torna um usuário comum que já está ativo em administrador -->

<?php if (($usuario['Usuario']['status'] == 1) && ($usuario['Usuario']['nivel_acesso'] != 1)) { ?>

	<h2><?php echo "Tornar usuário em administrador"; ?></h2>
    
	<?php echo $this->Form->checkbox('nivel_acesso', array('value' => 1)); ?>
	
<?php } ?>

<?php echo $this->Form->end('Salvar'); ?>