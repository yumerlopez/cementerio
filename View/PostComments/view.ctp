<div class="postComments view">
<h2><?php echo __('Post Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($postComment['PostComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($postComment['PostComment']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($postComment['PostComment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postComment['Post']['id'], array('controller' => 'posts', 'action' => 'view', $postComment['Post']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postComment['User']['name'], array('controller' => 'users', 'action' => 'view', $postComment['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Post Comment'), array('action' => 'edit', $postComment['PostComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Post Comment'), array('action' => 'delete', $postComment['PostComment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $postComment['PostComment']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Comment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
