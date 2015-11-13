<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Gender']['name'], array('controller' => 'genders', 'action' => 'view', $user['Gender']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Nationality']['name'], array('controller' => 'nationalities', 'action' => 'view', $user['Nationality']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['UserStatus']['name'], array('controller' => 'user_statuses', 'action' => 'view', $user['UserStatus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Role']['name'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth'); ?></dt>
		<dd>
			<?php echo h($user['User']['birth']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Nationalities'), array('controller' => 'nationalities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nationality'), array('controller' => 'nationalities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Statuses'), array('controller' => 'user_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Status'), array('controller' => 'user_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Emails'), array('controller' => 'emails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Networks'), array('controller' => 'social_networks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Network'), array('controller' => 'social_networks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Phones'), array('controller' => 'user_phones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Phone'), array('controller' => 'user_phones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Emails'); ?></h3>
	<?php if (!empty($user['Email'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Email Address'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Email'] as $email): ?>
		<tr>
			<td><?php echo $email['id']; ?></td>
			<td><?php echo $email['email_address']; ?></td>
			<td><?php echo $email['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'emails', 'action' => 'view', $email['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'emails', 'action' => 'edit', $email['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'emails', 'action' => 'delete', $email['id']), array('confirm' => __('Are you sure you want to delete # %s?', $email['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Social Networks'); ?></h3>
	<?php if (!empty($user['SocialNetwork'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Social Network Account'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Social Network Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['SocialNetwork'] as $socialNetwork): ?>
		<tr>
			<td><?php echo $socialNetwork['id']; ?></td>
			<td><?php echo $socialNetwork['social_network_account']; ?></td>
			<td><?php echo $socialNetwork['user_id']; ?></td>
			<td><?php echo $socialNetwork['social_network_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'social_networks', 'action' => 'view', $socialNetwork['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'social_networks', 'action' => 'edit', $socialNetwork['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'social_networks', 'action' => 'delete', $socialNetwork['id']), array('confirm' => __('Are you sure you want to delete # %s?', $socialNetwork['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Social Network'), array('controller' => 'social_networks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related User Phones'); ?></h3>
	<?php if (!empty($user['UserPhone'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UserPhone'] as $userPhone): ?>
		<tr>
			<td><?php echo $userPhone['id']; ?></td>
			<td><?php echo $userPhone['number']; ?></td>
			<td><?php echo $userPhone['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_phones', 'action' => 'view', $userPhone['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_phones', 'action' => 'edit', $userPhone['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_phones', 'action' => 'delete', $userPhone['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userPhone['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Phone'), array('controller' => 'user_phones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
