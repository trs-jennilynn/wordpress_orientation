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
						<div class="section-content">	
								<div class="container">
									<div class="row">
										<div class="page-content">
										<?php _e("エラー404：ページが見つかりません。")?>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
		
			</div>
		</div>
<?php 
	get_footer(); 
?>