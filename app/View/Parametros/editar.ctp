<h1>Editar informações do parâmetro</h1>
<?php
    echo $this->Form->create('Parametro');
    echo $this->Form->input('descricao');
	echo $this->Form->input('valor');
	echo $this->Form->select('empresa_id', $empresa);
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');
?>