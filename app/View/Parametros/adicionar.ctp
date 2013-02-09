<h1>Adicionar Parâmetro</h1>
<?php
	echo $this->Form->create('Parametro');
	echo $this->Form->input('descricao', array('rows' => '3'));
	echo $this->Form->input('valor');
	echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->end('Salvar');
?>