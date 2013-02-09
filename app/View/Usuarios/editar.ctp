<h1>Editar informações do usuário</h1>
<?php
    echo $this->Form->create('Usuario');
    echo $this->Form->input('matricula');
	echo $this->Form->input('nome');
	echo $this->Form->input('status');
	echo $this->Form->select('empresa_id', $empresa);
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');
?>