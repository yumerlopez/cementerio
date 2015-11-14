<div class="userBelovedOneRelationships view">
<h2><?php echo __('User Beloved One Relationship'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userBelovedOneRelationship['UserBelovedOneRelationship']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($userBelovedOneRelationship['UserBelovedOneRelationship']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($userBelovedOneRelationship['UserBelovedOneRelationship']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Beloved One Relationship'), array('action' => 'edit', $userBelovedOneRelationship['UserBelovedOneRelationship']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Beloved One Relationship'), array('action' => 'delete', $userBelovedOneRelationship['UserBelovedOneRelationship']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userBelovedOneRelationship['UserBelovedOneRelationship']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List User Beloved One Relationships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Beloved One Relationship'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Beloved Ones'), array('controller' => 'user_beloved_ones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Beloved One'), array('controller' => 'user_beloved_ones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related User Beloved Ones'); ?></h3>
	<?php if (!empty($userBelovedOneRelationship['UserBelovedOne'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Birth'); ?></th>
		<th><?php echo __('Death'); ?></th>
		<th><?php echo __('User Beloved One Relationship Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userBelovedOneRelationship['UserBelovedOne'] as $userBelovedOne): ?>
		<tr>
			<td><?php echo $userBelovedOne['id']; ?></td>
			<td><?php echo $userBelovedOne['user_id']; ?></td>
			<td><?php echo $userBelovedOne['name']; ?></td>
			<td><?php echo $userBelovedOne['last_name']; ?></td>
			<td><?php echo $userBelovedOne['birth']; ?></td>
			<td><?php echo $userBelovedOne['death']; ?></td>
			<td><?php echo $userBelovedOne['user_beloved_one_relationship_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_beloved_ones', 'action' => 'view', $userBelovedOne['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_beloved_ones', 'action' => 'edit', $userBelovedOne['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_beloved_ones', 'action' => 'delete', $userBelovedOne['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userBelovedOne['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Beloved One'), array('controller' => 'user_beloved_ones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
