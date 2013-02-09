<h1>Atendimentos Cadastrados</h1>

<?php echo $this->Html->link(
    'Adicionar um atendimento',
    array('controller' => 'atendimentos', 'action' => 'adicionar')
); ?>

<table>
    <tr>
		<th>Id</th>
        <th>Protocolo</th>
        <th>Data/Hora</th>
		<th>Status</th>
		<th>Prioridade</th>
    </tr>

    <?php foreach ($atendimentos as $atendimento): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($atendimento['Atendimento']['id'],
				array('controller' => 'atendimentos', 'action' => 'ver', $atendimento['Atendimento']['id'])); ?>
        </td>
		<td><?php echo $atendimento['Atendimento']['protocolo']; ?></td>
		<td><?php echo $atendimento['Atendimento']['data_hora']; ?></td>
		<td><?php echo $atendimento['Atendimento']['status']; ?></td>
		<td><?php echo $atendimento['Atendimento']['prioridade']; ?></td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $atendimento['Atendimento']['id'])); ?>
			<?php echo $this->Form->postLink(
                'Deletar',
                array('action' => 'deletar', $atendimento['Atendimento']['id']),
                array('confirm' => 'Você tem certeza?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($atendimento); ?>
</table>