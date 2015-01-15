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

		<div class="event" style="padding-bottom: 0; min-height: 2.7em;">
			<h1 style="padidng-bottom: 0">Check out our upcoming <a href='events.php'>events &gt;&gt;</a></h1>
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