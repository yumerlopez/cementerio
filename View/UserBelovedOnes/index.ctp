<div class="userBelovedOnes index">
	<h2><?php echo __('User Beloved Ones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('birth'); ?></th>
			<th><?php echo $this->Paginator->sort('death'); ?></th>
			<th><?php echo $this->Paginator->sort('user_beloved_one_relationship_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($userBelovedOnes as $userBelovedOne): ?>
	<tr>
		<td><?php echo h($userBelovedOne['UserBelovedOne']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userBelovedOne['User']['name'], array('controller' => 'users', 'action' => 'view', $userBelovedOne['User']['id'])); ?>
		</td>
		<td><?php echo h($userBelovedOne['UserBelovedOne']['name']); ?>&nbsp;</td>
		<td><?php echo h($userBelovedOne['UserBelovedOne']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($userBelovedOne['UserBelovedOne']['birth']); ?>&nbsp;</td>
		<td><?php echo h($userBelovedOne['UserBelovedOne']['death']); ?>&nbsp;</td>
		<td><?php echo h($userBelovedOne['UserBelovedOne']['user_beloved_one_relationship_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userBelovedOne['UserBelovedOne']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userBelovedOne['UserBelovedOne']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userBelovedOne['UserBelovedOne']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userBelovedOne['UserBelovedOne']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New User Beloved One'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
