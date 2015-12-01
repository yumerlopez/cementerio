<div class="usersUsersStatuses view">
<h2><?php echo __('Users Users Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersUsersStatus['UsersUsersStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($usersUsersStatus['UsersUsersStatus']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($usersUsersStatus['UsersUsersStatus']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Users Users Status'), array('action' => 'edit', $usersUsersStatus['UsersUsersStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Users Users Status'), array('action' => 'delete', $usersUsersStatus['UsersUsersStatus']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usersUsersStatus['UsersUsersStatus']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Users Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Users Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Users'), array('controller' => 'users_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users User'), array('controller' => 'users_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users Users'); ?></h3>
	<?php if (!empty($usersUsersStatus['UsersUser'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Friend Id'); ?></th>
		<th><?php echo __('Users Users Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usersUsersStatus['UsersUser'] as $usersUser): ?>
		<tr>
			<td><?php echo $usersUser['id']; ?></td>
			<td><?php echo $usersUser['user_id']; ?></td>
			<td><?php echo $usersUser['friend_id']; ?></td>
			<td><?php echo $usersUser['users_users_status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users_users', 'action' => 'view', $usersUser['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users_users', 'action' => 'edit', $usersUser['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users_users', 'action' => 'delete', $usersUser['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usersUser['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Users User'), array('controller' => 'users_users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
