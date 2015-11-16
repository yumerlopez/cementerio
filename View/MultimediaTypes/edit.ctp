<div class="multimediaTypes form">
<?php echo $this->Form->create('MultimediaType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Multimedia Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MultimediaType.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('MultimediaType.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia'), array('controller' => 'multimedia', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia'), array('controller' => 'multimedia', 'action' => 'add')); ?> </li>
	</ul>
</div>