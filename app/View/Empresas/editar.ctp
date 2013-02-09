<h1>Editar informações da empresa</h1>
<?php
    echo $this->Form->create('Empresa');
    echo $this->Form->input('nome');
    echo $this->Form->input('razao_social', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');
?>