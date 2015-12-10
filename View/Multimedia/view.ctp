<div id="content_info">
	<?php $user = $this->Session->read('CurrentSessionUser');?>
	<div class="row col-row" id="multimedia_view">
		<?php
			if (isset($multimedia_previous['Multimedia']['id'])) {
				echo '<div class="multimedia_control previous">';
					echo '<span>';
						echo '<a href="javascript:void(0)" class="ajax-multimedia" actionto="' . $this->Html->url(array('controller' => 'multimedia', 'action' => 'view', $multimedia_previous['Multimedia']['id'])) . '">';
							echo 'Anterior';
						echo '</a>';
					echo '</span>';
				echo '</div>';
			}
		?>
		<div class="col-xs-7 col-sm-7 col-md-7">
			<div class="big_img">
				<?php
					if ($multimedia['MultimediaType']['name'] === 'Photo') {
						echo $this->Html->image($multimedia['Multimedia']['url']);
					}
					if ($multimedia['MultimediaType']['name'] === 'Video') {
						echo '<video controls src="' . $this->webroot . 'video' . DS . $multimedia['Multimedia']['url'] . '"></video>';
					}
				?>
			</div>
			<h1 class="multimedia_title">
				<?php echo h($multimedia['Multimedia']['name']) ?>
			</h1>
		</div>
		<div class="corners col-xs-5 col-sm-5 col-md-5 comments_box">
			<div class="big_img_description">
				<?php echo $multimedia['Multimedia']['description']; ?>
			</div>
			<div class="big_img_comments">
				<?php
					foreach ($multimedia['MultimediaComment'] as $key => $multimediaComment) {
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
						echo '<div class="comment">';
							echo '<b>' . $multimediaComment['User']['name'] . ' ' . $multimediaComment['User']['last_name'] . ':</b> ' . $multimediaComment['comment'] . '<br />' . $multimediaComment['created'];
						echo '</div>';
					}
				?>
			</div>
			<div class="new_comment">
				<?php echo $this->Form->create('MultimediaComment', array('controller' => 'multimedia_comments', 'action' => 'add')); ?>
					<?php
						echo $this->Form->hidden('multimedia_id', array('value' => $multimedia['Multimedia']['id']));
						echo $this->Form->hidden('user_id', array('value' => $user['id']));
						echo $this->Form->input('comment');
					?>
				<?php echo $this->Form->end(__('Submit')); ?>
			</div>
		</div>
		<?php
			if (isset($multimedia_next['Multimedia']['id'])) {
				echo '<div class="multimedia_control next">';
					echo '<span>';
						echo '<a href="javascript:void(0)" class="ajax-multimedia" actionto="' . $this->Html->url(array('controller' => 'multimedia', 'action' => 'view', $multimedia_next['Multimedia']['id'])) . '">';
							echo 'Proxima';
						echo '</a>';
					echo '</span>';
				echo '</div>';
			}
		?>
	</div>
	<script type="text/javascript">
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
	</script>
</div>

<!--<div class="multimedia view">
<h2><?php echo __('Multimedia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($multimedia['Multimedia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($multimedia['Multimedia']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($multimedia['Multimedia']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($multimedia['Multimedia']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Multimedia Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($multimedia['MultimediaType']['name'], array('controller' => 'multimedia_types', 'action' => 'view', $multimedia['MultimediaType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Multimedia Collection'); ?></dt>
		<dd>
			<?php echo $this->Html->link($multimedia['MultimediaCollection']['name'], array('controller' => 'multimedia_collections', 'action' => 'view', $multimedia['MultimediaCollection']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Multimedia'), array('action' => 'edit', $multimedia['Multimedia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Multimedia'), array('action' => 'delete', $multimedia['Multimedia']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $multimedia['Multimedia']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Types'), array('controller' => 'multimedia_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Type'), array('controller' => 'multimedia_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Multimedia Collections'), array('controller' => 'multimedia_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Multimedia Collection'), array('controller' => 'multimedia_collections', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
