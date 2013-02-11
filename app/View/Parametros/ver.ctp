<h3>Parâmetro</h3>

<p><?php echo "ID: " . $parametro['Parametro']['id']; ?></p>

<p><?php echo "Descrição: " . $parametro['Parametro']['descricao']; ?></p>

<p><?php echo "Valor: " . $parametro['Parametro']['valor']; ?></p>

<p><?php echo "Empresa: " . $parametro['Parametro']['empresa_id']; ?></p>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Ir para parametros', array('controller' => 'parametros', 'action' => 'index')); ?></p>