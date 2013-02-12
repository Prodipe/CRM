<h3>Atendimentos Cadastrados</h3>

<?php echo $this->Html->link('Adicionar um atendimento', array('controller' => 'atendimentos', 'action' => 'adicionar')); ?>

<table>
    <tr>
		<th>Id</th>
		<th>Cliente</th>
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
        <td>
            <?php echo $this->Html->link($atendimento['Atendimento']['id'], array('controller' => 'atendimentos', 'action' => 'ver', $atendimento['Atendimento']['id'])); ?>
        </td>
		<td>
			<?php echo $this->HTML->link($atendimento['Cliente']['nome'], array('controller' => 'clientes', 'action' => 'ver', $atendimento[	'Atendimento']['cliente_id'])); ?>
		</td>
		<td>
			<?php echo $this->HTML->link($atendimento['Categoria']['descricao'], array('controller' => 'categorias', 'action' => 'ver', $atendimento[	'Atendimento']['categoria_id'])); ?>
		</td>
		<td><?php echo $atendimento['Atendimento']['protocolo']; ?></td>
		<td><?php echo $atendimento['Atendimento']['data_hora']; ?></td>
		<td><?php echo $status; ?></td>
		<td><?php echo $prioridade; ?></td>
		<td><?php echo $atendimento['Atendimento']['plano_atendimento']; ?></td>
		<td><?php echo $atendimento['Atendimento']['observacoes']; ?></td>
		<td><?php echo $atendimento['Atendimento']['nota']; ?></td>
		<td>
			<?php echo $this->HTML->link($atendimento['Empresa']['nome'], array('controller' => 'empresas', 'action' => 'ver', $atendimento[	'Atendimento']['empresa_id'])); ?>
		</td>
		<td>
			<?php echo $this->HTML->link($atendimento['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'ver', $atendimento[	'Atendimento']['usuario_id'])); ?>
		</td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $atendimento['Atendimento']['id'])); ?>
			<?php echo $this->Form->postLink('Deletar',
                array('action' => 'deletar', $atendimento['Atendimento']['id']),
                array('confirm' => 'Você tem certeza que deseja excluir o atendimento?')
				);
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($atendimento); ?>
</table>