<?php

get_header(); 
		wp_register_script('s.js', get_template_directory_uri().'/s.js');
		wp_enqueue_script('s.js', get_template_directory_uri().'/s.js');
		wp_add_inline_script( 's.js', 'alert("опа это че дочерняя тема?");' );

?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>

<?php
	echo '<h2><a href="'. get_home_url() .'">Главная</a></h2>';
		echo current_time('d m Y H:i');
		echo '<br>Записи за последний месяц:';
	
$my_posts = get_posts( 'monthnum=' . date('M') );
foreach( $my_posts as $post ){
	setup_postdata( $post );

	echo get_the_title().'(дата публкации: '.get_the_date('d.m.Y').')<br>';
}
wp_reset_postdata(); // сброс
if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();
				echo'<div id="ha">';
		echo '<h2><a href="'. get_permalink() .'">'. get_the_title() .'</a></h2>';
		echo '<p>Номер поста: '.get_the_ID().'</p>';
		echo '<br>';
foreach( get_the_category() as $category ){
	echo '<a href="'.get_permalink().'">'. $category->name . '</a>';
}
				echo '<br><br>';
					the_content('Подробнее...');

					echo 'Рубрики: ';
					the_category( '; ' );
					echo the_tags('<p>Метки: ',', ','</p>');
		echo'</div>';
				}


	

	// Previous/next page navigation.
	twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

}

get_footer();
