<?php

function makeUpdate($title, $date, $body) {
	echo '<div class="update"><h2>';
	echo $title;
	echo '</h2><h3>';
	echo makeDate($date);
	echo '</h3>';
	echo $body;
	echo '</div>';
}

?>