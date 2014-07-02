<?php	
	get_header(); 
?>
		<div id="body-wrapper">	
			<div class="content">
				
				<div class="contents">
					<div id="content-left">
						<?php get_template_part("content","left"); ?>
					</div>
					
					<div id="content-right">
						<?php get_template_part("content","category"); ?>
					</div>
				</div>
		
			</div>
		</div>
<?php 
	get_footer(); 
?>