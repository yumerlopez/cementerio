<?php $user = $this->Session->read('CurrentSessionUser');?>
<div class="row col-color header">
	<div class="col-xs-9 col-sm-9 col-md-9">
		<a style="float: left;" href="<?php echo $this->Html->url("/") ?>">HeavenLinks</a>
		<?php if (!empty($user)) { ?>
			<div style="float: left;">
				<?php echo $this->Form->create('User', array('action' => 'search')); ?>
					<?php
						echo $this->Form->input('search', array('label' => false, 'placeholder' => 'Search friends'));
					?>
				<?php echo $this->Form->end(__('Search')); ?>
			</div>
		<?php } ?>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 right">
		<?php if (!empty($user)) { ?>
			<a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "user_profile", $user['id'])) ?>"><?php echo __('User Profile')?></a> / 	
			<a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "logout")) ?>"><?php echo __('Logout')?></a>
		<?php } else { ?>
			&nbsp;
		<?php } ?>
	</div>
</div>