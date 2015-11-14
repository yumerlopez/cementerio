<div class="userBelovedOneRelationships form">
<?php echo $this->Form->create('UserBelovedOneRelationship'); ?>
	<fieldset>
		<legend><?php echo __('Add User Beloved One Relationship'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List User Beloved One Relationships'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List User Beloved Ones'), array('controller' => 'user_beloved_ones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Beloved One'), array('controller' => 'user_beloved_ones', 'action' => 'add')); ?> </li>
	</ul>
</div>
