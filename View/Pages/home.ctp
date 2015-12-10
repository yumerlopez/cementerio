<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>
<div class="col-color col-post default-layout-panel corners">
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="post_header">
				<h4><?php echo __('Make a new post'); ?></h4>
			</div>
			<?php echo $this->Form->create('MultimediaComment', array('controller' => 'multimedia_comments', 'action' => 'rrr')); ?>
				<?php
//					echo $this->Form->hidden('multimedia_id', array('value' => $multimedia['Multimedia']['id']));
//					echo $this->Form->hidden('user_id', array('value' => $user['id']));
					echo $this->Form->input('comment', array('label' => false, 'style' => 'width: 100%; resize: none;'));
				?>
			<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	</div>
</div>
<?php
	foreach ($results as $date => $result_array) {
		foreach ($result_array as $key => $result) {
			if (key($result) === 'Photo') {
				echo '<div class="col-color col-post default-layout-panel corners">' . 
						'<div class="row col-row">' . 
							'<div class="col-xs-12 col-sm-12 col-md-12">' .
								'<div class="post_header">' . 
									'<h4>' . __('New photo in: ') . $result['Photo']['MultimediaCollection']['name'] . '</h4>' . 
									'<span>' . $date . '<span>' . 
								'</div>' . 
								'<div class="post_body">' . 
									$this->Html->image($result['Photo']['url']) . 
									'<span>' . 
										'<b>' . $result['Photo']['name'] . ': </b>' . 
										'<p>' . $result['Photo']['description'] . '</p>' . 
									'</span>' . 
								'</div>' . 
							'</div>' .
						'</div>' . 
				'</div>';
		   }
		   if (key($result) === 'Video') {
			   echo '<div class="col-color col-post default-layout-panel corners">' . 
						'<div class="row col-row">' . 
							'<div class="col-xs-12 col-sm-12 col-md-12">' .
								'<div class="post_header">' . 
									'<h4>' . __('New video in: ') . $result['Video']['MultimediaCollection']['name'] . '</h4>' . 
									'<span>' . $date . '<span>' . 
								'</div>' . 
								'<div class="post_body">' . 
									'<video src="' . $this->webroot . 'video' . DS . $result['Video']['url'] . '"></video>' .		
									'<span>' . 
										'<b>' . $result['Video']['name'] . ': </b>' . 
										'<p>' . $result['Video']['description'] . '</p>' . 
									'</span>' . 
								'</div>' . 
							'</div>' .
						'</div>' . 
				'</div>';
		   }
		   if (key($result) === 'Event') {
			   echo '<div class="col-color col-post default-layout-panel corners">' . 
						'<div class="row col-row">' . 
							'<div class="col-xs-12 col-sm-12 col-md-12">' .
								'<div class="post_header">' . 
									'<h4>' . __('New event regarding of: ') . $result['Event']['UserBelovedOne']['full_name'] . '</h4>' . 
									'<span>' . $date . '<span>' . 
								'</div>' . 
								'<div class="post_body">' . 
									'<span>' . 
										'<b>' . $result['Event']['name'] . ': </b>' . 
										'<p>' . $result['Event']['description'] . '</p>' . 
										'<p>From:' . $result['Event']['start'] . ' - To: ' . $result['Event']['end'] . '</p>' . 
									'</span>' . 
								'</div>' . 
							'</div>' .
						'</div>' . 
				'</div>';
		   }
		   if (key($result) === 'Post') {
			   echo '<div class="col-color col-post default-layout-panel">' . 
						'<div class="row col-row">' . 
							'<div class="col-xs-12 col-sm-12 col-md-12">' .
								'Nuevo post: ' . $date . 
							'</div>' .
						'</div>' . 
				'</div>';
		   }
	   }
   }
?>

<!--<div class="col-color col-post default-layout-panel">
	<div class="row col-row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<iframe width="420" height="345" src="http://www.youtube.com/embed/XGSy3_Czz8k"></iframe>
		</div>
	</div>
</div>-->