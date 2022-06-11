<?php
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