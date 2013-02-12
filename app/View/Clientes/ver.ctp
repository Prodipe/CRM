<h3>Cliente</h3>

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

<p><?php echo "ID: " . $cliente['Cliente']['id']; ?></p>

<p><?php echo "Matrícula: " . $cliente['Cliente']['matricula']; ?></p>

<p><?php echo "Nome: " . $cliente['Cliente']['nome']; ?></p>

<p><?php echo "Status: " . $status; ?></p>

<p><?php echo "Data de Cdastro: " . $cliente['Cliente']['data_cadastro']; ?></p>

<p><?php echo "Email: " . $cliente['Cliente']['email']; ?></p>

<p><?php echo "Telefone 1: " . $cliente['Cliente']['telefone1']; ?></p>

<p><?php echo "Telefone 2: " . $cliente['Cliente']['telefone2']; ?></p>

<p><?php echo "Empresa: " . $cliente['Empresa']['nome']; ?></p>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Ir para clientes', array('controller' => 'clientes', 'action' => 'index')); ?></p>