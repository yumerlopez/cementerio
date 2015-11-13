<div class="socialNetworks view">
<h2><?php echo __('Social Network'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($socialNetwork['SocialNetwork']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Social Network Account'); ?></dt>
		<dd>
			<?php echo h($socialNetwork['SocialNetwork']['social_network_account']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($socialNetwork['User']['name'], array('controller' => 'users', 'action' => 'view', $socialNetwork['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Social Network Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($socialNetwork['SocialNetworkType']['name'], array('controller' => 'social_network_types', 'action' => 'view', $socialNetwork['SocialNetworkType']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Social Network'), array('action' => 'edit', $socialNetwork['SocialNetwork']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Social Network'), array('action' => 'delete', $socialNetwork['SocialNetwork']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $socialNetwork['SocialNetwork']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Networks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Network'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Network Types'), array('controller' => 'social_network_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Network Type'), array('controller' => 'social_network_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
