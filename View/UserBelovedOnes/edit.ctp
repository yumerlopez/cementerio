<div class="userBelovedOnes form">
<?php echo $this->Form->create('UserBelovedOne'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Beloved One'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('birth');
		echo $this->Form->input('death');
		echo $this->Form->input('user_beloved_one_relationship_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserBelovedOne.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('UserBelovedOne.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List User Beloved Ones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
