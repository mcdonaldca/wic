  <?php require("assets/config.php");
  			require("assets/dateMaker.php");
 	      require("assets/updateMaker.php");
        require("assets/header.php");

        $mysqli = new mysqli($dbhost, $dbuser_write, $dbpass_write, $dbname);
				if (mysqli_connect_errno())
				{
					echo '<h2>Oh no! Our database is unreachable. Try again later?</h2>';
					die("Connect fail");
				}			
				$query = "SELECT * FROM newsFeed WHERE title != '' ORDER BY date DESC";
				$rows = $mysqli->query($query);

				date_default_timezone_set("America/New_York");
				$startYear = 2010; // year of the first news post
				$currYear = date("Y");
	?>

 	<div class="core">

 	<h1>News Archive</h1>
 	<p>Sort by year</p>
 	<ul class="year-selection">
 		<li><a class='select-year highlighted' id='select-<?= $currYear ?>' href='#' onclick='toggle(<?= $currYear ?>); return false;'><?= $currYear ?></a></li>
 	<?php $year = $currYear - 1;
				while ($startYear <= $year)
				{
					echo "<li><a class='select-year' id='select-$year' href='#' onclick='toggle($year); return false;'>$year</a></li>";
					$year--;
				} ?> 
	</ul><br>
			
	<?php
	
		$prevYear = "";
		foreach($rows as $row)
		{
			$body = str_replace("\\\"", "\"", $row["body"]);
			$title = str_replace("\\\"", "\"", $row["title"]);
			$body = str_replace("\\'", "'", $body);
			$title = str_replace("\\'", "'", $title);
			
			$t_array = explode("-", $row["date"]);
			$date = $t_array[1] . "/" . $t_array[2] . "/" . $t_array[0];
			$postYear = $t_array[0];
			if ($prevYear != $postYear)
			{
				if ($prevYear != "")
				{
					echo "</div>";
				}
				$styleAttr = "";
				if ($postYear != $currYear) $styleAttr = 'style="display:none;"';
				echo "<div id='$postYear' class='yearDiv' $styleAttr>";
				$prevYear = $postYear;
			}

			makeUpdate($title,
				         $row["date"],
				         $body);
			
			//echo("<div class='newsPost'>");
			//echo("<h5>$date - $title</h5>");
			//echo("<p>$body</p>");
			//echo("</div>");
		}	
		echo "</div>";
		$mysqli->close();
	?>
	
	</div>
	
	<script type="text/javascript">
	
		function toggle(divId)
		{
			$(".yearDiv").slideUp("fast");
			$("#" + divId).slideDown("slow");
			$('.select-year').removeClass("highlighted");
			$('#select-' + divId).addClass("highlighted");
		}
	
	</script>
 		
 	</div><div class="push"></div></div>

 	<?php require("assets/footer.html"); ?>
 </body>

</html>