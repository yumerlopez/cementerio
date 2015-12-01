<div class="multimediaComments view">
<h2><?php echo __('Multimedia Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($multimediaComment['MultimediaComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($multimediaComment['MultimediaComment']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($multimediaComment['MultimediaComment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Multimedia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($multimediaComment['Multimedia']['name'], array('controller' => 'multimedia', 'action' => 'view', $multimediaComment['Multimedia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($multimediaComment['User']['name'], array('controller' => 'users', 'action' => 'view', $multimediaComment['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Multimedia Comment'), array('action' => 'edit', $multimediaComment['MultimediaComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Multimedia Comment'), array('action' => 'delete', $multimediaComment['MultimediaComment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimediaComment['MultimediaComment']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Comment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia'), array('controller' => 'multimedia', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia'), array('controller' => 'multimedia', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
