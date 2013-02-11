<h2>Adicionar Empresa</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'empresas', 'action' => 'index')); ?></p>

<?php
	echo $this->Form->create('Empresa');
	echo $this->Form->input('nome');
	echo $this->Form->input('razao_social', array('rows' => '3'));
	echo $this->Form->end('Salvar');
?>