<?php $user = $this->Session->read('CurrentSessionUser');?>
<div class="col-color" id="content_info">
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h1><?php echo __('Edit Your Beloved One'); ?></h1>
		</div>
		<div class="userBelovedOnes form">
			<?php echo $this->Form->create('UserBelovedOne'); ?>
				<?php echo $this->Form->input('id');?>
				<?php echo $this->Form->hidden('user_id', array('value' => $user['id'])); ?>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('name', array('label' => __('Name*: '), 'required' => false)); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('last_name', array('label' => __('Last Name*: '), 'required' => false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('birth', array('label' => __('Birth Date*: '), 'required' => false, 'dateFormat' => __('YMD'), 'minYear' => date('Y') - 100,'maxYear' => date('Y'))); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('death', array('label' => __('Date of Death*: '), 'required' => false, 'dateFormat' => __('YMD'), 'minYear' => date('Y') - 100,'maxYear' => date('Y'))); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<?php echo $this->Form->input('user_beloved_one_relationship_id', array('label' => __('Relationship*: '), 'requiredw' => false)); ?>
					</div>
				</div>
			<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	</div>
</div>
