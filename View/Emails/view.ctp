<div class="emails view">
<h2><?php echo __('Email'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($email['Email']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Address'); ?></dt>
		<dd>
			<?php echo h($email['Email']['email_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($email['User']['name'], array('controller' => 'users', 'action' => 'view', $email['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Email'), array('action' => 'edit', $email['Email']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Email'), array('action' => 'delete', $email['Email']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $email['Email']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Emails'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
