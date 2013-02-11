<h3>Empresas Cadastradas</h3>

<?php echo $this->Html->link('Adicionar uma empresa', array('controller' => 'empresas', 'action' => 'adicionar')); ?>

<table>
    <tr>
        <!--<th>Id</th>-->
        <th>Nome</th>
        <th>Razão social</th>
    </tr>

    <?php foreach ($empresas as $empresa): ?>
    <tr>
        <!--<td><?php //echo $empresa['Empresa']['id']; ?></td>-->
        <td>
            <?php echo $this->Html->link($empresa['Empresa']['nome'], array('controller' => 'empresas', 'action' => 'ver', $empresa['Empresa']['id'])); ?>
        </td>
        <td><?php echo $empresa['Empresa']['razao_social']; ?></td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $empresa['Empresa']['id'])); ?>
			<?php echo $this->Form->postLink('Deletar',
                array('action' => 'deletar', $empresa['Empresa']['id']),
                array('confirm' => 'Você tem certeza que deseja excluir a empresa?')
				);
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($empresa); ?>
</table>