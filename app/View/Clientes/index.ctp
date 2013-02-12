<h3>Clientes Cadastrados</h3>

<?php echo $this->Html->link('Adicionar um cliente', array('controller' => 'clientes', 'action' => 'adicionar')); ?>

<table>
    <tr>
        <!--<th>Id</th>-->
        <th>Nome</th>
        <th>Matrícula</th>
		<th>Status</th>
		<th>Data de Cadastro</th>
		<th>Email</th>
		<th>Telefone 1</th>
		<th>Telefone 2</th>
		<th>Empresa</th>
    </tr>

    <?php foreach ($clientes as $cliente): ?>
	
	<!-- Verifica o status do cliente 
			0 = 'Ativo' e 1 = 'Inativo' 
	-->
	<?php 
		if ($cliente['Cliente']['status'] == '0') {
			$status = "Ativo";
		}
		else {
			$status = "Inativo";
		}
	?>
	
    <tr>
        <!--<td><?php //echo $cliente['Cliente']['id']; ?></td>-->
        <td>
            <?php echo $this->Html->link($cliente['Cliente']['nome'], array('controller' => 'clientes', 'action' => 'ver', $cliente['Cliente']['id'])); ?>
        </td>
        <td><?php echo $cliente['Cliente']['matricula']; ?></td>
		<td><?php echo $status; ?></td>
		<td><?php echo $this->Time->format('d-m-Y / H:i:s', $cliente['Cliente']['data_cadastro']); ?></td> <!-- Define o formato da data/hora -->
		<td><?php echo $cliente['Cliente']['email']; ?></td>
		<td><?php echo $cliente['Cliente']['telefone1']; ?></td>
		<td><?php echo $cliente['Cliente']['telefone2']; ?></td>
		<td>
			<?php echo $this->HTML->link($cliente['Empresa']['nome'], array('controller' => 'empresas', 'action' => 'ver', $cliente['Cliente']['empresa_id'])); ?>
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