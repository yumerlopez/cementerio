<h1><?php echo __('Login')?></h1>
<?php echo $this->Form->create('User', array('action' => 'login_register', 'novalidate' => 'novalidate', 'id' => 'UserLoginForm')); ?>
<?php	
	echo $this->Form->inputs(array('legend' => false,
								   'usernamelogin' => array('type' => 'email', 'label' => __('Email: '), 'required' => 'required'),
								   'passwordlogin' => array('type' => 'password', 'label' => __('Password: '), 'required' => 'required'),
								   'action' => array('type' => 'hide', 'required' => false, 'value' => 'login'),
								)
			);
	echo $this->Form->end(__('Login'));
?>