<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>CRM</h1>
			
			<?php if (AuthComponent::user('nome') != null) { ?>
					<h1><?php echo "Bem-vindo(a) " . AuthComponent::user('nome');?></h1>
			<?php } ?>
			
		</div>
		<div id="content">
			<?php if (AuthComponent::user('nivel_acesso') == 1) { 	
				echo $this->HTML->link('Empresas', array('admin' => true, 'controller' => 'empresas', 'action' => 'index'));
				echo $this->HTML->link('Usuários', array('admin' => true, 'controller' => 'usuarios', 'action' => 'index'));
				echo $this->HTML->link('Clientes', array('admin' => false, 'controller' => 'clientes', 'action' => 'index'));
				echo $this->HTML->link('Atendimentos', array('admin' => false, 'controller' => 'atendimentos', 'action' => 'index'));
				echo $this->HTML->link('Categorias', array('admin' => true, 'controller' => 'categorias', 'action' => 'index'));
				echo $this->HTML->link('Parâmetros', array('admin' => true, 'controller' => 'parametros', 'action' => 'index'));
				echo $this->HTML->link('Logout', array('admin' => false, 'controller' => 'usuarios', 'action' => 'logout'));
			}
			else {
				echo $this->HTML->link('Usuários', array('controller' => 'usuarios', 'action' => 'index'));
				echo $this->HTML->link('Clientes', array('controller' => 'clientes', 'action' => 'index'));
				echo $this->HTML->link('Atendimentos', array('controller' => 'atendimentos', 'action' => 'index'));
				echo $this->HTML->link('Logout', array('controller' => 'usuarios', 'action' => 'logout'));
			}
			?>
				
				<br><br>
				
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
</body>
</html>
