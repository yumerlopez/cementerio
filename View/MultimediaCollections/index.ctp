<div class="multimediaCollections index">
	<h2><?php echo __('Multimedia Collections'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('multimedia_collection_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_beloved_one_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($multimediaCollections as $multimediaCollection): ?>
	<tr>
		<td><?php echo h($multimediaCollection['MultimediaCollection']['id']); ?>&nbsp;</td>
		<td><?php echo h($multimediaCollection['MultimediaCollection']['name']); ?>&nbsp;</td>
		<td><?php echo h($multimediaCollection['MultimediaCollection']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($multimediaCollection['MultimediaCollectionType']['name'], array('controller' => 'multimedia_collection_types', 'action' => 'view', $multimediaCollection['MultimediaCollectionType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($multimediaCollection['UserBelovedOne']['name'], array('controller' => 'user_beloved_ones', 'action' => 'view', $multimediaCollection['UserBelovedOne']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $multimediaCollection['MultimediaCollection']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $multimediaCollection['MultimediaCollection']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $multimediaCollection['MultimediaCollection']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimediaCollection['MultimediaCollection']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Multimedia Collection'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia Collection Types'), array('controller' => 'multimedia_collection_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection Type'), array('controller' => 'multimedia_collection_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Beloved Ones'), array('controller' => 'user_beloved_ones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Beloved One'), array('controller' => 'user_beloved_ones', 'action' => 'add')); ?> </li>
	</ul>
</div>
