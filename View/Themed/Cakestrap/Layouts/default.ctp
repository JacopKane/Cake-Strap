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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php if(isset($title)) echo __($title) . ' // '; ?>
			<?php if($this->params->prefix) echo __(Inflector::humanize($this->params->prefix)) . ' / '; ?>
			<?php if($title_for_layout) echo __($title_for_layout) . ' / '; ?>
			<?php if(isset($this->params->actionTitle)) echo __($this->params->actionTitle); ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			
			echo $this->fetch('meta');

			echo $this->Html->css('bootstrap.min');
			echo $this->Html->css('bootstrap-responsive.min');
			echo $this->Html->css('core');

			echo $this->fetch('css');
			
			echo $this->Html->script('libs/jquery');
			echo $this->Html->script('libs/bootstrap.min');
			
			echo $this->fetch('script');
		?>
	</head>

	<body>

		<div id="main-container">
		
			<div id="header" class="container">
				<?php
					$nav = array();
					if(!empty($controllersList)) {
						foreach($controllersList as $controller => $link) {
							unset($link['name']);
							$link['plugin'] = false;
							$link['action'] = 'index';
							$controller = $this->Html->link(__($controller), $link);
							$nav[] = $this->params->controller === $link['controller'] ?
								"<li class=\"active\">{$controller}</li>" : "<li>{$controller}</li>";
						}
					}
					echo $this->element('menu/top_menu', compact('nav'));
				?>
			</div><!-- #header .container -->
			
			<div id="content" class="container">

				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
			</div><!-- #header .container -->
			
			<div id="footer" class="container">
				<?php //Silence is golden ?>
			</div><!-- #footer .container -->
			
		</div><!-- #main-container -->
		
		<div class="container">
			<div class="well">
				<small>
					<?php echo $this->element('sql_dump'); ?>
				</small>
			</div>
		</div><!-- .container -->
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('input[type="file"]').each(function() {
					var $fileInput		= $(this).hide(),
						relatedInput	= '#' + $(this).attr('rel'),
						$relatedInput;
					if(!relatedInput) return true;
					$relatedInput = $(relatedInput);
					if(!$relatedInput.length) return true;

					$fileInput.change(function() {
						$relatedInput.val($fileInput.val()
							.replace('C:\\fakepath\\', ''));
					});

					$relatedInput
						.click(function() {
							return $fileInput.click();
						})
						.next('.btn-file')
							.click(function() {
								return $fileInput.click();
							});
				});
			});
		</script>
		<style media="all">
			div#page-container div h2:first-child,
			fieldset h2
				{ display: none; }

			input[readonly], select[readonly], textarea[readonly] { cursor: default; }
			input#ImageFakeImage { cursor: pointer; }
		</style>
	</body>

</html>