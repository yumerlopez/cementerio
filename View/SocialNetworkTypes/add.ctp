<div class="socialNetworkTypes form">
<?php echo $this->Form->create('SocialNetworkType'); ?>
	<fieldset>
		<legend><?php echo __('Add Social Network Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('url_image');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Social Network Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
