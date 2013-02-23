<h3>Categoria</h3>

<p><?php echo "ID: " . $categoria['Categoria']['id']; ?></p>

<p><?php echo "Descrição: " . $categoria['Categoria']['descricao']; ?></p>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Ir para categorias', array('controller' => 'categorias', 'action' => 'index')); ?></p>