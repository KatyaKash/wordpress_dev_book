	<footer class="footer">
		<?php 
			echo get_bloginfo('description');
			echo '<br>'.date('Y'); ?> © Я саматоков саматоки саматокович и компания моя МТС
	</footer>
<?php wp_footer();
date_output();

$query = new WP_Query( 'post_type=post' );
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$arr = [];
		if (in_array(get_the_category_list(),  $arr)){}else{$arr[] = get_the_category_list();};
		}
	foreach ($arr as $value) {
		echo $value;
	}
}
wp_reset_postdata();
$query = new WP_Query( 'post_type=post' );
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$arr = [];
		if (in_array(get_the_tag_list(),  $arr)){}else{$arr[] = get_the_tag_list();};
		}
	foreach ($arr as $value) {
		echo $value;
	}
}
wp_reset_postdata();

 ?>
			</body>
		</html>