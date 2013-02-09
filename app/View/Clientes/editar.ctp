<h1>Editar informações do cliente</h1>
<?php
    echo $this->Form->create('Cliente');
    echo $this->Form->input('matricula');
	echo $this->Form->input('nome');
	echo $this->Form->input('status');
	echo $this->Form->input('data_cadastro');
	echo $this->Form->input('email');
	echo $this->Form->input('telefone1');
	echo $this->Form->input('telefone2');
	echo $this->Form->select('empresa_id', $empresa);
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');
?>