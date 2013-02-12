<h2>Editar informações do cliente</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'clientes', 'action' => 'index')); ?></p>

<?php
    echo $this->Form->create('Cliente');
    echo $this->Form->input('matricula');
	echo $this->Form->input('nome');
	//echo $this->Form->input('status');
	echo $this->Form->input('status', array('options' => array('Ativo', 'Inativo'), 'empty' => '(Escolha um)'));
	
	// Define a data no padrão Dia-Mês-Ano
	echo $this->Form->input('data_cadastro', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 80));
	
	echo $this->Form->input('email');
	echo $this->Form->input('telefone1');
	echo $this->Form->input('telefone2');
	//echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->input('empresa_id', array('options' => $empresa, 'empty' => '(Escolha um)'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');
?>