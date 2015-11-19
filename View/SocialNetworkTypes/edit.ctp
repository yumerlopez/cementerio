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
<div class="socialNetworkTypes form">
<?php echo $this->Form->create('SocialNetworkType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Social Network Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('url_image');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SocialNetworkType.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('SocialNetworkType.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Social Network Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
