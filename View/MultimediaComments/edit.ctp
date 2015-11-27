<div class="multimediaComments form">
<?php echo $this->Form->create('MultimediaComment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Multimedia Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('comment');
		echo $this->Form->input('multimedia_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MultimediaComment.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('MultimediaComment.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia Comments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia'), array('controller' => 'multimedia', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia'), array('controller' => 'multimedia', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
