<h1><?php echo __('Register')?></h1>
<?php
	echo $this->Form->create('User', array('action' => 'login_register', 'novalidate' => 'novalidate', 'id' => 'UserRegisterForm'));
	echo $this->Form->inputs(array('legend' => false,
								   'name' => array('label' => __('Name: '), 'required' => false),
								   'last_name' => array('label' => __('Last Name: '), 'required' => false),
								   'username' => array('type' => 'email', 'label' => __('Email: '), 'required' => false),
								   'password' => array('type' => 'password', 'label' => __('Password: '), 'required' => false),
//								   'role_id' => array('type' => 'hide', 'required' => false, 'value' => $role_id),
								   'action' => array('type' => 'hide', 'required' => false, 'value' => 'register'),
								)
			);
	echo $this->Form->end(__('Register'));
?>