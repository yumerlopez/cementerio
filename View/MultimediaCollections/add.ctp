<?php $user = $this->Session->read('CurrentSessionUser');?>
<div class="col-color" id="content_info">
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h1>
				<?php
					if ($multimedia_collection_type === 'photo') {
						echo __('Add Photo Albums of your ') . strtolower($userBelovedOne['UserBelovedOneRelationship']['name']) . " " . $userBelovedOne['UserBelovedOne']['name'] . ' ' . $userBelovedOne['UserBelovedOne']['last_name'];
					}
					if ($multimedia_collection_type === 'video') {
						echo __('Add Video Collection of ') . strtolower($userBelovedOne['UserBelovedOneRelationship']['name']) . " " . $userBelovedOne['UserBelovedOne']['name'] . ' ' . $userBelovedOne['UserBelovedOne']['last_name'];
					}
				?>
			</h1>
		</div>
		<div class="multimediaCollections form">
			<?php echo $this->Form->create('MultimediaCollection'); ?>
				<div class="row">
					<?php echo $this->Form->hidden('user_beloved_one_id', array('value' => $userBelovedOne['UserBelovedOne']['id'])); ?>
					<?php echo $this->Form->hidden('multimedia_collection_type_id', array('value' => $multimediaCollectionType['MultimediaCollectionType']['id'])); ?>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<?php echo $this->Form->input('name', array('label' => __('Name*: '), 'required' => false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<?php echo $this->Form->input('description', array('label' => __('Description*: '), 'required' => false)); ?>
					</div>
				</div>
			<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	</div>
</div>
