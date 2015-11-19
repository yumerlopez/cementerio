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
<div class="multimedia form">
<?php echo $this->Form->create('Multimedia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Multimedia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('url');
		echo $this->Form->input('multimedia_type_id');
		echo $this->Form->input('multimedia_collection_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Multimedia.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Multimedia.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Multimedia Types'), array('controller' => 'multimedia_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Type'), array('controller' => 'multimedia_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Collections'), array('controller' => 'multimedia_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection'), array('controller' => 'multimedia_collections', 'action' => 'add')); ?> </li>
	</ul>
</div>
