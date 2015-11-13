<div class="socialNetworks form">
<?php echo $this->Form->create('SocialNetwork'); ?>
	<fieldset>
		<legend><?php echo __('Edit Social Network'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('social_network_account');
		echo $this->Form->input('user_id');
		echo $this->Form->input('social_network_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SocialNetwork.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('SocialNetwork.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Social Networks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Network Types'), array('controller' => 'social_network_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Network Type'), array('controller' => 'social_network_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
