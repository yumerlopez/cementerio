<div class="socialNetworkTypes index">
	<h2><?php echo __('Social Network Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('url_image'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($socialNetworkTypes as $socialNetworkType): ?>
	<tr>
		<td><?php echo h($socialNetworkType['SocialNetworkType']['id']); ?>&nbsp;</td>
		<td><?php echo h($socialNetworkType['SocialNetworkType']['name']); ?>&nbsp;</td>
		<td><?php echo h($socialNetworkType['SocialNetworkType']['description']); ?>&nbsp;</td>
		<td><?php echo h($socialNetworkType['SocialNetworkType']['url_image']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $socialNetworkType['SocialNetworkType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $socialNetworkType['SocialNetworkType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $socialNetworkType['SocialNetworkType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $socialNetworkType['SocialNetworkType']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Social Network Type'), array('action' => 'add')); ?></li>
	</ul>
</div>
