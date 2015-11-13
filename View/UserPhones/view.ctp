<div class="userPhones view">
<h2><?php echo __('User Phone'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userPhone['UserPhone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($userPhone['UserPhone']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userPhone['User']['name'], array('controller' => 'users', 'action' => 'view', $userPhone['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Phone'), array('action' => 'edit', $userPhone['UserPhone']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Phone'), array('action' => 'delete', $userPhone['UserPhone']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userPhone['UserPhone']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List User Phones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Phone'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
