<div class="multimediaComments index">
	<h2><?php echo __('Multimedia Comments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('multimedia_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($multimediaComments as $multimediaComment): ?>
	<tr>
		<td><?php echo h($multimediaComment['MultimediaComment']['id']); ?>&nbsp;</td>
		<td><?php echo h($multimediaComment['MultimediaComment']['comment']); ?>&nbsp;</td>
		<td><?php echo h($multimediaComment['MultimediaComment']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($multimediaComment['Multimedia']['name'], array('controller' => 'multimedia', 'action' => 'view', $multimediaComment['Multimedia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($multimediaComment['User']['name'], array('controller' => 'users', 'action' => 'view', $multimediaComment['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $multimediaComment['MultimediaComment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $multimediaComment['MultimediaComment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $multimediaComment['MultimediaComment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimediaComment['MultimediaComment']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Multimedia Comment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia'), array('controller' => 'multimedia', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia'), array('controller' => 'multimedia', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
