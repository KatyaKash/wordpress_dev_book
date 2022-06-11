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
			}
			a {
	text-decoration: none;
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
		<?php wp_nav_menu();?>
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