<div class="usersUsers index">
	<h2><?php echo __('Users Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('friend_id'); ?></th>
			<th><?php echo $this->Paginator->sort('users_users_status_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($usersUsers as $usersUser): ?>
	<tr>
		<td><?php echo h($usersUser['UsersUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usersUser['User']['name'], array('controller' => 'users', 'action' => 'view', $usersUser['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usersUser['Friend']['name'], array('controller' => 'users', 'action' => 'view', $usersUser['Friend']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usersUser['UsersUsersStatus']['name'], array('controller' => 'users_users_statuses', 'action' => 'view', $usersUser['UsersUsersStatus']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usersUser['UsersUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usersUser['UsersUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usersUser['UsersUser']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usersUser['UsersUser']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Users User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Users Statuses'), array('controller' => 'users_users_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Users Status'), array('controller' => 'users_users_statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
