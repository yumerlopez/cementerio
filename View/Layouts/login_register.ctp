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
		<div class="container">
			<?php echo $content_for_layout;?>
		</div>
	</body>
	<script type="text/javascript">
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
		})
		
		$('form').each(function(){
//			alert($(this).attr('id'));
			var max_width = 0;
			$('#' + $(this).attr('id') + ' label').each(function(){
				if (max_width < $(this).width()) {
					max_width = $(this).width();
				}
			});
//			alert(max_width);
			if (max_width !== 0) {
				$('#' + $(this).attr('id') + ' label').each(function(){
					if (max_width !== $(this).width()) {
						$(this).css('margin-right', max_width - $(this).width());
					}
				});
			}
			
		});
	</script>
</html>
