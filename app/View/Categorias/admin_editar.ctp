﻿<h2>Editar informações da categoria</h2>

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'categorias', 'action' => 'index')); ?></p>

<?php
    echo $this->Form->create('Categoria');
    echo $this->Form->input('descricao', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');
?>