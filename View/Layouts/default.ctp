<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->element('Layouts/head'); ?>
	</head>
	<body>
		<?php $user = $this->Session->read('CurrentSessionUser');?>
		<div class="container-fluid">
			<?php echo $this->element('Layouts/header'); ?>
		</div>
		<div class="container-fluid">
			<div class="row" style="margin-bottom: 20px; margin-top: 20px;">
				<div class="col-xs-2 col-sm-2 col-md-2 col-color left default-layout-panel">
					<?php // print_r($user);?>
					<div>
						<a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "user_profile", $user['id'])) ?>">
							<?php echo $this->Html->image($user['url_image_thumb'], array('width' => '50px')); ?>
						</a>
						<a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "user_profile", $user['id'])) ?>">
							<?php echo $user['name'] . ' ' . $user['last_name']; ?>
						</a>
					</div>
					<div>
						Grupos
					</div>
					<div>
						Listas
					</div>
				</div>
				<!--<div class="col-md-1">.col-md-1</div>-->
				<div class="col-xs-8 col-sm-8 col-md-8 col-center">
					<?php echo $this->element('Layouts/messages'); ?>
					<?php echo $content_for_layout;?>
				</div>
				<!--<div class="col-md-1">.col-md-1</div>-->
				<div class="col-xs-2 col-sm-2 col-md-2 col-color right default-layout-panel">
					notificaciones, actividades de los amigos
				</div>
			</div>
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
