<?php get_header(); 
		wp_register_script('s.js', get_template_directory_uri().'/s.js');
		wp_enqueue_script('s.js', get_template_directory_uri().'/s.js');
		wp_add_inline_script( 's.js', 'alert("добро пожаловать на индекс.пхп");' );?>

	<div class="middle">

	<?php
		echo '<h2><a href="'. get_home_url() .'">Главная</a></h2>';
		echo current_time('d m Y H:i');
		get_calendar();
		echo get_bloginfo('description');
		echo get_bloginfo('template_directory');
		echo get_bloginfo('stylesheet_url');
		echo get_template_part('main') ;
		
		if ( have_posts() ){
				while ( have_posts() ){
					the_post();

					echo '<h2><a href="'. get_permalink() .'">'. get_the_title() .'</a></h2>';
					the_permalink();
				echo '<br>';
					the_title();
				echo '<br><br>';
					the_content('Подробнее...');

					
					the_category( '; ' );
					echo the_tags('<p>Метки: ',', ','</p>');
				}
		}
		else{
			echo ' <p>Записей нет...</p>';
		}
		comments_template();
		?>
	</div>		
<?php get_footer(); ?>
<div class="custom">


		<?php
	if ( function_exists('dynamic_sidebar') )
		dynamic_sidebar('homepage-sidebar');
	?></div>