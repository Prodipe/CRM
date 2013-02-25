<?php 
	//print_r($categorias);
	//exit;
?>
<fieldset>
	<legend>Pesquisa</legend>
	<?php echo $this->Form->create('Atendimento', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>
	<?php //echo $this->Form->input('protocolo', array('div' => false, 'label' => 'Protocolo'));?>
	<?php //echo $this->Form->input('plano_atendimento', array('div' => false, 'label' => 'Plano de atendimento'));?>
	<?php //echo $this->Form->input('observacoes', array('div' => false, 'label' => 'Observações'));?>
	
	<?php //$options = array('Ativo' => 'Ativo', 'Inativo' => 'Inativo');?>
	<?php //echo $this->Form->input('status', array('div' => false, 'label' => 'Status', 'multiple' => 'checkbox', 'options' => $options));?>
	
	<?php //echo $this->Form->input('nota', array('div' => false, 'label' => 'Nota recebida'));?>
	<?php echo $this->Form->input('empresa', array('div' => false, 'label' => 'Empresa'));?>
	<?php echo $this->Form->input('cliente', array('div' => false, 'label' => 'Cliente'));?>
	<?php echo $this->Form->input('usuario', array('div' => false, 'label' => 'Usuário'));?>
	
	<?php //echo $this->Form->input('categoria', array('div' => false, 'label' => 'Categoria'));?>
	<?php echo $this->Form->input('categoria', array('div' => false, 'label' => 'Categoria', 'select' => $categorias, 'empty' => 'Todos'));?>
	
	<?php echo $this->Form->submit(__('Buscar'), array('div' => false));?>
	<?php echo $this->Form->end();?>
</fieldset>

<h3>Atendimentos Cadastrados</h3>

<?php echo $this->Html->link('Adicionar um atendimento', array('controller' => 'atendimentos', 'action' => 'adicionar')); ?>

<table>
    <tr>
		<th><?php echo$this->Paginator->sort('id', 'ID');?></th>
		<th>Cliente</th>
		<th>Categoria</th>
        <th><?php echo $this->Paginator->sort('protocolo', 'Protocolo');?></th>
        <th><?php echo $this->Paginator->sort('data_hora', 'Data/Hora');?></th>
		<th><?php echo $this->Paginator->sort('status', 'Status');?></th>
		<th><?php echo $this->Paginator->sort('prioridade', 'Prioridade');?></th>
		<th><?php echo $this->Paginator->sort('plano_atendimento', 'Plano');?></th>
		<th>Observações</th>
		<th><?php echo $this->Paginator->sort('nota', 'Nota Recebida');?></th>
		<th>Empresa</th>
		<th>Usuário</th>
		<th>Ações</th>
    </tr>

    <?php foreach ($atendimentos as $atendimento): ?>
	<!-- Verifica o status do atendimento
			0 = 'Ativo' e 1 = 'Inativo' 
	-->
	<?php
	/*
		if ($atendimento['Atendimento']['status'] == '0') {
			$status = "Ativo";
		}
		else {
			$status = "Inativo";
		}
	*/
	?>
	
	<!-- Verifica a prioridade do atendimento
		   0 = 'Baixa', 1 = 'Média' e 2 = 'Alta' 
	-->
	<?php
		/*
		if ($atendimento['Atendimento']['prioridade'] == '0') {
			$prioridade = "Baixa";
		}
		else if ($atendimento['Atendimento']['prioridade'] == '1') {
			$prioridade = "Média";
		}
		else {
			$prioridade = "Alta";
		}
		*/
	?>
	
    <tr>
        <td>
            <?php echo $this->Html->link($atendimento['Atendimento']['id'], array('controller' => 'atendimentos', 'action' => 'ver', $atendimento['Atendimento']['id'])); ?>
        </td>
		<td>
			<?php echo $this->HTML->link($atendimento['Cliente']['nome'], array('controller' => 'clientes', 'action' => 'ver', $atendimento['Atendimento']['cliente_id'])); ?>
		</td>
		<td>
			<?php echo $atendimento['Categoria']['descricao']; //$this->HTML->link($atendimento['Categoria']['descricao'], array('controller' => 'categorias', 'action' => 'ver', $atendimento['Atendimento']['categoria_id'])); ?>
		</td>
		<td><?php echo $atendimento['Atendimento']['protocolo']; ?></td>
		<td><?php echo $this->Time->format('d-m-Y / H:i:s', $atendimento['Atendimento']['data_hora']); ?></td> <!-- Define o formato da data/hora -->
		<td><?php echo $atendimento['Atendimento']['status']; //$status; ?></td>
		<td><?php echo $atendimento['Atendimento']['prioridade']; //$prioridade; ?></td>
		<td><?php echo $atendimento['Atendimento']['plano_atendimento']; ?></td>
		<td><?php echo $atendimento['Atendimento']['observacoes']; ?></td>
		<td><?php echo $atendimento['Atendimento']['nota']; ?></td>
		<td>
			<?php echo $atendimento['Empresa']['nome']; //$this->HTML->link($atendimento['Empresa']['nome'], array('controller' => 'empresas', 'action' => 'ver', $atendimento['Atendimento']['empresa_id'])); ?>
		</td>
		<td>
			<?php echo $atendimento['Usuario']['nome']; //$this->HTML->link($atendimento['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'ver', $atendimento['Atendimento']['usuario_id'])); ?>
		</td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $atendimento['Atendimento']['id'])); ?>
			<?php echo $this->Form->postLink('Deletar',
                array('action' => 'deletar', $atendimento['Atendimento']['id']),
                array('confirm' => 'Você tem certeza que deseja excluir o atendimento?')
				);
            ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($atendimento); ?>
</table>