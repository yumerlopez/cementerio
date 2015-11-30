<div class="col-color" id="content_info">
	<div class="row col-row">
		<div class="col-xs-9 col-sm-9 col-md-9">
			<h1><?php echo __('Events related to your ') . strtolower($user_beloved_one['UserBelovedOneRelationship']['name']) . " " . $user_beloved_one['UserBelovedOne']['name'] . ' ' . $user_beloved_one['UserBelovedOne']['last_name']; ?></h1>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3">
			<a href="javascript:void(0)" class="ajax" actionto="<?php echo $this->Html->url(array('action' => 'add', $user_beloved_one['UserBelovedOne']['id'])); ?>">
				<?php echo __('Add a event'); ?>
			</a>
		</div>
	</div>
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<table cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('start'); ?></th>
						<th><?php echo $this->Paginator->sort('end'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($events as $event): ?>
						<tr>
							<td><?php echo h($event['Event']['name']); ?>&nbsp;</td>
							<td><?php echo h($event['Event']['start']); ?>&nbsp;</td>
							<td><?php echo h($event['Event']['end']); ?>&nbsp;</td>
							<td class="actions">
								<a href="javascript:void(0)" class="ajax" actionto="<?php echo $this->Html->url(array('action' => 'view', $event['Event']['id'])); ?>">
									<?php echo __('View'); ?>
								</a>
								<a href="javascript:void(0)" class="ajax" actionto="<?php echo $this->Html->url(array('action' => 'edit', $event['Event']['id'])); ?>">
									<?php echo __('Edit'); ?>
								</a>
								<?php // echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), array('confirm' => __('Are you sure you want to delete event %s?', $event['Event']['name']))); ?>
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
