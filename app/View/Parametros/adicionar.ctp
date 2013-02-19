<h2>Adicionar Parâmetro</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'parametros', 'action' => 'index')); ?></p>

<?php
	echo $this->Form->create('Parametro');
	echo $this->Form->input('descricao', array('label' => 'Descrição', 'rows' => '3'));
	echo $this->Form->input('valor', array('label' => 'Valor'));
	//echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->input('empresa_id', array('options' => $empresa, 'empty' => '(Escolha um)'));
	echo $this->Form->end('Salvar');
?>