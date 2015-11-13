<?php echo $this->Html->charset('UTF-8');?>
<title>
	<?php echo 'Heavenlinks' ?>:
	<?php echo $this->fetch('title'); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	echo $this->Html->meta('icon');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>
<?php // echo $this->Html->css('bootstrap.min.css');?>
<?php echo $this->Html->css('bootstrap.css');?>
<?php echo $this->Html->css('heavenlinks.css');?>
<?php // echo $this->Html->css('demo.css');?>
<?php echo $this->Html->css('intlTelInput.css');?>
<?php echo $this->Html->css('dd.css');?>

<?php echo $this->Html->script('jquery-2.1.3.min.js');?>
<?php echo $this->Html->script('bootstrap.min.js');?>
<?php echo $this->Html->script('jquery.maskedinput.min.js');?>
<?php echo $this->Html->script('intlTelInput.min.js');?>
<?php // echo $this->Html->script('jquery.ddslick.min.js');?>
<?php // echo $this->Html->script('jquery.ddslick.js');?>
<?php echo $this->Html->script('jquery.dd.min.js');?>


<?php echo $this->Html->css('ver/demo.html5imageupload.css');?>
<?php echo $this->Html->script('ver/html5imageupload.min.js');?>
<?php echo $this->Html->script('ver/i18next.min.js');?>