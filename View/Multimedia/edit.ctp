<div class="multimedia form">
<?php echo $this->Form->create('Multimedia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Multimedia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('url');
		echo $this->Form->input('multimedia_type_id');
		echo $this->Form->input('multimedia_collection_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Multimedia.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Multimedia.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia Types'), array('controller' => 'multimedia_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Type'), array('controller' => 'multimedia_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Collections'), array('controller' => 'multimedia_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection'), array('controller' => 'multimedia_collections', 'action' => 'add')); ?> </li>
	</ul>
</div>
