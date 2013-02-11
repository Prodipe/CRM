<h3>Usuários Cadastrados</h3>

<?php echo $this->Html->link('Adicionar um usuário', array('controller' => 'usuarios', 'action' => 'adicionar')); ?>

<table>
    <tr>
        <!--<th>Id</th>-->
        <th>Nome</th>
        <th>Matrícula</th>
		<th>Status</th>
		<th>Empresa</th>
    </tr>

    <?php foreach ($usuarios as $usuario): ?>
	
	<!-- Verifica o status do usuário 
			0 = 'Ativo' e 1 = 'Inativo' 
	-->
	<?php 
		if ($usuario['Usuario']['status'] == '0') {
			$status = "Ativo";
		}
		else {
			$status = "Inativo";
		}
	?>
	
    <tr>
        <!--<td><?php //echo $usuario['Usuario']['id']; ?></td>-->
        <td>
            <?php echo $this->Html->link($usuario['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'ver', $usuario['Usuario']['id'])); ?>
        </td>
        <td><?php echo $usuario['Usuario']['matricula']; ?></td>
		<td><?php echo $status; ?>
		</td>
		<td>
			<?php echo $this->HTML->link($usuario['Usuario']['empresa_id'], array('controller' => 'empresas', 'action' => 'ver', $usuario['Usuario']['empresa_id'])); ?>
		</td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Form->postLink('Deletar',
                array('action' => 'deletar', $usuario['Usuario']['id']),
                array('confirm' => 'Você tem certeza que deseja excluir o usuário?')
				);
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($usuario); ?>
</table>