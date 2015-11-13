<div class="socialNetworkTypes view">
<h2><?php echo __('Social Network Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($socialNetworkType['SocialNetworkType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($socialNetworkType['SocialNetworkType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($socialNetworkType['SocialNetworkType']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Image'); ?></dt>
		<dd>
			<?php echo h($socialNetworkType['SocialNetworkType']['url_image']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Social Network Type'), array('action' => 'edit', $socialNetworkType['SocialNetworkType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Social Network Type'), array('action' => 'delete', $socialNetworkType['SocialNetworkType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $socialNetworkType['SocialNetworkType']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Network Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Network Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
