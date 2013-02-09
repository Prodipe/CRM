<h1>Clientes Cadastrados</h1>

<?php echo $this->Html->link(
    'Adicionar um cliente',
    array('controller' => 'clientes', 'action' => 'adicionar')
); ?>

<table>
    <tr>
        <!--<th>Id</th>-->
        <th>Nome</th>
        <th>Matrícula</th>
		<th>Status</th>
		<th>Data de Cadastro</th>
    </tr>

    <?php foreach ($clientes as $cliente): ?>
    <tr>
        <!--<td><?php //echo $cliente['Cliente']['id']; ?></td>-->
        <td>
            <?php echo $this->Html->link($cliente['Cliente']['nome'],
array('controller' => 'clientes', 'action' => 'ver', $cliente['Cliente']['id'])); ?>
        </td>
        <td><?php echo $cliente['Cliente']['matricula']; ?></td>
		<td><?php echo $cliente['Cliente']['status']; ?></td>
		<td><?php echo $cliente['Cliente']['data_cadastro']; ?></td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $cliente['Cliente']['id'])); ?>
			<?php echo $this->Form->postLink(
                'Deletar',
                array('action' => 'deletar', $cliente['Cliente']['id']),
                array('confirm' => 'Você tem certeza?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($cliente); ?>
</table>