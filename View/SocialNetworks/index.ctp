<div class="socialNetworks index">
	<h2><?php echo __('Social Networks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('social_network_account'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('social_network_type_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($socialNetworks as $socialNetwork): ?>
	<tr>
		<td><?php echo h($socialNetwork['SocialNetwork']['id']); ?>&nbsp;</td>
		<td><?php echo h($socialNetwork['SocialNetwork']['social_network_account']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($socialNetwork['User']['name'], array('controller' => 'users', 'action' => 'view', $socialNetwork['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($socialNetwork['SocialNetworkType']['name'], array('controller' => 'social_network_types', 'action' => 'view', $socialNetwork['SocialNetworkType']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $socialNetwork['SocialNetwork']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $socialNetwork['SocialNetwork']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $socialNetwork['SocialNetwork']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $socialNetwork['SocialNetwork']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Social Network'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Network Types'), array('controller' => 'social_network_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Network Type'), array('controller' => 'social_network_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
