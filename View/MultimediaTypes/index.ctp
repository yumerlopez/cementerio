<div class="multimediaTypes index">
	<h2><?php echo __('Multimedia Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($multimediaTypes as $multimediaType): ?>
	<tr>
		<td><?php echo h($multimediaType['MultimediaType']['id']); ?>&nbsp;</td>
		<td><?php echo h($multimediaType['MultimediaType']['name']); ?>&nbsp;</td>
		<td><?php echo h($multimediaType['MultimediaType']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $multimediaType['MultimediaType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $multimediaType['MultimediaType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $multimediaType['MultimediaType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimediaType['MultimediaType']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Multimedia Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia'), array('controller' => 'multimedia', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia'), array('controller' => 'multimedia', 'action' => 'add')); ?> </li>
	</ul>
</div>
