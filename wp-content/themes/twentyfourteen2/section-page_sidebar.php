<ul>
<?php 
	
	global $wpdb;
	$rows = $wpdb->get_results("SELECT guid,post_title FROM wp_posts WHERE post_type='page' AND post_status='publish'");
	$rows_count = count($rows);$i=1;
	foreach ($rows as $obj ): ?>
		<li class="row"><a href="<?php echo $obj->guid; ?>"><?php echo $obj->post_title; ?></a></li>
<?php	if ( $i < $rows_count ) : ?>
		<li class="divider"></li>	
<?php 
		endif;
		$i++;
	endforeach;
?>
</ul>