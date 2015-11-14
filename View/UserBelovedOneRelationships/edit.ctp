<div class="userBelovedOneRelationships form">
<?php echo $this->Form->create('UserBelovedOneRelationship'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Beloved One Relationship'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserBelovedOneRelationship.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('UserBelovedOneRelationship.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List User Beloved One Relationships'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List User Beloved Ones'), array('controller' => 'user_beloved_ones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Beloved One'), array('controller' => 'user_beloved_ones', 'action' => 'add')); ?> </li>
	</ul>
</div>
