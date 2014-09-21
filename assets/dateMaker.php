<?php

function makeDate($date) {
  $info = explode("-", $date);
  $year = ", " . $info[0];

  $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  $month = $months[$info[1] - 1];

  $day = " ";
  if ( $info[2][1] === "1") {
    $day .= $info[2] . "st";
  } else if ( $info[2][1] === "2") {
    $day .= $info[2] . "nd";
  } else if ( $info[2][1] === "3") {
    $day .= $info[2] . "rd";
  } else {
    $day .= $info[2] . "th";
  }
  
  if ( $day[1] === "0" ) {
    $day = " " . substr($day, 2);
  }
  
	return $month . $day . $year;
}

?>