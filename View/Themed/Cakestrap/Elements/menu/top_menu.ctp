<?php if(!isset($navbar) || $navbar !== false): ?>
<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<?php if(isset($title)): ?>
				<span class="brand"><?php echo __($title); ?></span>
			<?php endif; ?>
			<div class="nav-collapse">
				<?php if(!empty($nav)): ?>
					<ul class="nav">
						<?php foreach($nav as $navItem): ?>
							<?php echo $navItem; ?>
						<?php endforeach; ?> 
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if(!isset($breadcrumb) || $breadcrumb !== false): ?>
<ul class="breadcrumb">
	<?php if(isset($title)): ?>
		<li><?php echo $this->Html->link(__($title), array(
			'action'				=> ' ',
			'controller'			=> false,
			'plugin'				=> false,
			$this->params->prefix	=> false,
		));?><span class="divider">/</span></li>
	<?php endif; ?>
	<?php if($this->params->prefix): ?>
		<li><?php echo $this->Html->link(__(Inflector::humanize($this->params->prefix)), array(
			$this->params->prefix	=> true,
			'controller'			=> false,
			'action'				=> ' ',
			'plugin'				=> false
		)); ?><span class="divider">/</span></li>
	<?php endif; ?>
	<?php if($title_for_layout): ?>
		<li><?php echo $this->Html->link(__($title_for_layout), array(
			'controller'			=> $this->params->controller,
			'action'				=> 'index'
		)); ?><span class="divider">/</span></li>
	<?php endif; ?>
	<?php if(isset($this->params->actionTitle)): ?>
		<li class="active"><?php echo __($this->params->actionTitle); ?></li>
	<?php endif; ?>
</ul>
<?php endif; ?>