<h3>Parâmetros Cadastrados</h3>

<?php echo $this->Html->link('Adicionar um parâmetro', array('controller' => 'parametros', 'action' => 'adicionar')); ?>

<table>
    <tr>
        <th><?php echo $this->Html->link('Id', array('action' => 'ordenar', 'id'));?></th>
        <th><?php echo $this->Html->link('Descrição', array('action' => 'ordenar', 'descricao'));?></th>
        <th><?php echo $this->Html->link('Valor', array('action' => 'ordenar', 'valor'));?></th>
		<th>Empresa</th>
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