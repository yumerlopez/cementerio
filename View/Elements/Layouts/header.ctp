<?php $user = $this->Session->read('CurrentSessionUser');?>
<div class="row col-color header">
	<div class="col-xs-3 col-sm-3 col-md-3">
		<a style="float: left;" href="<?php echo $this->Html->url("/") ?>">
			<?php
				echo $this->Html->image('heavenlinks-logo.png', array('style' => 'height: 70px;'));
			?>
		</a>
	</div>
	<div class="col-xs-9 col-sm-9 col-md-9 right">
		<?php if (!empty($user)) { ?>
			<div>
				<?php echo $this->Form->create('User', array('action' => 'search')); ?>
					<?php
						echo $this->Form->input('search', array('label' => false, 'placeholder' => 'Search friends'));
					?>
				<?php echo $this->Form->end(__('Search')); ?>
			</div>
			<div style="clear: both;">
				<a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "logout")) ?>"><?php echo __('Logout')?></a>
			</div>
		<?php } ?>
	</div>
</div>