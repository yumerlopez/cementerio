<a href="#" style="text-decoration: none;" id="close_message" title="Para cerrar este mensaje haga click">
	<?php echo $this->Session->flash(); ?>
</a>
<script>
//        setTimeout(function() {
//        $('#aquivaelflash').fadeOut('fast');
//        }, 10000); // <-- time in milliseconds

	$("#close_message").click(function(event){
		event.preventDefault();
		$("#flashMessage").fadeOut('fast');
	});
</script>