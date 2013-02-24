<fieldset>
	<?php echo $this->Form->create('Cliente', array('url' => array_merge(array('action' => 'buscar'), $this->params['pass']))); ?>
	<?php echo $this->Form->input('nome', array('div' => false));?>
	<?php echo $this->Form->submit(__('Buscar'), array('div' => false));?>
	<?php echo $this->Form->end();?>
</fieldset>

<table>
    <tr>
        <!--<th>Id</th>-->
        <th><?php echo $this->Paginator->sort('nome', 'Nome');?></th>
        <th><?php echo $this->Paginator->sort('matricula', 'Matrícula');?></th>
		<th><?php echo $this->Paginator->sort('status', 'Status');?></th>
		<th><?php echo $this->Paginator->sort('data_cadastro', 'Data de Cadastro');?></th>
		<th><?php echo $this->Paginator->sort('email', 'Email');?></th>
		<th><?php echo $this->Paginator->sort('telefone1', 'Telefone 1');?></th>
		<th><?php echo $this->Paginator->sort('telefone2', 'Telefone 2');?></th>
		<th>Empresa</th>
		<th>Ações</th>
    </tr>

    <?php foreach ($clientes as $cliente): ?>
	
    <tr>
        <!--<td><?php //echo $cliente['Cliente']['id']; ?></td>-->
        <td>
            <?php echo $this->Html->link($cliente['Cliente']['nome'], array('controller' => 'clientes', 'action' => 'ver', $cliente['Cliente']['id'])); ?>
        </td>
        <td><?php echo $cliente['Cliente']['matricula']; ?></td>
		<td><?php echo $cliente['Cliente']['status']; //$status; ?></td>
		<td><?php echo $this->Time->format('d-m-Y / H:i:s', $cliente['Cliente']['data_cadastro']); ?></td> <!-- Define o formato da data/hora -->
		<td><?php echo $cliente['Cliente']['email']; ?></td>
		<td><?php echo $cliente['Cliente']['telefone1']; ?></td>
		<td><?php echo $cliente['Cliente']['telefone2']; ?></td>
		<td>
			<?php echo $cliente['Empresa']['nome']; //$this->HTML->link($cliente['Empresa']['nome'], array('controller' => 'empresas', 'action' => 'ver', $cliente['Cliente']['empresa_id'])); ?>
		</td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $cliente['Cliente']['id'])); ?>
			<?php echo $this->Form->postLink('Deletar',
                array('action' => 'deletar', $cliente['Cliente']['id']),
                array('confirm' => 'Você tem certeza que deseja excluir o cliente?')
				);
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($cliente); ?>
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