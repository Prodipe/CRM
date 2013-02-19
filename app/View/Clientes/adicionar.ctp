<h2>Adicionar Cliente</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'clientes', 'action' => 'index')); ?></p>

<?php
	echo $this->Form->create('Cliente');
	echo $this->Form->input('nome', array('label' => 'Nome Completo'));
	echo $this->Form->input('matricula', array('label' => 'Matrícula'));
	
	$options = array('Ativo' => 'Ativo', 'Inativo' => 'Inativo');
	echo $this->Form->input('status', array('options' => $options, 'empty' => '(Escolha um)'));
	//echo $this->Form->input('status', array('options' => array('Ativo', 'Inativo'), 'empty' => '(Escolha um)'));
	
	// Define a data no padrão Dia-Mês-Ano
	echo $this->Form->input('data_cadastro', array('label' => 'Data de Cadastro', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 80));
	
	echo $this->Form->input('email', array('label' => 'Email'));
	echo $this->Form->input('telefone1', array('label' => 'Telefone 1'));
	echo $this->Form->input('telefone2', array('label' => 'Telefone 2'));
	
	//echo $this->Form->select('empresa_id', $empresa);
	echo $this->Form->input('empresa_id', array('options' => $empresa, 'empty' => '(Escolha um)'));
	echo $this->Form->end('Salvar');
?>