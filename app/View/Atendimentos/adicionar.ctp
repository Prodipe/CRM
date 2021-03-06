﻿<h2>Adicionar Atendimento</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'atendimentos', 'action' => 'index')); ?></p>

<?php
	echo $this->Form->create('Atendimento');
	echo $this->Form->input('protocolo', array('label' => 'Protocolo'));
	
	// Define a data no padrão Dia-Mês-Ano
	echo $this->Form->input('data_hora', array('label' => 'Data de Cadastro', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 80));
	
	$status_options = array('Ativo' => 'Ativo', 'Inativo' => 'Inativo');
	$priori_options = array('Baixa' => 'Baixa', 'Média' => 'Média', 'Alta' => 'Alta');
	echo $this->Form->input('status', array('options' => $status_options, 'empty' => '(Escolha um)'));
	echo $this->Form->input('prioridade', array('options' => $priori_options, 'empty' => '(Escolha um)'));
	//echo $this->Form->input('status', array('options' => array('Ativo', 'Inativo'), 'empty' => '(Escolha um)'));
	//echo $this->Form->input('prioridade', array('options' => array('Baixa', 'Média', 'Alta'), 'empty' => '(Escolha um)'));
	
	echo $this->Form->input('plano_atendimento', array('label' => 'Plano de Atendimento'));
	echo $this->Form->input('observacoes', array('label' => 'Observações', 'rows' => '3'));
	echo $this->Form->input('nota');
	
	//echo $this->Form->select('empresa_id', $empresa);
	//echo $this->Form->select('usuario_id', $usuario);
	//echo $this->Form->select('cliente_id', $cliente);
	//echo $this->Form->select('categoria_id', $categoria);
	echo $this->Form->input('empresa_id', array('options' => $empresa, 'empty' => '(Escolha um)'));
	
	//echo $this->Form->input('usuario_id', array('options' => $usuario, 'empty' => '(Escolha um)'));
	//O id do usuário já é passado automaticamente, a partir do usuário que está logado
	echo $this->Form->input('usuario_id', array('type' => 'hidden', 'value' => AuthComponent::user('id')));
	
	echo $this->Form->input('cliente_id', array('options' => $cliente, 'empty' => '(Escolha um)'));
	echo $this->Form->input('categoria_id', array('options' => $categoria, 'empty' => '(Escolha um)'));
	echo $this->Form->end('Salvar');
?>