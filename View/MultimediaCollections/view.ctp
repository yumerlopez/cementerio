<div class="multimediaCollections view">
<h2><?php echo __('Multimedia Collection'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($multimediaCollection['MultimediaCollection']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($multimediaCollection['MultimediaCollection']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($multimediaCollection['MultimediaCollection']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Multimedia Collection Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($multimediaCollection['MultimediaCollectionType']['name'], array('controller' => 'multimedia_collection_types', 'action' => 'view', $multimediaCollection['MultimediaCollectionType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Beloved One'); ?></dt>
		<dd>
			<?php echo $this->Html->link($multimediaCollection['UserBelovedOne']['name'], array('controller' => 'user_beloved_ones', 'action' => 'view', $multimediaCollection['UserBelovedOne']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Multimedia Collection'), array('action' => 'edit', $multimediaCollection['MultimediaCollection']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Multimedia Collection'), array('action' => 'delete', $multimediaCollection['MultimediaCollection']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimediaCollection['MultimediaCollection']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Collections'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Collection Types'), array('controller' => 'multimedia_collection_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection Type'), array('controller' => 'multimedia_collection_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Beloved Ones'), array('controller' => 'user_beloved_ones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Beloved One'), array('controller' => 'user_beloved_ones', 'action' => 'add')); ?> </li>
	</ul>
</div>
