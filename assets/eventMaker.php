<?php

function makeEvent($title, $description, $time, $location, $date) {
	echo '<div class="event"><h1>';
  echo $title;
  echo '</h1><p>';
  echo $description;
  echo '</p><div class="well">';
  echo $time;
  echo ' <i>//</i> ';
  echo $location;
  echo ' <i>//</i> ';
  echo makeDate($date);
  echo '</div></div>';
}

?>