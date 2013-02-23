<p><?php echo $this->HTML->link('Editar informações', array('controller' => 'usuarios', 'action' => 'editar', AuthComponent::user('id'))); ?></p>

<p><?php echo $this->HTML->link('Mudar senha', array('controller' => 'usuarios', 'action' => '')); ?></p>

<h3>Usuários Cadastrados</h3>

<?php echo $this->Html->link('Adicionar um usuário', array('controller' => 'usuarios', 'action' => 'adicionar')); ?>

<table>
    <tr>
        <!--<th>Id</th>-->
		<th><?php echo $this->Html->link('Login', array('action' => 'ordenar', 'login'));?></th>
        <th><?php echo $this->Html->link('Nome', array('action' => 'ordenar', 'nome'));?></th>
        <th><?php echo $this->Html->link('Matrícula', array('action' => 'ordenar', 'matricula'));?></th>
		<th><?php echo $this->Html->link('Status', array('action' => 'ordenar', 'status'));?></th>
		<th>Empresa</th>
    </tr>

    <?php foreach ($usuarios as $usuario): ?>
	<?php if ($usuario['Usuario']['nivel_acesso'] != 1) { // Mostra somente os usuários comuns ?>
	<!-- Verifica o status do usuário. 0 = 'Ativo' e 1 = 'Inativo' -->
	<?php 
		if ($usuario['Usuario']['status'] == '0') {
			$status = "Inativo";
		}
		else {
			$status = "Ativo";
		}
	?>
	
    <tr>
        <td><?php echo $this->Html->link($usuario['Usuario']['username'], array('controller' => 'usuarios', 'action' => 'ver', $usuario['Usuario']['id'])); ?></td>
        <td>
            <?php echo $usuario['Usuario']['nome']; ?>
        </td>
        <td><?php echo $usuario['Usuario']['matricula']; ?></td>
		<td><?php echo $status; //$usuario['Usuario']['status'];?>
		</td>
		<td>
			<?php echo $this->HTML->link($usuario['Empresa']['nome'], array('controller' => 'empresas', 'action' => 'ver', $usuario['Usuario']['empresa_id'])); ?>
		</td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Form->postLink('Deletar',
                array('action' => 'deletar', $usuario['Usuario']['id']),
                array('confirm' => 'Você tem certeza que deseja excluir o usuário?')
				);
            ?>
		</td>
    </tr>
	<?php } ?>
    <?php endforeach; ?>
    <?php unset($usuario); ?>
</table>