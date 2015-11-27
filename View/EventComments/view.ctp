<div class="eventComments view">
<h2><?php echo __('Event Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventComment['EventComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($eventComment['EventComment']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($eventComment['EventComment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventComment['Event']['name'], array('controller' => 'events', 'action' => 'view', $eventComment['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventComment['User']['name'], array('controller' => 'users', 'action' => 'view', $eventComment['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event Comment'), array('action' => 'edit', $eventComment['EventComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event Comment'), array('action' => 'delete', $eventComment['EventComment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $eventComment['EventComment']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Comment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
