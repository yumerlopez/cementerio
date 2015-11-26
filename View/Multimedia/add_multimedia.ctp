<?php $user = $this->Session->read('CurrentSessionUser');?>
<div class="col-color" id="content_info">
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h1>
				<?php
					if ($multimedia_type === 'photo') {
						echo __('Add Photos to ') . $multimediaCollection['MultimediaCollection']['name'];
					}
					if ($multimedia_type === 'video') {
						echo __('Add Videos to ') . $multimediaCollection['MultimediaCollection']['name'];
					}
				?>
			</h1>
		</div>
		<div class="multimediaCollections form">
			<?php echo $this->Form->create('Multimedia', array('type' => 'file', 'novalidate' => true)); ?>
				<div class="row">
					<?php echo $this->Form->hidden('Multimedia.0.multimedia_type_id', array('value' => $multimediaType['MultimediaType']['id'])); ?>
					<?php echo $this->Form->hidden('Multimedia.0.multimedia_collection_id', array('value' => $multimediaCollection['MultimediaCollection']['id'])); ?>
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<?php
							if ($multimedia_type === 'photo') {
								echo $this->Form->input('Multimedia.0.multimedia_file', array('type' => 'file', 'accept' => 'image/*', 'label' => __('Select photo*: '), 'required' => false));
							}
							if ($multimedia_type === 'video') {
								echo $this->Form->input('Multimedia.0.multimedia_file', array('type' => 'file', 'accept' => 'video/*', 'label' => __('Select video*: '), 'required' => false));
							}
						?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4">
						<?php
							if ($multimedia_type === 'photo') {
								echo '<img id="Multimedia0Image" />';
							}
							if ($multimedia_type === 'video') {
								echo '<video id="Multimedia0Video" />';
							}
						?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-8">
						<?php echo $this->Form->input('Multimedia.0.name', array('label' => __('Name*: '), 'required' => false)); ?>
						<?php echo $this->Form->input('Multimedia.0.description', array('label' => __('Description*: '), 'required' => false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
					</div>
				</div>
				<div class="new_multimedia"></div>
				<img class="new_multimedia_img" src="<?php echo $this->webroot . 'img/add.png'?>" alt="<?php echo __('Add new multimedia');?>" title="<?php echo __('Add new multimedia');?>" actionto="add"/>
				<img class="new_multimedia_img" src="<?php echo $this->webroot . 'img/remove.png'?>" alt="<?php echo __('Remove new multimedia')?>" title="<?php echo __('Add new multimedia');?>" actionto="remove"/>
			<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	</div>
	<script type="text/javascript">
		bind_change_img_load();
		
		$('.new_multimedia_img').click(function (e) {
			var multimedia = $('[id^="Multimedia"][id$="MultimediaTypeId"]');
			var actionto = $(this).attr('actionto');
			if (actionto === 'add') {
				var new_multimedia = $('.new_multimedia');
				var new_multimedia_item = '<div class="new_multimedia_item_' + (multimedia.length) + '">' +
											'<div class="row">' + 
												'<input type="hidden" name="data[Multimedia][' + (multimedia.length) + '][multimedia_type_id]" value="<?php echo $multimediaType['MultimediaType']['id']; ?>" id="Multimedia' + (multimedia.length) + 'MultimediaTypeId">' + 
												'<input type="hidden" name="data[Multimedia][' + (multimedia.length) + '][multimedia_collection_id]" value="<?php echo $multimediaCollection['MultimediaCollection']['id']; ?>" id="Multimedia' + (multimedia.length) + 'MultimediaId">' + 
												'<div class="col-xs-12 col-sm-12 col-md-12">' + 
													'<div class="input file">' + 
														'<label for="Multimedia' + (multimedia.length) + 'MultimediaFile">Select photo*: </label>' + 
														'<input type="file" name="data[Multimedia][' + (multimedia.length) + '][multimedia_file]" accept="image/*" id="Multimedia' + (multimedia.length) + 'MultimediaFile">' + 
													'</div>' + 
												'</div>' + 
												'<div class="col-xs-12 col-sm-12 col-md-4">' + 
													'<img id="Multimedia' + (multimedia.length) + 'Image" />' + 
												'</div>' + 
												'<div class="col-xs-12 col-sm-12 col-md-8">' + 
													'<div class="input text">' + 
														'<label for="Multimedia' + (multimedia.length) + 'Name" style="margin-right: 46px;">Name*: </label>' + 
														'<input name="data[Multimedia][' + (multimedia.length) + '][name]" maxlength="1000" type="text" id="Multimedia' + (multimedia.length) + 'Name">' + 
													'</div>' + 
													'<div class="input textarea">' + 
														'<label for="Multimedia' + (multimedia.length) + 'Description" style="margin-right: 7px;">Description*: </label>' + 
														'<textarea name="data[Multimedia][' + (multimedia.length) + '][description]" cols="30" rows="6" id="Multimedia' + (multimedia.length) + 'Description"></textarea>' + 
													'</div>' + 
												'</div>' + 
											'</div>' + 
										  '</div>';
				new_multimedia.html(new_multimedia.html() + new_multimedia_item);
				$('form').each(function(){
					var max_width = 0;
					$('#' + $(this).attr('id') + ' label').each(function(){
						if (max_width < $(this).width()) {
							max_width = $(this).width();
						}
					});
					if (max_width !== 0) {
						$('#' + $(this).attr('id') + ' label').each(function(){
							if (max_width !== $(this).width()) {
								$(this).css('margin-right', max_width - $(this).width());
							}
						});
						$('.placerholder').each(function(){
							if (max_width !== $(this).width()) {
								$(this).css('margin-left', max_width);
							}
						});
					}

				});
				bind_change_img_load();
			} else if(actionto === 'remove') {
				if (multimedia.length > 1) {
					$('.new_multimedia_item_' + (multimedia.length - 1)).remove();
				}
			}
		});
		
		function bind_change_img_load() {
			$('[id^="Multimedia"][id$="MultimediaFile"]').change(function(evt){
				var index = $(this).attr('id');
				index = index.replace('Multimedia', '');
				index = index.replace('MultimediaFile', '');
				<?php if ($multimedia_type === 'photo') { ?>
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#Multimedia' + index + 'Image').attr('src', e.target.result);
					};
					reader.readAsDataURL(this.files[0]);
				<?php } ?>
				<?php if ($multimedia_type === 'video') { ?>
					var file = this.files[0];
					var type = file.type;
					var videoNode = document.querySelector('#Multimedia' + index + 'Video');
					var canPlay = videoNode.canPlayType(type);
					canPlay = (canPlay === '' ? 'no' : canPlay);
					var isError = canPlay === 'no';
					if (isError) {
						return;
					}

					var fileURL = URL.createObjectURL(file);
					$('#Multimedia' + index + 'Video').attr('src', fileURL);
				<?php } ?>
			});
		}
	</script>
</div>
