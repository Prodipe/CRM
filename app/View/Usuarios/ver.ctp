<h3>Usuário</h3>

<?php
/*
	$count = count($empresa);
	for ($i = 1; $i <= $count; $i++) {
		echo $empresa[$i];
	}
	exit;
*/
?>

<?php 
	//echo ($usuario['Empresa']['nome']);
	//exit;
?>

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

<p><?php echo "ID: " . $usuario['Usuario']['id']; ?></p>

<p><?php echo "Matrícula: " . $usuario['Usuario']['matricula']; ?></p>

<p><?php echo "Nome: " . $usuario['Usuario']['nome']; ?></p>

<p><?php echo "Status: " . $status; ?></p>

<p><?php echo "Empresa: " . $usuario['Empresa']['nome']; ?></p>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Ir para usuários', array('controller' => 'usuarios', 'action' => 'index')); ?></p>