<div class="userBelovedOnes view">
<h2><?php echo __('User Beloved One'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userBelovedOne['UserBelovedOne']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userBelovedOne['User']['name'], array('controller' => 'users', 'action' => 'view', $userBelovedOne['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($userBelovedOne['UserBelovedOne']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($userBelovedOne['UserBelovedOne']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth'); ?></dt>
		<dd>
			<?php echo h($userBelovedOne['UserBelovedOne']['birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Death'); ?></dt>
		<dd>
			<?php echo h($userBelovedOne['UserBelovedOne']['death']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Beloved One Relationship Id'); ?></dt>
		<dd>
			<?php echo h($userBelovedOne['UserBelovedOne']['user_beloved_one_relationship_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Beloved One'), array('action' => 'edit', $userBelovedOne['UserBelovedOne']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Beloved One'), array('action' => 'delete', $userBelovedOne['UserBelovedOne']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userBelovedOne['UserBelovedOne']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List User Beloved Ones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Beloved One'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
