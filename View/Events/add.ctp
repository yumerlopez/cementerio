<?php $user = $this->Session->read('CurrentSessionUser');?>
<div class="col-color" id="content_info">
	<?php echo $this->Html->script(array('tiny_mce/tinymce.min.js'));?>
	<script type="text/javascript">
		tinymce.init({
			selector: "textarea",
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});
	</script>
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h1><?php echo __('Add event for your ') . strtolower($userBelovedOne['UserBelovedOneRelationship']['name']) . " " . $userBelovedOne['UserBelovedOne']['full_name']; ?></h1>
		</div>
		<div class="events form">
			<?php echo $this->Form->create('Event'); ?>
				<div class="row">
					<?php echo $this->Form->hidden('user_beloved_one_id', array('value' => $userBelovedOne['UserBelovedOne']['id'])); ?>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<?php echo $this->Form->input('name', array('label' => __('Name*: '), 'required' => false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<?php echo $this->Form->input('description', array('label' => __('Description*: '), 'required' => false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('start', array('label' => __('Birth Date*: '), 'required' => false, 'dateFormat' => __('YMD'), 'minYear' => date('Y') - 100,'maxYear' => date('Y'))); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('end', array('label' => __('Date of Death*: '), 'required' => false, 'dateFormat' => __('YMD'), 'minYear' => date('Y') - 100,'maxYear' => date('Y'))); ?>
					</div>
				</div>
			<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	</div>
</div>
