<h3>Parâmetros</h3>

<?php echo $this->Html->link('Adicionar um parâmetro', array('controller' => 'parametros', 'action' => 'adicionar')); ?>

<table>
    <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Valor</th>
		<th>Empresa</th>
		<th>Ações</th>
    </tr>

    <?php foreach ($parametros as $parametro): ?>
    <tr>
        <td><?php echo $parametro['Parametro']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($parametro['Parametro']['descricao'], array('controller' => 'parametros', 'action' => 'ver', $parametro['Parametro']['id'])); ?>
        </td>
        <td><?php echo $parametro['Parametro']['valor']; ?></td>
		<td><?php echo $this->HTML->link($parametro['Empresa']['nome'], array('controller' => 'empresas', 'action' => 'ver', $parametro['Parametro']['empresa_id'])); ?></td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $parametro['Parametro']['id'])); ?>
			<?php echo $this->Form->postLink('Deletar',
                array('action' => 'deletar', $parametro['Parametro']['id']),
                array('confirm' => 'Você tem certeza excluir o parâmetro?')
				);
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($parametro); ?>
</table>