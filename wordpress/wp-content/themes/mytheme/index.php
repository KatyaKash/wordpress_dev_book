<?php get_header(); 
		wp_register_script('s.js', get_template_directory_uri().'/s.js');
		wp_enqueue_script('s.js', get_template_directory_uri().'/s.js');
		wp_add_inline_script( 's.js', 'alert("добро пожаловать на индекс.пхп");' );?>

	<div class="middle">

	<?php
		echo '<h2><a href="'. get_home_url() .'">Главная</a></h2>';
		echo current_time('d m Y H:i');
		get_calendar();
		echo '<br>Записи за последний месяц:';
	
$my_posts = get_posts( 'monthnum=' . date('M') );
foreach( $my_posts as $post ){
	setup_postdata( $post );

	echo get_the_title().'(дата публкации: '.get_the_date('d.m.Y').')<br>';
}
wp_reset_postdata(); // сброс

echo 'Название поста с айди=5: '.get_post_field( 'post_title', 5, 'db' ).'<br>';
$ppp = get_page_by_title('Пример страницы');
echo 'айди страницы Пример страницы: '.$ppp->ID;

		if ( have_posts() ){
				while ( have_posts() ){
					the_post();

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