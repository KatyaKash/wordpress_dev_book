<?php get_header(); ?>
	<div class="middle">
	<?php
	
				the_post();

				echo '<h1>'. get_the_title() .'</h1>';
				the_author();
				echo '<br>'.get_the_time('g:i:s').'<br>';
				echo get_the_date('d.m.Y').'<br>';
				echo the_content().'<br>';
				get_the_post_thumbnail().'<br>';
	?>
	</div>
<?php get_footer(); ?>