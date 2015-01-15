  <?php require("assets/config.php");
  			require("assets/dateMaker.php");
 	      require("assets/updateMaker.php");
 	      require("assets/header.php");
 	      $mysqli = new mysqli($dbhost, $dbuser_write, $dbpass_write, $dbname);
 	      if (mysqli_connect_errno())
				{
					echo '<h2>Oh no! Our database is unreachable. Try again later?</h2>';
					die("Connect fail");
				} ?>

 	<div class="core">
 		<?php // Legacy code from old website
 		      // It works, so let's leave it for now

 					date_default_timezone_set("America/New_York");
 					if (!isset($calendarfeed)) {
            $calendarfeed = "http://www.google.com/calendar/feeds/gl14p7hs5lrvektk0ou7apjgcs%40group.calendar.google.com/private-8f80df2cb73c9f74d80fbe228f10ed16/basic";
          }
			
			    $dateformat="M j, Y";
			    $timeformat="g:i a";
			    $GroupByDate=true;
			    $offset = 4;

			    $calendar_xml_address = str_replace("/basic", 
			       																	"/full?singleevents=true&futureevents=true&orderby=starttime&sortorder=a", 
			       																	$calendarfeed);
   				$xml = simplexml_load_file($calendar_xml_address);

			    foreach ($xml->entry as $entry)
			    {
			    	  // Ignore any e-board meetings
			        $title = $entry->title;
			        if(stripos($title, "e-board") !== FALSE || stripos($title, "eboard") !== FALSE || stripos($title, "canceled") !== FALSE){
			            if(stripos($title, "elections") === FALSE) continue;
			        }

			        $ns_gd = $entry->children('http://schemas.google.com/g/2005');
			        // Makes links clickable
			        $description = preg_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?,&//=]+)','<a href="\\1">\\1</a>',
			            												$entry->content); 
			        // Makes email addresses into email addresses
			        $description = preg_replace('([_.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})','<a href="mailto:\\1">\\1</a>',
			            												$description);

			        $date = date($dateformat, strtotime($ns_gd->when->attributes()->startTime));
			        $time = date($timeformat, strtotime($ns_gd->when->attributes()->startTime));
			        $where = $ns_gd->where->attributes()->valueString;
			        $link = $entry->link->attributes()->href;
			        break;
			   }
				?>

		<div class="event">
			<h1>Next Event: <a href='<?= $link ?>'><?= $title ?></a></h1>
			<p><?= $description ?></p>
			<div class="well"><?= $time ?> <i>//</i> <?= $where ?> <i>//</i> <?= $date ?></div>
		</div>

 		<h1>What is Women in Computing?</h1>
 		<p>Michigan State University Women in Computing (MSU WIC) is an organization of students and faculty (both men and women) who work to recruit, support and retain women in computing fields. If you are interested in computing, we would love to see you at our next meeting.</p>
 		<p>We host many events during the semester, including tech talks from visiting companies (every other Thursday), hackathons, Girl Scout workshops, web development workshops, and more. Check out our <a href="events.php">calendar</a> to keep up to date.</p>

 		<h1>Recent News</h1>
 		<?php $query = "SELECT * FROM newsFeed WHERE title != '' ORDER BY date DESC LIMIT 3";
 		      $rows = $mysqli->query($query);
 		      foreach($rows as $row) {
						makeUpdate($row["title"],
							        $row["date"],
							        $row["body"]);
					}
					$mysqli->close(); ?>

 	</div><div class="push"></div></div>

 	<?php require("assets/footer.html"); ?>
 </body>

</html>