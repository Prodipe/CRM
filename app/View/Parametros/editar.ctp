﻿<h2>Editar informações do parâmetro</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'parametros', 'action' => 'index')); ?></p>

<?php
    echo $this->Form->create('Parametro');
    echo $this->Form->input('descricao');
	echo $this->Form->input('valor');
	//echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->input('empresa_id', array('options' => $empresa, 'empty' => '(Escolha um)'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');
?>