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

function create_table() {
	global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table_name = $wpdb->get_blog_prefix() . 'test';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$table_name} (
	id  bigint(20) unsigned NOT NULL auto_increment,
	address varchar(255) NOT NULL default '',
	alert varchar(20) NOT NULL default '',
	meta longtext NOT NULL default '',
	PRIMARY KEY  (id),
	KEY alert (alert)
	)
	{$charset_collate};";

	dbDelta($sql);
}

function update_table() {
	global $wpdb;

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	$table_name = $wpdb->get_blog_prefix() . 'test';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$table_name} (
	id  bigint(20) unsigned NOT NULL auto_increment,
	address varchar(255) NOT NULL default '',
	alert varchar(20) NOT NULL default '',
	meta longtext NOT NULL default '',
	new_meta longtext NOT NULL default '',
	PRIMARY KEY  (id),
	KEY alert (alert)
	)
	{$charset_collate};";

	dbDelta($sql);
}

create_table();
update_table();
//добавим к заиси с айди 5 поле тест со значением 1
add_post_meta( 5, 'test', 1);
//удалим
delete_post_meta(  5, 'test', 1);
/*$post_data = array(
	'post_title'    => 'пост созданный магией(через код)',
	'post_content'  => 'контент принял ислам',
	'post_status'   => 'publish',
	'post_author'   => 1,
	'post_category' => array( 8 )
);

// Вставляем запись в базу данных
$post_id = wp_insert_post( $post_data );

$my_cat = [
	'cat_name' => 'Новая категория созданная через код',
	'category_description' => 'Описание новой категории',
	'category_nicename' => 'new-cat'
];

// вставляем
$cat_id = wp_insert_category( $my_cat );

if( $cat_id )
	echo 'Категория добавлена';
else
	echo 'Не удалось добавить категорию';
$data = [
	'comment_post_ID'      => 1,
	'comment_author'       => 'admin',
	'comment_author_email' => '1@email.ru',
	'comment_author_url'   => 'http://',
	'comment_content'      => 'ну такой себе у вас сайт и',
	'comment_type'         => 'comment',
	'comment_parent'       => 0,
	'user_id'              => 1,
	'comment_author_IP'    => '127.0.0.1',
	'comment_agent'        => 'ааээээ',
	'comment_date'         => null, // получим current_time('mysql')
	'comment_approved'     => 1,
];

wp_insert_comment( wp_slash($data) );
function new_user_registration(){
	$userdata = [
		'user_login' => 'saruchan',
		'user_pass'  => 'pass',
		'user_email' => '3@mail.ru',
		'first_name' => 'name',
	];
	 wp_insert_user( $userdata ) ;
}
new_user_registration();*/
?>