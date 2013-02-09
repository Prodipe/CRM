<h1>Adicionar Usuário</h1>
<?php
	/*foreach($empresa as $e){
		echo $e['Empresa']['nome'];
	}
	exit;*/
	
	echo $this->Form->create('Usuario');
	echo $this->Form->input('matricula');
	echo $this->Form->input('nome');
	echo $this->Form->input('status');
	echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->end('Salvar');
?>