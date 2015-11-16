<div class="multimediaCollections form">
<?php echo $this->Form->create('MultimediaCollection'); ?>
	<fieldset>
		<legend><?php echo __('Add Multimedia Collection'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('multimedia_collection_type_id');
		echo $this->Form->input('user_beloved_one_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Multimedia Collections'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia Collection Types'), array('controller' => 'multimedia_collection_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection Type'), array('controller' => 'multimedia_collection_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Beloved Ones'), array('controller' => 'user_beloved_ones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Beloved One'), array('controller' => 'user_beloved_ones', 'action' => 'add')); ?> </li>
	</ul>
</div>
