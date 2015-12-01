<div class="usersUsers view">
<h2><?php echo __('Users User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersUser['UsersUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersUser['User']['name'], array('controller' => 'users', 'action' => 'view', $usersUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Friend'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersUser['Friend']['name'], array('controller' => 'users', 'action' => 'view', $usersUser['Friend']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users Users Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersUser['UsersUsersStatus']['name'], array('controller' => 'users_users_statuses', 'action' => 'view', $usersUser['UsersUsersStatus']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Users User'), array('action' => 'edit', $usersUser['UsersUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Users User'), array('action' => 'delete', $usersUser['UsersUser']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usersUser['UsersUser']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Users Statuses'), array('controller' => 'users_users_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Users Status'), array('controller' => 'users_users_statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
