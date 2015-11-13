<?php $user = $this->Session->read('CurrentSessionUser');?>
<div class="row user_profile_menu">
	<div class="col-xs-2 col-sm-2 col-md-12 options">
		<a href="javascript:void(0)" actionto="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>">
			<img src="<?php echo $this->webroot . 'img/user_profile/edit_user.png'?>" width="70px" height="70px" alt="<?php echo __('Edit General Information')?>" title="<?php echo __('Edit General Information')?>"/>
		</a>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-12 options">
		<a href="javascript:void(0)" actionto="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'set_edit_user_picture', $user['id'])); ?>">
			<img src="<?php echo $this->webroot . 'img/user_profile/profile_photo.png'?>" width="70px" alt="<?php echo __('Set/Edit User Picture')?>" title="<?php echo __('Set/Edit User Picture')?>"/>
		</a>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-12 options">
		<a href="javascript:void(0)" actionto="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add')); ?>">
			<img src="<?php echo $this->webroot . 'img/user_profile/setting.png'?>" width="70px" height="70px" alt="<?php echo __('Add User Test')?>" title="<?php echo __('Add User Test')?>"/>
		</a>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-12 options">
		<a href="javascript:void(0)" actionto="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>">
			<img src="<?php echo $this->webroot . 'img/user_profile/warning.png'?>" width="70px" height="70px" alt="<?php echo __('Edit Your Information')?>" title="<?php echo __('Edit Your Information')?>"/>
		</a>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-12 options">
		<a href="javascript:void(0)" actionto="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>">
			<img src="<?php echo $this->webroot . 'img/user_profile/security.png'?>" width="70px" height="70px" alt="<?php echo __('Edit Your Information')?>" title="<?php echo __('Edit Your Information')?>"/>
		</a>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-12 options">
		<a href="javascript:void(0)" actionto="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>">
			<img src="<?php echo $this->webroot . 'img/user_profile/faq.png'?>" width="70px" height="70px" alt="<?php echo __('Edit Your Information')?>" title="<?php echo __('Edit Your Information')?>"/>
		</a>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-12 options">
		<a href="javascript:void(0)" actionto="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>">
			<img src="<?php echo $this->webroot . 'img/user_profile/calendar.png'?>" width="70px" height="70px" alt="<?php echo __('Edit Your Information')?>" title="<?php echo __('Edit Your Information')?>"/>
		</a>
	</div>
</div>
<script type="text/javascript">
	$('.options a').click(function(){
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