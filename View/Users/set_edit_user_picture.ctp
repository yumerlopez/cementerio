<div id="content_info">
	<div class="row col-row">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="users form">
				<h1><?php echo __('Set or Edit Your Picture'); ?></h1>
				<?php echo $this->Form->create('User'); ?>
					<?php echo $this->Form->input('id');?>
					<div class="dropzone" data-width="1000" data-ajax="false" data-ghost="false" data-originalsize="false" data-height="1000" style="width: 100%;" data-save-original="true">
						<input type="file" name="data[User][url-image]" required="required" />
					</div>
				<?php echo $this->Form->end(__('Submit')); ?>
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<h1><?php echo __('Your Current Picture'); ?></h1>
			<?php echo $this->Html->image($this->request->data['User']['url_image'], array('width' => '70%'))?>
		</div>
	</div>
	<script type="text/javascript">
		$('.dropzone').html5imageupload();
	</script>
</div>