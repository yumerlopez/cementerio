<div class="multimediaCollectionTypes view">
<h2><?php echo __('Multimedia Collection Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($multimediaCollectionType['MultimediaCollectionType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($multimediaCollectionType['MultimediaCollectionType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($multimediaCollectionType['MultimediaCollectionType']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Multimedia Collection Type'), array('action' => 'edit', $multimediaCollectionType['MultimediaCollectionType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Multimedia Collection Type'), array('action' => 'delete', $multimediaCollectionType['MultimediaCollectionType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimediaCollectionType['MultimediaCollectionType']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Collection Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Collections'), array('controller' => 'multimedia_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection'), array('controller' => 'multimedia_collections', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Multimedia Collections'); ?></h3>
	<?php if (!empty($multimediaCollectionType['MultimediaCollection'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Multimedia Collection Type Id'); ?></th>
		<th><?php echo __('User Beloved One Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($multimediaCollectionType['MultimediaCollection'] as $multimediaCollection): ?>
		<tr>
			<td><?php echo $multimediaCollection['id']; ?></td>
			<td><?php echo $multimediaCollection['name']; ?></td>
			<td><?php echo $multimediaCollection['description']; ?></td>
			<td><?php echo $multimediaCollection['multimedia_collection_type_id']; ?></td>
			<td><?php echo $multimediaCollection['user_beloved_one_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'multimedia_collections', 'action' => 'view', $multimediaCollection['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'multimedia_collections', 'action' => 'edit', $multimediaCollection['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'multimedia_collections', 'action' => 'delete', $multimediaCollection['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimediaCollection['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Multimedia Collection'), array('controller' => 'multimedia_collections', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
