<h1>Adicionar Categoria</h1>
<?php
	echo $this->Form->create('Categoria');
	echo $this->Form->input('descricao', array('rows' => '3'));
	echo $this->Form->end('Salvar');
?>