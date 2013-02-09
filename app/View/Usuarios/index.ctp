<h1>Usuários Cadastrados</h1>

<?php echo $this->Html->link(
    'Adicionar um usuário',
    array('controller' => 'usuarios', 'action' => 'adicionar')
); ?>

<table>
    <tr>
        <!--<th>Id</th>-->
        <th>Nome</th>
        <th>Matrícula</th>
		<th>Status</th>
		<th>Empresa</th>
    </tr>

    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <!--<td><?php //echo $usuario['Usuario']['id']; ?></td>-->
        <td>
            <?php echo $this->Html->link($usuario['Usuario']['nome'],
array('controller' => 'usuarios', 'action' => 'ver', $usuario['Usuario']['id'])); ?>
        </td>
        <td><?php echo $usuario['Usuario']['matricula']; ?></td>
		<td><?php echo $usuario['Usuario']['status']; ?></td>
		<td><?php echo $usuario['Usuario']['id']; ?></td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Form->postLink(
                'Deletar',
                array('action' => 'deletar', $usuario['Usuario']['id']),
                array('confirm' => 'Você tem certeza?'));
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($usuario); ?>
</table>