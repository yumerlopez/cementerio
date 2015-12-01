<div class="usersUsers form">
<?php echo $this->Form->create('UsersUser'); ?>
	<fieldset>
		<legend><?php echo __('Add Users User'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('friend_id');
		echo $this->Form->input('users_users_status_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Users Statuses'), array('controller' => 'users_users_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Users Status'), array('controller' => 'users_users_statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
