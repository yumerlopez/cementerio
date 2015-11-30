<div class="col-color col-post">
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<?php
				foreach ($users as $key => $user) {
					echo '<div class="result_user">';
						echo $user['User']['name'] . ' ' . $user['User']['last_name'];
					echo '</div>';
				}
			?>
		</div>
	</div>
</div>