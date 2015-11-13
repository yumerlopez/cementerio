<?php $user = $this->Session->read('CurrentSessionUser'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->element('Layouts/head'); ?>
	</head>
	<body>
		<div class="container-fluid">
			<?php echo $this->element('Layouts/header'); ?>
		</div>
		<div class="container-fluid">
			<div class="row" style="margin-bottom: 20px; margin-top: 20px;">
				<div class="col-xs-12 col-sm-12 col-md-1 col-color left">
					<?php echo $this->element('Layouts/user_profile_sidebar_menu'); ?>
				</div>
				<!--<div class="col-md-1">.col-md-1</div>-->
				<div class="col-xs-12 col-sm-12 col-md-11 left">
					<?php echo $this->element('Layouts/messages'); ?>
					<?php echo $content_for_layout;?>
				</div>
			</div>
		</div>
	</body>
</html>
