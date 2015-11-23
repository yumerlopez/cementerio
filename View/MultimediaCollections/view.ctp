<div class="col-color" id="content_info">
	<div class="row col-row">
		<div class="col-xs-9 col-sm-9 col-md-9">
			<h1><?php echo h($multimediaCollection['MultimediaCollection']['name']); ?></h1>
			<?php echo h($multimediaCollection['MultimediaCollection']['description']); ?>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3">
			<a href="javascript:void(0)" class="ajax" actionto="<?php echo $this->Html->url(array('controller' => 'multimedia', 'action' => 'add_multimedia', $multimedia_collection_type, $multimediaCollection['MultimediaCollection']['id'])); ?>">
				<?php
					if ($multimedia_collection_type === 'photo') {
						echo __('Add photos');
					}
					if ($multimedia_collection_type === 'video') {
						echo __('Add videos');
					}
				?>
			</a>
		</div>
	</div>
	<div class="row col-row">
		<?php
			if (!empty($multimediaCollection)) {
				$multimedia_rows = array_chunk($multimediaCollection['Multimedia'], 5);
//				print_r($multimedia_collection_rows);
				foreach ($multimedia_rows as $key => $multimedia_row) {
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
						foreach ($multimedia_row as $key1 => $multimedia) {
							echo '<div class="multimedia_collection">';
								echo '<a href="javascript:void(0)" class="ajax-multimedia" actionto="' . $this->Html->url(array('controller' => 'multimedia', 'action' => 'view', $multimedia['id'])) . '">';
									echo '<div class="multimedia_collection_front">';
										if ($multimedia['url'] !== '') {
											echo $this->Html->image($multimedia['url']);
										} else {
											echo $this->Html->image('user_profile/photo_album.png');
										}
									echo '</div>';
								echo '</a>';
								echo '<a href="javascript:void(0)" class="ajax-multimedia" actionto="' . $this->Html->url(array('controller' => 'multimedia', 'action' => 'view', $multimedia['id'])) . '">';
									echo $multimedia['name'];
								echo '</a>';
							echo '</div>';
						}
					echo '</div>';
				}
				
			}
		?>
	</div>
	<div class="img_view">
		<div class="cerrar">
			<span>CERRAR</span>
		</div>
		<div class="img_info"></div>
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
				}
			});
		});
		
		$('.ajax-multimedia').click(function(){
			var actionto = $(this).attr('actionto');
			$.ajax({
				url:actionto,
				type:"GET",
				success: function(data) {
					$('.img_info').html($(data).find('#content_info'));
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
					$('.img_view').show();
				}
			});
		});
		
		$('.cerrar').click(function(){
			$('.img_view').hide();
		});
	</script>
</div>
<!--<div class="multimediaCollections view">
<h2><?php echo __('Multimedia Collection'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($multimediaCollection['MultimediaCollection']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($multimediaCollection['MultimediaCollection']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($multimediaCollection['MultimediaCollection']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Multimedia Collection Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($multimediaCollection['MultimediaCollectionType']['name'], array('controller' => 'multimedia_collection_types', 'action' => 'view', $multimediaCollection['MultimediaCollectionType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Beloved One'); ?></dt>
		<dd>
			<?php echo $this->Html->link($multimediaCollection['UserBelovedOne']['name'], array('controller' => 'user_beloved_ones', 'action' => 'view', $multimediaCollection['UserBelovedOne']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Multimedia Collection'), array('action' => 'edit', $multimediaCollection['MultimediaCollection']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Multimedia Collection'), array('action' => 'delete', $multimediaCollection['MultimediaCollection']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimediaCollection['MultimediaCollection']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Collections'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Collection Types'), array('controller' => 'multimedia_collection_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection Type'), array('controller' => 'multimedia_collection_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Beloved Ones'), array('controller' => 'user_beloved_ones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Beloved One'), array('controller' => 'user_beloved_ones', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
