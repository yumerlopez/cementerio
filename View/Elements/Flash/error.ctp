<a href="#" style="text-decoration: none;" id="close_message" title="Para cerrar este mensaje haga click">
	<div id="flashMessage" class="error_flash">
		<?php echo h($message) ?>
	</div>
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