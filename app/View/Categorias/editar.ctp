<h1>Editar informações da categoria</h1>
<?php
    echo $this->Form->create('Categoria');
    echo $this->Form->input('descricao', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');
?>