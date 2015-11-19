<div class="multimedia view">
<h2><?php echo __('Multimedia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($multimedia['Multimedia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($multimedia['Multimedia']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($multimedia['Multimedia']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($multimedia['Multimedia']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Multimedia Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($multimedia['MultimediaType']['name'], array('controller' => 'multimedia_types', 'action' => 'view', $multimedia['MultimediaType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Multimedia Collection'); ?></dt>
		<dd>
			<?php echo $this->Html->link($multimedia['MultimediaCollection']['name'], array('controller' => 'multimedia_collections', 'action' => 'view', $multimedia['MultimediaCollection']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Multimedia'), array('action' => 'edit', $multimedia['Multimedia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Multimedia'), array('action' => 'delete', $multimedia['Multimedia']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimedia['Multimedia']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Types'), array('controller' => 'multimedia_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Type'), array('controller' => 'multimedia_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Collections'), array('controller' => 'multimedia_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection'), array('controller' => 'multimedia_collections', 'action' => 'add')); ?> </li>
	</ul>
</div>
