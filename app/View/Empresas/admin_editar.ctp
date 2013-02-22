<h2>Editar informações da empresa</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'empresas', 'action' => 'index')); ?></p>

<?php
    echo $this->Form->create('Empresa');
    echo $this->Form->input('nome', array('label' => 'Nome da Empresa'));
    echo $this->Form->input('razao_social', array('label' => 'Razão Social', 'rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');
?>