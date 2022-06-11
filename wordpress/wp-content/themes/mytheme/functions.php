<?php
	function date_output() {
		echo date('d M Y');
	};
	register_nav_menus(array(
	'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
	'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
));

function register_my_widgets(){
	register_sidebar( array(
		'name' => 'Боковая панель на главной странице',
		'id' => 'homepage-sidebar',
		'description' => 'Выводиться как боковая панель только на главной странице сайта.',
		'before_widget' => '<div class="homepage-widget-block">',
		'after_widget' => '<br>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '<br>',
	) );
	
}
add_action( 'widgets_init', 'register_my_widgets' );
add_filter('the_content', 'the_end');
function the_end( $text ){
	return '<div class="post">'.$text . '<br><b> мое фио типа</b></div>';
}
add_action( 'the_excerpt', 'modify_the_excerpt' );

function modify_the_excerpt( $post_excerpt ) {
	return 'Рекомендую:<br>' . $post_excerpt;
}
add_filter( 'the_title', 'add_text_to_page_title' );
function add_text_to_page_title( $title ) {
	if( is_page() )
		$title = 'Категория: "'. $title.'"';

	return $title;
}
function true_weekday_func( $atts ){
	$rusDaysNames = [
        	'воскресенье',
        	'понеделник',
        	'вторник',
        	'среда',
        	'четверг',
       		'пятница',
        	'суббота',];
$a =$rusDaysNames[date('N')];
			return $a; 
}
 
add_shortcode( 'weekday', 'true_weekday_func' );

?>