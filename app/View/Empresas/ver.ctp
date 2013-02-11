<h3>Empresa</h3>

<p><?php echo "ID: " . $empresa['Empresa']['id']; ?></p>

<p><?php echo "Nome da Empresa: " . $empresa['Empresa']['nome']; ?></p>

<p><?php echo "Razão Social: " . $empresa['Empresa']['razao_social']; ?></p>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Ir para empresas', array('controller' => 'empresas', 'action' => 'index')); ?></p>