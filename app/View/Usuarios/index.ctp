<h1><?php echo "Usuário: " . AuthComponent::user('nome'); ?></h1>

<p><?php echo $this->HTML->link('Editar informações', array('admin' => false, 'controller' => 'usuarios', 'action' => 'editar', AuthComponent::user('id'))); ?></p>

<p><?php echo $this->HTML->link('Mudar senha', array('admin' => false, 'controller' => 'usuarios', 'action' => 'mudar_senha')); ?></p>