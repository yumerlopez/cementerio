<?php $user = $this->Session->read('CurrentSessionUser');?>
<div class="col-color col-post corners">
	<div class="row col-row">
		<div id="content" class="col-xs-12 col-sm-12 col-md-12 left">
		</div>
	</div>
</div>
<script type="text/javascript">	
	$.ajax({
        url:'<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>',
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
</script>