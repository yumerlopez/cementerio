<div class="col-color" id="content_info">
	<div class="row col-row">
		<div class="col-xs-9 col-sm-9 col-md-9">
			<h1>
				<?php
					if ($multimedia_collection_type === 'photo') {
						echo __('Photo Albums of your ') . strtolower($user_beloved_one['UserBelovedOneRelationship']['name']) . " " . $user_beloved_one['UserBelovedOne']['name'] . ' ' . $user_beloved_one['UserBelovedOne']['last_name'];
					}
					if ($multimedia_collection_type === 'video') {
						echo __('Video Collection of ') . strtolower($user_beloved_one['UserBelovedOneRelationship']['name']) . " " . $user_beloved_one['UserBelovedOne']['name'] . ' ' . $user_beloved_one['UserBelovedOne']['last_name'];
					}
				?>
			</h1>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3">
			<a href="javascript:void(0)" class="ajax" actionto="<?php echo $this->Html->url(array('controller' => 'multimedia', 'action' => 'add', $multimedia_collection_type, $user_beloved_one['UserBelovedOne']['id'])); ?>">
				<?php
					if ($multimedia_collection_type === 'photo') {
						echo __('Add a photo');
					}
					if ($multimedia_collection_type === 'video') {
						echo __('Add a video');
					}
				?>
			</a>
		</div>
	</div>
	<div class="row col-row">
		<?php
			$multimedia_collections_rows = array_chunk($multimediaCollections, 5);
			foreach ($multimedia_collections_rows as $key => $multimedia_collections_row) {
				echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					foreach ($multimedia_collections_row as $key1 => $multimedia_collection) {
						echo '<div class="multimedia_collection">';
							if ($multimedia_collection['MultimediaCollection']['id'] !== 0) {
								echo '<a href="javascript:void(0)" class="ajax" actionto="' . $this->Html->url(array('action' => 'view', $multimedia_collection_type, $multimedia_collection['MultimediaCollection']['id'])) . '">';
									echo '<div class="multimedia_collection_front">';
										if ($multimedia_collection['MultimediaCollection']['img_url'] !== '') {
											echo $this->Html->image($multimedia_collection['MultimediaCollection']['img_url']);
										} else {
											echo $this->Html->image('user_profile/photo_album.png');
										}
									echo '</div>';
								echo '</a>';
								echo '<a href="javascript:void(0)" class="ajax" actionto="' . $this->Html->url(array('action' => 'view', $multimedia_collection_type, $multimedia_collection['MultimediaCollection']['id'])) . '">';
									echo $multimedia_collection['MultimediaCollection']['name'];
								echo '</a>';
							} else {
								echo '<a href="javascript:void(0)" class="ajax" actionto="' . $this->Html->url(array('action' => 'add', $multimedia_collection_type, $user_beloved_one['UserBelovedOne']['id'])) . '">';
									echo '<div class="multimedia_collection_front">';
										echo $this->Html->image('user_profile/photo_album.png');
									echo '</div>';
								echo '</a>';
								echo '<a href="javascript:void(0)" class="ajax" actionto="' . $this->Html->url(array('action' => 'add', $multimedia_collection_type, $user_beloved_one['UserBelovedOne']['id'])) . '">';
									if ($multimedia_collection_type === 'photo') {
										echo __('Add New Photo Album');
									}
									if ($multimedia_collection_type === 'video') {
										echo __('Add New Video Collection');
									}
								echo '</a>';
							}
						echo '</div>';
					}
				echo '</div>';
			}
		?>
	</div>
	<script type="text/javascript">
		$('.ajax').click(function(){
			var actionto = $(this).attr('actionto');
			$.ajax({
				url:actionto,
				type:"GET",
				success: function(data) {
				  $('#content').html($(data).find('#content_info'));
				  document.addEventListener("DOMContentLoaded", function() {
					var elements = document.getElementsByTagName("INPUT");
					for (var i = 0; i < elements.length; i++) {
						elements[i].oninvalid = function(e) {
							e.target.setCustomValidity("");
							if (!e.target.validity.valid) {
								e.target.setCustomValidity('<?php echo __('This field cannot be left blank or is invalid')?>');
							}
						};
						elements[i].oninput = function(e) {
							e.target.setCustomValidity("");
						};
					}
				});
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
					}
				});
				}
			});
		});
	</script>
</div>
