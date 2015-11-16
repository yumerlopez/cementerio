<div class="multimediaCollectionTypes form">
<?php echo $this->Form->create('MultimediaCollectionType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Multimedia Collection Type'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MultimediaCollectionType.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('MultimediaCollectionType.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia Collection Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia Collections'), array('controller' => 'multimedia_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection'), array('controller' => 'multimedia_collections', 'action' => 'add')); ?> </li>
	</ul>
</div>
