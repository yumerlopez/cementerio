<div class="row register col-color" id="content_info">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="users form">
			<?php echo $this->Form->create('User', array('novalidate' => true)); ?>
				<h1><?php echo __('Register')?></h1>
				<?php
					echo $this->Form->input('name', array('label' => __('Name*: '), 'required' => false));
					echo $this->Form->input('last_name', array('label' => __('Last Name*: '), 'required' => false));
					echo $this->Form->input('username', array('label' => __('Email*: '), 'required' => false));
					echo $this->Form->input('password', array('label' => __('Passord*: '), 'required' => false));
					echo $this->Form->input('birth', array('label' => __('Birth*: '), 'required' => false, 'dateFormat' => __('YMD'), 'minYear' => date('Y') - 100,'maxYear' => date('Y')));
					echo $this->Form->input('gender_id', array('label' => __('Gender*: '), 'required' => false));
					echo $this->Form->input('nationality_id', array('label' => __('Nationality*: '), 'required' => false));

					if (isset($action) && $action === 'login_register') {
						echo $this->Form->hidden('user_status_id', array('value' => $user_status_id));
						echo $this->Form->hidden('role_id', array('value' => $role_id));
					} else {
						echo $this->Form->input('user_status_id', array('label' => __('Status*: '), 'required' => false));
						echo $this->Form->input('role_id', array('label' => __('Role*: '), 'required' => false));
					}
				?>
				<div>
					<h4><?php echo __('Phones')?></h4>
					<?php
						if (!empty($this->data['UserPhone'])) {
							foreach ($this->data['UserPhone'] as $key => $value) {
								echo $this->Form->input('UserPhone.' . $key . '.number', array('label' => __('Number: '), 'required' => false, 'type' => 'tel'));
							}
						} else {
							echo $this->Form->input('UserPhone.0.number', array('label' => __('Number: '), 'required' => false, 'type' => 'tel'));
						}
					?>
					<div class="new_phones"></div>
					<img class="new_phone_img" src="<?php echo $this->webroot . 'img/add.png'?>" alt="<?php echo __('Add new phone');?>" title="<?php echo __('Add new phone');?>" actionto="add"/>
					<img class="new_phone_img" src="<?php echo $this->webroot . 'img/remove.png'?>" alt="<?php echo __('Remove new phone')?>" title="<?php echo __('Add new phone');?>" actionto="remove"/>
				</div>
			<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	</div>
	<script type="text/javascript">
		$('input[type^="tel"]').intlTelInput({
			utilsScript: '<?php echo $this->Html->url('/', true); ?>' + 'intl-tel-input-master/lib/libphonenumber/build/utils.js',
			defaultCountry: "auto",
			geoIpLookup: function(callback) {
				$.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
					var countryCode = (resp && resp.country) ? resp.country : "";
					callback(countryCode);
				});
			},
		});
		$('.new_phone_img').click(function (e) {
			var phones = $('[id^="UserPhone"][id$="Number"]');
			var actionto = $(this).attr('actionto');
			if (actionto === 'add') {
				var countries = new Array();
				var values = new Array();
				$('.new_phones input').each(function(){
					var country_data = $(this).intlTelInput("getSelectedCountryData");
					countries.push(country_data.iso2);
					values.push($(this).val());
				});
				var new_phones = $('.new_phones');
				var new_phone = '<div class="new_phone_' + (phones.length) + '">' +
									'<div class="input tel">' + 
										'<label for="UserPhone' + (phones.length) + 'Number" style="margin-right: 14px;">Number: </label>' + 
										'<input name="data[UserPhone][' + (phones.length) + '][number]" maxlength="1000" type="tel" id="UserPhone' + (phones.length) + 'Number">' + 
									'</div>' + 
								'</div>';
				new_phones.html(new_phones.html() + new_phone);
				$('input[id="UserPhone' + (phones.length) + 'Number"]').intlTelInput({
					utilsScript: '<?php echo $this->Html->url('/', true); ?>' + 'intl-tel-input-master/lib/libphonenumber/build/utils.js',
					defaultCountry: "auto",
					geoIpLookup: function(callback) {
						$.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
							var countryCode = (resp && resp.country) ? resp.country : "";
							callback(countryCode);
						});
					},
				});
				var i = 0;
				$('div[class^="new_phone_"]').not('div[class="new_phone_' + (phones.length) + '"]').each(function(){
					var input = $(this).find('input');
					var country = countries[i];
					var value = values[i];
					input.intlTelInput({
						utilsScript: '<?php echo $this->Html->url('/', true); ?>' + 'intl-tel-input-master/lib/libphonenumber/build/utils.js',
						defaultCountry: country,
					});
					input.val(value);
					i++;
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
						$('.placerholder').each(function(){
							if (max_width !== $(this).width()) {
								$(this).css('margin-left', max_width);
							}
						});
					}

				});
			} else if(actionto === 'remove') {
				if (phones.length > 1) {
					$('.new_phone_' + (phones.length - 1)).remove();
				}
			}
		});
		$('#UserAddForm').submit(function(event) {
			$('input[id^="UserPhone"]').each(function(){
				var intlNumber = $(this).intlTelInput("getNumber");
				if (intlNumber) {
					$(this).val(intlNumber);
				}
			});
		});
	</script>
</div>