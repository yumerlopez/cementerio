<?php $user1 = $this->Session->read('CurrentSessionUser');?>
<div class="col-color col-post">
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<?php
				foreach ($users as $key => $user) {
					echo '<div class="result_user">';
						echo '<div class="row">';
							echo '<div class="col-xs-3 col-sm-3 col-md-3">';
								echo '<img src="' . $this->webroot. 'img' . DS . $user['User']['url_image_thumb'] . '" class="result_user_img"/>';
							echo '</div>';
							echo '<div class="col-xs-9 col-sm-9 col-md-9 result_user_info">';
								echo $user['User']['name'] . ' ' . $user['User']['last_name'];
								if (isset($user['MyFriends']) && !empty($user['MyFriends'])) {
									if ($user['MyFriends']['UsersUsersStatus']['name'] === 'Por Aprobar') {
										echo '<button type="button" user_id="' . $user['User']['id'] . '" disabled>The petition was sent</button>';
									} else {
										echo '<button type="button" user_id="' . $user['User']['id'] . '" disabled>You are friends</button>';
									}
								} else {
									echo '<button type="button" user_id="' . $user['User']['id'] . '">Ask for friendship</button>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.result_user button').click(function(){
		var button = $(this);
		var user_id = $(this).attr('user_id');
		var friend_id = '<?php echo $user1['id'];?>';
		$.ajax({
			url:'<?php echo $this->Html->url(array("controller" => "users_users", "action" => "ask_for_friendship")); ?>',
			type:"POST",
			data: 'user_id=' + user_id + '&friend_id=' + friend_id,
			success: function(data) {
				button.attr('disabled','disabled');
				button.html("<?php echo __('The petition was sent')?>");
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				alert("<?php echo __('An error occurred in the petition')?>");
			}
		});
	});
</script>