<div class="col-color" id="content_info">
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h1><?php echo __('Edit User'); ?></h1>
		</div>
		<div class="users form">
			<?php echo $this->Form->create('User'); ?>
				<?php echo $this->Form->input('id');?>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('name', array('label' => __('Name*: '), 'required' => false)); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('last_name', array('label' => __('Last Name*: '), 'required' => false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('username', array('label' => __('Username*: '), 'required' => false)); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('gender_id', array('label' => __('Gender*: '), 'required' => false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('nationality_id', array('label' => __('Nationality*: '), 'required' => false)); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('user_status_id', array('label' => __('User Status*: '), 'required' => false)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('role_id', array('label' => __('Role*: '), 'required' => false)); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $this->Form->input('birth', array('label' => __('Birth*: '), 'required' => false, 'dateFormat' => __('YMD'), 'minYear' => date('Y') - 100,'maxYear' => date('Y'))); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<h4><?php echo __('Phones')?></h4>
						<?php
							if (!empty($this->data['UserPhone'])) {
								foreach ($this->data['UserPhone'] as $key => $value) {
									echo '<div class="phone_' . $key . '">';
										echo $this->Form->input('UserPhone.' . $key . '.number', array('label' => __('Number: '), 'required' => false, 'type' => 'tel'));
									echo '</div>';
								}
							}
						?>
						<div class="new_phones"></div>
						<img class="new_item_img" src="<?php echo $this->webroot . 'img/add.png'?>" alt="<?php echo __('Add new phone');?>" title="<?php echo __('Add new phone');?>" actionto="add" sectionto="phones"/>
						<img class="new_item_img" src="<?php echo $this->webroot . 'img/remove.png'?>" alt="<?php echo __('Remove new phone')?>" title="<?php echo __('Add new phone');?>" actionto="remove" sectionto="phones"/>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<h4><?php echo __('Emails')?></h4>
						<?php
							if (!empty($this->data['Email'])) {
								foreach ($this->data['Email'] as $key => $value) {
									echo '<div class="email_' . $key . '">';
										echo $this->Form->input('Email.' . $key . '.email_address', array('label' => __('Email Address: '), 'required' => false, 'type' => 'email'));
									echo '</div>';
								}
							}
						?>
						<div class="new_emails"></div>
						<img class="new_item_img" src="<?php echo $this->webroot . 'img/add.png'?>" alt="<?php echo __('Add new phone');?>" title="<?php echo __('Add new email address');?>" actionto="add" sectionto="emails"/>
						<img class="new_item_img" src="<?php echo $this->webroot . 'img/remove.png'?>" alt="<?php echo __('Remove new phone')?>" title="<?php echo __('Add email address');?>" actionto="remove" sectionto="emails"/>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<h4><?php echo __('Social Networks')?></h4>
						<?php
							if (!empty($this->data['SocialNetwork'])) {
								foreach ($this->data['SocialNetwork'] as $key => $value) {
									echo '<div class="social_network_' . $key . '">';
										echo '<div class="input text">';
											echo '<label for="SocialNetwork' . $key . 'SocialNetworkAccount">Social Network Account: </label>&nbsp;';
											echo $this->Form->input('SocialNetwork.' . $key . '.social_network_type_id', array('type' => 'select', 'required' => false, 'div'=>false, 'label'=>false, 'options' => $options, 'style' => 'width:200px'));
											echo $this->Form->input('SocialNetwork.' . $key . '.social_network_account', array('label' => __('Social Network Account: '), 'required' => false, 'type' => 'text', 'div'=>false, 'label'=>false));
										echo '</div>';
									echo '</div>';
								}
							}
						?>
						<div class="new_social_networks"></div>
						<img class="new_item_img" src="<?php echo $this->webroot . 'img/add.png'?>" alt="<?php echo __('Add new social network');?>" title="<?php echo __('Add new social network');?>" actionto="add" sectionto="social_networks"/>
						<img class="new_item_img" src="<?php echo $this->webroot . 'img/remove.png'?>" alt="<?php echo __('Remove new social network')?>" title="<?php echo __('Add social network');?>" actionto="remove" sectionto="social_networks"/>
					</div>
				</div>
				<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	</div>
	<script type="text/javascript">
		$('[id^="SocialNetwork"][id$="SocialNetworkTypeId"]').msDropdown().data("dd");

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
		$('.new_item_img').click(function (e) {
			var section_to = $(this).attr('sectionto');
			var items = '';
			var div_class = '';
			var input_type = '';
			var input_name_prefix = '';
			var input_name_sufix = '';
			switch(section_to) {
				case 'phones':
					items = $('[id^="UserPhone"][id$="Number"]');
					var countries = new Array();
					var values = new Array();
					div_class = 'phone_';
					input_type = 'tel';
					input_name_prefix = 'UserPhone';
					input_name_sufix = 'Number';
					break;
				case 'emails':
					items = $('[id^="Email"][id$="EmailAddress"]');
					div_class = 'email_';
					input_type = 'email';
					input_name_prefix = 'Email';
					input_name_sufix = 'EmailAddress';
					break;
				case 'social_networks':
					items = $('[id^="SocialNetwork"][id$="SocialNetworkAccount"]');
					div_class = 'social_network_';
					input_type = 'text';
					input_name_prefix = 'SocialNetwork';
					input_name_sufix = 'SocialNetworkAccount';
					break;
			}

			var actionto = $(this).attr('actionto');
			if (actionto === 'add') {
				if (section_to === 'phones') {
					$('.new_phones input').each(function(){
						var country_data = $(this).intlTelInput("getSelectedCountryData");
						countries.push(country_data.iso2);
						values.push($(this).val());
					});
				}
				var new_items = $('.new_' + section_to);
				var new_item = '<div class="' + div_class + (items.length) + '">' +
									'<div class="input ' + input_type + '">' + 
										'<label for="' + input_name_prefix + (items.length) + input_name_sufix + '">' + (separate(input_name_sufix, ' ')) + ': </label>';
										if (section_to === 'social_networks') {
											new_item += '&nbsp;';
											new_item += '<select name="data[SocialNetwork]['+ (items.length) +'][social_network_type_id]" style="width:200px" id="SocialNetwork'+ (items.length) +'SocialNetworkTypeId">';
											var options_json = <?php echo $options_json; ?>;
											for (var i = 0; i < options_json.length; i++) {
												new_item += '<option value="' + options_json[i]["value"] + '" data-image="' + options_json[i]["data-image"] + '">' + options_json[i]["name"] + '</option>';
											}
											new_item += '</select>';
										}
										new_item += '<input name="data[' + input_name_prefix + '][' + (items.length) + '][' + (lowering(input_name_sufix)) + ']" maxlength="1000" type="' + input_type + '" id="' + input_name_prefix + (items.length) + input_name_sufix + '">' + 
									'</div>' + 
								'</div>';
				new_items.html(new_items.html() + new_item);
				if (section_to === 'phones') {
					$('input[id="UserPhone' + (items.length) + 'Number"]').intlTelInput({
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
					$('.new_phones div[class^="phone_"]').not('div[class="phone_' + (items.length) + '"]').each(function(){
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
				}
				if (section_to === 'social_networks') {
					$('[id="SocialNetwork' + (items.length) + 'SocialNetworkTypeId"]').msDropdown().data("dd");
				}
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
				if (items.length > 0) {
					$('.' + div_class + (items.length - 1)).remove();
				}
			}
		});
		$('#UserEditForm').submit(function(event) {
			$('input[id^="UserPhone"]').each(function(){
				var intlNumber = $(this).intlTelInput("getNumber");
				if (intlNumber) {
					$(this).val(intlNumber);
				}
			});
		});

		function lowering(str) {
			var string = separate(str, '_');
			return string.toLowerCase();
		}

		function separate(str, by) {
			var array = str.match(/[A-Z][a-z]+/g);
			return array.join(by);
		}
	</script>
</div>