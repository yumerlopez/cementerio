<div class="usersUsersStatuses form">
<?php echo $this->Form->create('UsersUsersStatus'); ?>
	<fieldset>
		<legend><?php echo __('Add Users Users Status'); ?></legend>
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

		<li><?php echo $this->Html->link(__('List Users Users Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users Users'), array('controller' => 'users_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users User'), array('controller' => 'users_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
