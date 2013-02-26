<?php //echo $this->HTML->link('Editar informações', array('controller' => 'usuarios', 'action' => 'editar', AuthComponent::user('id'))); ?>

<?php //echo $this->HTML->link('Mudar senha', array('admin' => false, 'controller' => 'usuarios', 'action' => 'mudar_senha')); ?>

<h3>Usuários</h3>

<?php echo $this->Html->link('Adicionar um usuário', array('controller' => 'usuarios', 'action' => 'adicionar')); ?>

<table>
    <tr>
        <!--<th>Id</th>-->
		<th><?php echo $this->Paginator->sort('username', 'Login');?></th>
        <th><?php echo $this->Paginator->sort('nome', 'Nome');?></th>
        <th><?php echo $this->Paginator->sort('matricula', 'Matrícula');?></th>
		<th><?php echo $this->Paginator->sort('status', 'Status');?></th>
		<th>Empresa</th>
		<th>Ações</th>
    </tr>

    <?php foreach ($usuarios as $usuario): ?>
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
    <?php endforeach; ?>
    <?php unset($usuario); ?>
</table>

<!-- Paginação -->
<div class="paging">
	<!-- Mostra número de páginas -->
	<?php echo $this->Paginator->numbers();?>

	<!-- Mostra os links anterior e próximo -->
	<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled'));?>
	<?php echo $this->Paginator->next('Próximo »', null, null, array('class' => 'disabled'));?>

	<!-- Formato: página X de Y, W resultados de um total de Z -->
	<p><?php echo $this->Paginator->counter(array('format' => 'Página {:page} de {:pages}, mostrando {:current} resultados de um total de {:count}'));?></p>
 </div>