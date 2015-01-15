  <?php require("assets/config.php");
        require("assets/header.php"); ?>

 	<div class="core">
 		<h1>Events</h1>
 		<p>(<a href="https://www.google.com/calendar/render?cid=gl14p7hs5lrvektk0ou7apjgcs%40group.calendar.google.com">Add to your Google Calendar</a>)</p>
 		
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

   				$first = true;

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
			        $link = $entry->link->attributes()->href; ?>

        <div class="event">
					<h1><? if ($first) echo('Next Event: ') ?><a href='<?= $link ?>'><?= $title ?></a></h1>
					<p><?= $description ?></p>
					<div class="well"><?= $time ?> <i>//</i> <?= $where ?> <i>//</i> <?= $date ?></div>
				</div>
			        
			  <?php $first = false; } ?><br>

		

  
 	</div><div class="push"></div></div>

 	<?php require("assets/footer.html"); ?>
 </body>

</html>