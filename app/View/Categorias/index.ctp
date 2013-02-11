<h3>Categorias Cadastradas</h3>

<?php echo $this->Html->link('Adicionar uma categoria', array('controller' => 'categorias', 'action' => 'adicionar')); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Descrição</th>
    </tr>

    <?php foreach ($categorias as $categoria): ?>
    <tr>
        <td><?php echo $categoria['Categoria']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($categoria['Categoria']['descricao'], array('controller' => 'categorias', 'action' => 'ver', $categoria['Categoria']['id'])); ?>
        </td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $categoria['Categoria']['id'])); ?>
			<?php echo $this->Form->postLink('Deletar',
                array('action' => 'deletar', $categoria['Categoria']['id']),
                array('confirm' => 'Você tem certeza que deseja excluir a categoria?')
				);
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($categoria); ?>
</table>