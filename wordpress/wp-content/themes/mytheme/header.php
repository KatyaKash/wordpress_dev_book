<!DOCTYPE html>
<html>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>
		<?php 
		wp_register_style('s.css', get_template_directory_uri().'/s.css');
		wp_enqueue_style('s.css', get_template_directory_uri().'/s.css');

		$custom_css = "
			body{
				background: #c6bdfc;
				    font-family: 'Arial';
			}
			a {
	text-decoration: none;
}
form#loginform {
    display: block;

    margin-top: 0em;
    background-color: #cfc7d4;
    padding: 20px;
}

";
		wp_add_inline_style( 's.css', $custom_css );

		echo wp_get_document_title().' - ';
		get_bloginfo('name'); ?>
	</title>

	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />

	<?php wp_head(); ?>
</head>

<body>
	<header class="header">
		<?php wp_login_form(); 
if ( is_user_logged_in() ) {echo '<br><a href="'.admin_url().'">админка</a><br>';}
add_action( 'init', function(){

	if ( ! current_user_can( 'manage_options' ) ) {
		show_admin_bar( false );
	}

} );



		?>
		<?php wp_nav_menu();
		if ( is_user_logged_in() ) {
			    echo '<br><a href="'.wp_logout_url().'" title="Выйти">Выйти</a><br>';
$current_user = wp_get_current_user();

echo 'Username: '         . $current_user->user_login     . '<br />';
echo 'ID: '               . $current_user->ID             . '<br />';
$user = get_userdata(1);
echo $username = $user->get('user_email');
if( current_user_can('edit_posts') ){
	echo "<br>У пользователя есть права редачить посты";
}
if( current_user_can('delete_posts') ){
	echo "<br>У пользователя есть права удалять посты";
}
if( current_user_can('delete_plugins') ){
	echo "<br>У пользователя есть права удалять плагиныы";
}
if( current_user_can('edit_themes') ){
	echo "<br>У пользователя есть права редактировать тем";
}
if( current_user_can('install_themes') ){
	echo "<br>У пользователя есть права устанавливать темы";
}
if( current_user_can('switch_themes') ){
	echo "<br>У пользователя есть права переключать темы";
}
if( current_user_can('moderate_comments') ){
	echo "<br>У пользователя есть права модерировать комментарии";
}

}
else {
	echo 'Вы всего лишь пользователь!';
    echo '<br><a href="'.wp_registration_url().'">Регистрация</a><br>';
    echo '<br><a href="'.wp_login_url().'" title="Войти">Войти</a><br>';

}?>
		<h1><?php bloginfo( 'name' ); ?></h1>
		<h2><?php bloginfo( 'description' ); ?></h2>


		 <?php get_search_form();

$query = new WP_Query( 'author=Samatoki' );

if ( $query->have_posts() ) {

	echo 'посты от Samatoki: ';
	while ( $query->have_posts() ) {
		$query->the_post();
		echo '<p><a href="'. get_permalink() .'">'. get_the_title() .'</a></p>';
}}
wp_reset_postdata();
?>
	</header>