<h3>Cliente</h3>

<!-- Verifica o status do cliente
		0 = 'Ativo' e 1 = 'Inativo' 
-->
<?php 
	if ($cliente['Cliente']['status'] == '0') {
		$status = "Ativo";
	}
	else {
		$status = "Inativo";
	}
?>

<p><?php echo "ID: " . $cliente['Cliente']['id']; ?></p>

<p><?php echo "Matrícula: " . $cliente['Cliente']['matricula']; ?></p>

<p><?php echo "Nome: " . $cliente['Cliente']['nome']; ?></p>

<p><?php echo "Status: " . $status; ?></p>

<!-- Define o formato da data/hora -->
<p><?php echo "Data de Cadastro: " . $this->Time->format('d-m-Y / H:i:s', $cliente['Cliente']['data_cadastro']); ?></p>

<p><?php echo "Email: " . $cliente['Cliente']['email']; ?></p>

<p><?php echo "Telefone 1: " . $cliente['Cliente']['telefone1']; ?></p>

<p><?php echo "Telefone 2: " . $cliente['Cliente']['telefone2']; ?></p>

<p><?php echo "Empresa: " . $cliente['Empresa']['nome']; ?></p>

<h3>Atendimentos do Cliente</h3>

<!-- Cadastrar um atendimento para o cliente -->
<?php //echo $this->Html->link('Novo Atendimento', array('controller' => 'atendimentos', 'action' => 'adicionar', $cliente['Cliente']['id'])); ?>
<?php echo $this->Html->link('Novo Atendimento', array('controller' => 'clientes', 'action' => 'atendimentos', $cliente['Cliente']['id'])); ?>
<?php //echo $this->Html->link('Novo Atendimento', array('controller' => 'atendimentos', 'action' => 'clientes', $cliente['Cliente']['id'])); ?>

<table>
	<tr>
		<th>Id</th>
		<th>Categoria</th>
        <th>Protocolo</th>
        <th>Data/Hora</th>
		<th>Status</th>
		<th>Prioridade</th>
		<th>Plano</th>
		<th>Observações</th>
		<th>Nota Recebida</th>
		<th>Empresa</th>
		<th>Usuário</th>
    </tr>
	<?php foreach ($atendimentos as $atendimento): ?>

	<!-- Verifica o status do atendimento
			0 = 'Ativo' e 1 = 'Inativo' 
	-->
	<?php 
		if ($atendimento['Atendimento']['status'] == '0') {
			$status = "Ativo";
		}
		else {
			$status = "Inativo";
		}
	?>

	<!-- Verifica a prioridade do atendimento
		   0 = 'Baixa', 1 = 'Média' e 2 = 'Alta' 
	-->
	<?php 
		if ($atendimento['Atendimento']['prioridade'] == '0') {
			$prioridade = "Baixa";
		}
		else if ($atendimento['Atendimento']['prioridade'] == '1') {
			$prioridade = "Média";
		}
		else {
			$prioridade = "Alta";
		}
	?>
	
	<tr>
		<td><?php echo $this->Html->link($atendimento['Atendimento']['id'], array('controller' => 'atendimentos', 'action' => 'ver', $atendimento['Atendimento']['id'])); ?>
		</td>
		<td>
			<?php echo $this->HTML->link($atendimento['Categoria']['descricao'], array('controller' => 'categorias', 'action' => 'ver', $atendimento['Atendimento']['categoria_id'])); ?>
		</td>
		<td><?php echo $atendimento['Atendimento']['protocolo']; ?></td>
		<td>
			<?php echo $this->Time->format('d-m-Y / H:i:s', $atendimento['Atendimento']['data_hora']); ?> 
		</td>
		<td><?php echo $status; ?></td>
		<td><?php echo $prioridade; ?></td>
		<td><?php echo $atendimento['Atendimento']['plano_atendimento']; ?></td>
		<td><?php echo $atendimento['Atendimento']['observacoes']; ?></td>
		<td><?php echo $atendimento['Atendimento']['nota']; ?></td>
		<td>
			<?php echo $this->HTML->link($atendimento['Empresa']['nome'], array('controller' => 'empresas', 'action' => 'ver', $atendimento['Atendimento']['empresa_id'])); ?>
		</td>
		<td>
			<?php echo $this->HTML->link($atendimento['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'ver', $atendimento['Atendimento']['usuario_id'])); ?>
		</td>
		<td><?php echo $this->Html->link('Editar', array('controller' => 'atendimentos', 'action' => 'editar', $atendimento['Atendimento']['id'])); ?>
			<?php echo $this->Form->postLink('Deletar',
                array('controller' => 'atendimentos', 'action' => 'deletar', $atendimento['Atendimento']['id']),
                array('confirm' => 'Você tem certeza que deseja excluir o atendimento?')
				);
            ?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($atendimento); ?>
</table>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Ir para clientes', array('controller' => 'clientes', 'action' => 'index')); ?></p>