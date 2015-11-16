<div class="multimediaTypes view">
<h2><?php echo __('Multimedia Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($multimediaType['MultimediaType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($multimediaType['MultimediaType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($multimediaType['MultimediaType']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Multimedia Type'), array('action' => 'edit', $multimediaType['MultimediaType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Multimedia Type'), array('action' => 'delete', $multimediaType['MultimediaType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimediaType['MultimediaType']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia'), array('controller' => 'multimedia', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia'), array('controller' => 'multimedia', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Multimedia'); ?></h3>
	<?php if (!empty($multimediaType['Multimedia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Multimedia Type Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($multimediaType['Multimedia'] as $multimedia): ?>
		<tr>
			<td><?php echo $multimedia['id']; ?></td>
			<td><?php echo $multimedia['name']; ?></td>
			<td><?php echo $multimedia['description']; ?></td>
			<td><?php echo $multimedia['url']; ?></td>
			<td><?php echo $multimedia['multimedia_type_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'multimedia', 'action' => 'view', $multimedia['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'multimedia', 'action' => 'edit', $multimedia['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'multimedia', 'action' => 'delete', $multimedia['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimedia['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Multimedia'), array('controller' => 'multimedia', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
