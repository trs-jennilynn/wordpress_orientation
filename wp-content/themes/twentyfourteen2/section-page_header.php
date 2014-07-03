<?php
get_header();
?>
		<div id="body-wrapper">	
			<div class="content page">
				
				<div class="contents">
					<div id="content-left">
						<div id class="left-nav-bar section">
							<div class="section-content">
								<div class="container">
									<?php get_template_part("section","page_sidebar"); ?>
								</div>
							</div>
						</div>
						<?php get_template_part("content","left"); ?>
					</div>
					
					<div id="content-right">
						