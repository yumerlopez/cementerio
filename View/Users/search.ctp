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
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			?>
		</div>
	</div>
</div>