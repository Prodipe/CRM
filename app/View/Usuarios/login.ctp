<h2><?php echo __('Login'); ?></h2>

<?php 
	echo $this->Session->flash('auth');
    echo $this->Form->create('Usuario');
    echo $this->Form->input('username', array('label' => 'Nome de usuário'));
    echo $this->Form->input('password', array('label' => 'Senha'));
    echo $this->Form->end('Entrar');
	echo $this->HTML->link('Não é cadastrado?', array('controller' => 'usuarios', 'action' => 'adicionar'));
?>