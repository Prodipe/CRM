﻿<h2>Adicionar Usuário</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'usuarios', 'action' => 'index')); ?></p>

<?php
	/*foreach($empresa as $e){
		echo $e['Empresa']['nome'];
	}
	exit;*/
	
	echo $this->Form->create('Usuario');
	echo $this->Form->input('nome');
	echo $this->Form->input('matricula');
	echo $this->Form->input('status', array('options' => array('Ativo', 'Inativo'), 'empty' => '(Escolha um)'));
	//echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->input('empresa_id', array('options' => $empresa, 'empty' => '(Escolha um)'));
	echo $this->Form->end('Salvar');
?>