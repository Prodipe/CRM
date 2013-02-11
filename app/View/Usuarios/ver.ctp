<h3>Usuário</h3>

<?php 
	/*var_dump($empresa);
	exit;*/
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

<p><?php echo "Empresa: " . $usuario['Usuario']['empresa_id']; ?></p>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Ir para usuários', array('controller' => 'usuarios', 'action' => 'index')); ?></p>