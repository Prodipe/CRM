<h3>Atendimento</h3>

<!-- Verifica o status do atendimento
		0 = 'Ativo' e 1 = 'Inativo' 
-->
<?php
/*
	if ($atendimento['Atendimento']['status'] == '0') {
		$status = "Ativo";
	}
	else {
		$status = "Inativo";
	}
*/	
?>

<!-- Verifica a prioridade do atendimento
	   0 = 'Baixa', 1 = 'Média' e 2 = 'Alta' 
-->
<?php
/* 
	if ($atendimento['Atendimento']['prioridade'] == '0') {
		$prioridade = "Baixa";
	}
	else if ($atendimento['Atendimento']['prioridade'] == '1') {
		$prioridade = "Média";
	}
	else {
		$prioridade = "Alta";
	}
*/	
?>

<p><?php echo "ID: " . $atendimento['Atendimento']['id']; ?></p>

<p><?php echo "Protocolo: " . $atendimento['Atendimento']['protocolo']; ?></p>

<!-- Define o formato da data/hora -->
<p><?php echo "Data/Hora: " . $this->Time->format('d-m-Y / H:i:s', $atendimento['Atendimento']['data_hora']); ?></p>

<p><?php echo "Status: " . $atendimento['Atendimento']['status']; //$status; ?></p>

<p><?php echo "Prioridade: " . $atendimento['Atendimento']['prioridade']; //$prioridade; ?></p>

<p><?php echo "Plano de atendimento: " . $atendimento['Atendimento']['plano_atendimento']; ?></p>

<p><?php echo "Observações: " . $atendimento['Atendimento']['observacoes']; ?></p>

<p><?php echo "Nota Recebida: " . $atendimento['Atendimento']['nota']; ?></p>

<p><?php echo "Empresa: " . $atendimento['Empresa']['nome']; ?></p>

<p><?php echo "Usuário: " . $atendimento['Usuario']['nome']; ?></p>

<p><?php echo "Cliente: " . $atendimento['Cliente']['nome']; ?></p>

<p><?php echo "Categoria: " . $atendimento['Categoria']['descricao']; ?></p>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Ir para atendimentos', array('controller' => 'atendimentos', 'action' => 'index')); ?></p>