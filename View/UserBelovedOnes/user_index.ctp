<div class="col-color" id="content_info">
	<div class="row col-row">
		<div class="col-xs-9 col-sm-9 col-md-9">
			<h1><?php echo __('Your Beloved Ones'); ?></h1>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3">
			<a href="javascript:void(0)" class="ajax" actionto="<?php echo $this->Html->url(array('action' => 'add')); ?>">
				<?php echo __('Add a Beloved One'); ?>
			</a>
		</div>
	</div>
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<table cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('last_name'); ?></th>
						<th><?php echo $this->Paginator->sort('birth'); ?></th>
						<th><?php echo $this->Paginator->sort('death'); ?></th>
						<th><?php echo $this->Paginator->sort('user_beloved_one_relationship_id'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($userBelovedOnes as $userBelovedOne): ?>
						<tr>
							<td><?php echo h($userBelovedOne['UserBelovedOne']['name']); ?>&nbsp;</td>
							<td><?php echo h($userBelovedOne['UserBelovedOne']['last_name']); ?>&nbsp;</td>
							<td><?php echo h($userBelovedOne['UserBelovedOne']['birth']); ?>&nbsp;</td>
							<td><?php echo h($userBelovedOne['UserBelovedOne']['death']); ?>&nbsp;</td>
							<td><?php echo h($userBelovedOne['UserBelovedOneRelationship']['name']); ?>&nbsp;</td>
							<td class="actions">
								<?php echo $this->Html->link(__('View'), array('action' => 'view', $userBelovedOne['UserBelovedOne']['id'])); ?>
								<a href="javascript:void(0)" class="ajax" actionto="<?php echo $this->Html->url(array('action' => 'edit', $userBelovedOne['UserBelovedOne']['id'])); ?>">
									<?php echo __('Edit'); ?>
								</a>
								<?php // echo $this->Html->link(__('Edit'), array('action' => 'edit', $userBelovedOne['UserBelovedOne']['id'])); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userBelovedOne['UserBelovedOne']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userBelovedOne['UserBelovedOne']['id']))); ?>
								<a href="javascript:void(0)" class="ajax" actionto="<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'user_beloved_one_index', $userBelovedOne['UserBelovedOne']['id'])); ?>">
									<?php echo __('Events'); ?>
								</a>
								<?php // echo $this->Html->link(__('Events'), array('controller' => 'events', 'action' => 'user_beloved_one_index', $userBelovedOne['UserBelovedOne']['id'])); ?>
								<?php echo $this->Html->link(__('Photos'), array('action' => 'edit', $userBelovedOne['UserBelovedOne']['id'])); ?>
								<?php echo $this->Html->link(__('Videos'), array('action' => 'edit', $userBelovedOne['UserBelovedOne']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
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
