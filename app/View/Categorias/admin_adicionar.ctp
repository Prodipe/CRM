<h2>Adicionar Categoria</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'categorias', 'action' => 'index')); ?></p>

<?php
	echo $this->Form->create('Categoria');
	echo $this->Form->input('descricao', array('label' => 'Descrição', 'rows' => '3'));
	echo $this->Form->end('Salvar');
?>