<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('style.css','bootstrap.min','bootstrap-theme.min','fileinput.min','jquery-ui.min'));
		echo $this->Html->script(array('jquery.min','docs.min','bootstrap.min','fileinput.min','jquery-ui.min','search'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">
		$("#foto").fileinput();

		//Ruta hacia directorio raiz almacenado en variable para uso en ajax
		var basePath = "<?php echo Router::url('/');?>";

	</script>
</head>
<body>
	<?php if(isset($current_user)):?>
	<?php echo $this->element('menu'); //Aqui se manda a llamar a un meno o a otro segun si esta logueado?>
	<?php endif; ?>
	<?php if(!($current_user)):?>
	<?php echo $this->element('menu_not_login'); //Aqui se manda a llamar a un meno o a otro segun si esta logueado?>
	<?php endif; ?>
	<?php //debug($current_user);?>
    <div class="container" role="main">

    
      		<?php echo $this->Session->flash(); ?>

      		<?php echo $this->Session->flash('auth');?>

			<?php echo $this->fetch('content'); ?>

			<br>
			<div id="msg"></div>
			<br>
	</div>


<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
      <p class="navbar-text pull-left">© 2016 - Site Built By Boris Javier Villarreal</p>
      <p class="navbar-text pull-right"><?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered'));?></p>
    </div>
</div>
</body>
</html>
