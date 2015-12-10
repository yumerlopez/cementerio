<?php $user = $this->Session->read('CurrentSessionUser');?>
<div id="content_info">
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
			<h1>
				<?php
					if ($multimedia_type === 'photo') {
						echo __('Add Photo of your ') . strtolower($userBelovedOne['UserBelovedOneRelationship']['name']) . " " . $userBelovedOne['UserBelovedOne']['name'] . ' ' . $userBelovedOne['UserBelovedOne']['last_name'];
					}
					if ($multimedia_type === 'video') {
						echo __('Add Video of ') . strtolower($userBelovedOne['UserBelovedOneRelationship']['name']) . " " . $userBelovedOne['UserBelovedOne']['name'] . ' ' . $userBelovedOne['UserBelovedOne']['last_name'];
					}
				?>
			</h1>
		</div>
		<div class="multimedia form">
			<?php echo $this->Form->create('Multimedia', array('type' => 'file', 'novalidate' => true)); ?>
				<div class="row">
					<?php echo $this->Form->hidden('multimedia_type_id', array('value' => $multimediaType['MultimediaType']['id'])); ?>
					<?php echo $this->Form->hidden('multimedia_collection_id', array('value' => $multimediaCollection['MultimediaCollection']['id'])); ?>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('name', array('label' => __('Name*: '), 'required' => false)); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php
							if ($multimedia_type === 'photo') {
								echo $this->Form->input('multimedia_file', array('type' => 'file', 'accept' => 'image/*', 'label' => __('Select photo*: '), 'required' => false));
							}
							if ($multimedia_type === 'video') {
								echo $this->Form->input('multimedia_file', array('type' => 'file', 'accept' => 'video/*', 'label' => __('Select video*: '), 'required' => false));
							}
						?>
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
