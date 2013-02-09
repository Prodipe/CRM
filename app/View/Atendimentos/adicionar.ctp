<h1>Adicionar Atendimento</h1>
<?php
	echo $this->Form->create('Atendimento');
	echo $this->Form->input('protocolo');
	echo $this->Form->input('data_hora');
	echo $this->Form->input('status');
	echo $this->Form->input('prioridade');
	echo $this->Form->input('plano_atendimento');
	echo $this->Form->input('observacoes', array('rows' => '3'));
	echo $this->Form->input('nota');
	echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->select('usuario_id', $usuario);
	echo $this->Form->select('cliente_id', $cliente);
	echo $this->Form->select('categoria_id', $categoria);
	echo $this->Form->end('Salvar');
?>