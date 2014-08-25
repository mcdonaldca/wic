  <?php require("assets/config.php");
  			require("assets/dateMaker.php");
        require("assets/eventMaker.php");
 	      require("assets/updateMaker.php");
 	      require("assets/header.html");
 	      $mysqli = new mysqli($dbhost, $dbuser_write, $dbpass_write, $dbname);
 	      if (mysqli_connect_errno())
				{
					echo '<h2>Oh no! Our database is unreachable. Try again later?</h2>';
					die("Connect fail");
				} ?>

 	<div class="core">
 		<?php $query = "SELECT * FROM events WHERE title != '' AND next = '1' ORDER BY date DESC";
					$rows = $mysqli->query($query);
					foreach($rows as $row) {
						makeEvent("Next Event: " . $row["title"] . ' &nbsp;&nbsp;<a href="events.php"><span class="icon icon-calendar"></span></a>',
							        $row["description"],
							        $row["time"],
							        $row["location"],
							        $row["date"]);
					} ?>

 		<h1>What is Women in Computing?</h1>
 		<p>Michigan State Univeristy Women in Computing (MSU WIC) is an organization of students and faculty (both men and women) who work to recruit, support and retain women in computing fields. If you are interested in computing, we would love to see you at our next meeting.</p>
 		<p>We host many events during the semester, including tech talks from visiting companies (every other Thursday), hackathons, Girl Scout workshops, web development workshops, and more. Check out our <a href="events.php">calendar</a> to keep up to date.</p>

 		<h1>Recent News &nbsp;&nbsp;<a href="news.php"><span class="icon icon-news"></span></a></h1>
 		<div class="update">
 			<h2>Technology Workshop</h2>
 			<h3>November 7th, 2013</h3>
 			<p>Do you want your students to learn how to design and create their OWN website? Invite them to the MSU Women in Computing (WIC) workshop, and we'll teach them some basic tools to help them make websites. We'll also be teaching some basic <a href="http://scratch.mit.edu/">Scratch</a> programming.<br><br>

			<b>Who:</b> Any middle to high school age girl interested in Computer Science! Although this workshop is geared toward older students, we also welcome younger students.<br><br>

			<b>When:</b> Saturday, November 16th from 10:00 AM-2:00 PM. Please bring your own lunch.<br><br>

			<b>Where:</b> Room 3105 Engineering Building, Michigan State University. Parking is available in visitor lot 39 on <a href="http://maps.msu.edu/interactive/">this map</a>.<br><br>

			Important: Please have interested students <a href="https://skydrive.live.com/redir?page=survey&resid=985037F5DBFED447!190&authkey=!AA6woJ9YYk9ssVg">RSVP here</a>, also fill out <a href="http://cse.msu.edu/msuwic/forms/MSU-Consent-Form.doc">this form</a> and make sure they bring it with them the day of the workshop.</p>
 		</div>
 		<div class="update">
 			<h2>Welcome New E-board Members</h2>
 			<h3>April 4th, 2013</h3>
 			<p>WIC would like to welcome and congratulate the new e-board members for the 2013-2014 school year!</p>

			<ul><li><strong>President</strong>: Danielle Guir <strong>*</strong>in Fall 2013<strong>*</strong></li>

			<li><strong>Co-President</strong>: Taylor Jones <strong>*</strong>in Fall 2013, will be President in Spring 2014<strong>*</strong></li>

			<li><strong>Vice President</strong>: Kaitlin Davis</li>

			<li><strong>Secretary</strong>: Ashlee DeLine</li>

			<li><strong>Treasurer</strong>: Neha Gupta</li>

			<li><strong>Webmaster</strong>: Caitlin McDonald</li>

			<li><strong>Corporate Relations</strong>: Erin Hoffman</li>

			<li><strong>Community Relations</strong>: Eunbong Yang, Jennifer Manning,and Nicole Lawrence</li>
			</ul>

			<p>Thanks to this year's e-board members!</p>
 		</div>
 		<div class="update">
 			<h2>Technology Workshop!</h2>
 			<h3>November 7th, 2013</h3>
 			<p>Do you want your students to learn how to design and create their OWN website? Invite them to the MSU Women in Computing (WIC) workshop, and we'll teach them some basic tools to help them make websites. We'll also be teaching some basic <a href="http://scratch.mit.edu/">Scratch</a> programming.<br><br>

			<b>Who:</b> Any middle to high school age girl interested in Computer Science! Although this workshop is geared toward older students, we also welcome younger students.<br><br>

			<b>When:</b> Saturday, November 16th from 10:00 AM-2:00 PM. Please bring your own lunch.<br><br>

			<b>Where:</b> Room 3105 Engineering Building, Michigan State University. Parking is available in visitor lot 39 on <a href="http://maps.msu.edu/interactive/">this map</a>.<br><br>

			Important: Please have interested students <a href="https://skydrive.live.com/redir?page=survey&resid=985037F5DBFED447!190&authkey=!AA6woJ9YYk9ssVg">RSVP here</a>, also fill out <a href="http://cse.msu.edu/msuwic/forms/MSU-Consent-Form.doc">this form</a> and make sure they bring it with them the day of the workshop.</p>
 		</div>
 	</div><div class="push"></div></div>

 	<?php require("assets/footer.html"); ?>
 </body>

</html>