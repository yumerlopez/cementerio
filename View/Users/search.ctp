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
								echo '<button type="button">Ask for friendship</button>';
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
		var user_id = $(this).attr('user_id');
		var friend_id = '<?php echo $user1['id'];?>';
		$.ajax({
			url:'<?php echo $this->Html->url(array("controller" => "users_users", "action" => "ask_for_friendship")); ?>',
			type:"POST",
			data: 'user_id=' + user_id + '&friend_id=' + friend_id,
			success: function(data) {
				alert("exito");
//			  var content_info = $(data).find('#content_info');
//			  $('#content').html(content_info);
//			  document.addEventListener("DOMContentLoaded", function() {
//				var elements = document.getElementsByTagName("INPUT");
//				for (var i = 0; i < elements.length; i++) {
//					elements[i].oninvalid = function(e) {
//						e.target.setCustomValidity("");
//						if (!e.target.validity.valid) {
//							e.target.setCustomValidity('<?php echo __('This field cannot be left blank or is invalid')?>');
//						}
//					};
//					elements[i].oninput = function(e) {
//						e.target.setCustomValidity("");
//					};
//				}
//			});
//			$('form').each(function(){
//				var max_width = 0;
//				$('#' + $(this).attr('id') + ' label').each(function(){
//					if (max_width < $(this).width()) {
//						max_width = $(this).width();
//					}
//				});
//				if (max_width !== 0) {
//					$('#' + $(this).attr('id') + ' label').each(function(){
//						if (max_width !== $(this).width()) {
//							$(this).css('margin-right', max_width - $(this).width());
//						}
//					});
//				}
//			});
			}
		});
	});
</script>