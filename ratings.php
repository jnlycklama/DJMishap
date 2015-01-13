<!DOCTYPE html>
<html>

<head>
	<title>DJ Mishap</title>
	<link rel="stylesheet" type="text/css" href="DJ.css" />
	<script type="text/javascript" src="DJ.js" ></script>
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Megrim' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/windows-8-metro-style/512/dj-.png">
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>

<body>
	<div id="container">
		<div id="header">
			<img id="header_pic" src="http://i1277.photobucket.com/albums/y493/jnlycklama/unsplash_52c319226cefb_2_zpse04c98e2.jpg" alt="music" />
			<div id="nav">
			<h1><a id="title" href="DJ.php">DJ Mishap</a></h1>
			<ul id="nav_ul">
				<li class="nav_li"><a class="nav_a" href="gallery.php">Gallery</a></li>
				<li class="nav_li"><a class="nav_a" href="events.php">Events</a></li>
				<li class="nav_li"><a class="nav_a" href="ratings.php">Ratings</a></li>
				<li class="nav_li"><a class="nav_a" href="contact.php">Contact</a></li>
			</ul></div>
		</div>
	</div>

	<div id="content">


	<?php //This code adds new comments to the database
		// It is not in a seperate file because I didn't want the page to redirect when the user submits
		if(isset($_POST["submit_button"])){
			$name = $_POST["name"];
			$rating = $_POST["rating"];
			$comment = $_POST["comment"];
			$event = $_POST["event"];

			try {
			    $dbh = new PDO('mysql:host=x;dbname=ratingdb', "user", "pass");
			    $rows = $dbh->exec("insert into rating values ('$name', $rating, '$comment', '$event')");
			    $dbh = null;
			} catch (PDOException $e) {
			    print "Error!: " . $e->getMessage() . "<br/>";
			    die();
			}
		}
	
	?>

		<h2 class="top">Previous Events</h2>
		<p class="container">Comment and rate the events you've attended, and see other's ratings</p>
		<div class="event">
			<h3 class="event_title">Cliques and Geeks Kegger</h3>
			<?php //Calculates the average rating of the event
			try {
			    $dbh = new PDO('mysql:host=x;dbname=ratingdb', "user", "pass");
			    $rows = $dbh->query('SELECT * from rating WHERE event="House Party" ');
			    $total=0;
			    $counter=0;
			    foreach($rows as $row) {
			    	$total=$total+$row["rating"];
			    	$counter=$counter+1;
			    }
			    print "<p class='container'>Average Rating: ".$total/$counter."</p>";
		    	$dbh = null;
			} catch (PDOException $e) {
		    	print "Error!: " . $e->getMessage() . "<br/>";
		    	die();
			}
			?>
			<div class="pad">
			<p>October 10th 2014</p>
			<p>9:30 PM</p>
			<p>Alfred Street</p>
		<form name="input" action="" method="post">
			<input name="event" style="display:none;" value="House Party" type="text">
			Name: <input type="text" name="name"><br>
			Rating 1-5: <input type="text" name="rating"><br>
			Comment: <textarea rows="10" cols="30" name="comment"></textarea><br>
			<input type="submit" value="Submit" name="submit_button" onSumbit="window.location.reload()">
		</form>
		</div>
		</div>
		<p class="event_comments" id="aa" onclick="seeComments(this)">See Other Comments</p>

		<div class="reply" id="a">
		<?php //Prints out all the comments from the database that refer to this event
		try {
		    $dbh = new PDO('mysql:host=x;dbname=ratingdb', "user", "pass");
		    $rows = $dbh->query('SELECT * from rating WHERE event="House Party" ');
		    foreach($rows as $row) {
		    	print $row["name"].": <br>";
		    	print $row["rating"]."/5<br>";
		    	print $row["comment"]."<br>";
		    	print '<hr><br>';
		    }
		    $dbh = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		?>
		</div>

		<br>
		<div class="event">
			<h3 class="event_title">Eng-Nurse Dance</h3>
			<?php //Calculates the average rating of the event
			try {
			    $dbh = new PDO('mysql:host=x;dbname=ratingdb', "user", "pass");
			    $rows = $dbh->query('SELECT * from rating WHERE event="Club" ');
			    $total=0;
			    $counter=0;
			    foreach($rows as $row) {
			    	$total=$total+$row["rating"];
			    	$counter=$counter+1;
			    }
			    print "<p class='container'>Average Rating: ".$total/$counter."</p>";
		    	$dbh = null;
			} catch (PDOException $e) {
		    	print "Error!: " . $e->getMessage() . "<br/>";
		    	die();
			}
			?>
			<div class="pad">
			<p>Feburary 2015</p>
			<p>9:00 PM</p>
			<p>Grant Hall</p>
		<form name="input" action="" method="post">
			<input name="event" style="display:none;" value="Club" type="text">
			Name: <input type="text" name="name"><br>
			Rating 1-5: <input type="text" name="rating"><br>
			Comment: <textarea rows="10" cols="30" name="comment"></textarea><br>
			<input type="submit" value="Submit" name="submit_button">
		</form>
		</div>
		</div>
		<p class="event_comments" id="bb" onclick="seeComments(this)">See Other Comments</p>

		<div class="reply" id="b">
		<?php //Prints out all the comments from the database that refer to this event
		try {
		    $dbh = new PDO('mysql:host=x;dbname=ratingdb', "user", "pass");
		    $rows = $dbh->query('SELECT * from rating WHERE event="Club" ');
		    foreach($rows as $row) {
		    	print $row["name"].": <br>";
		    	print $row["rating"]."/5<br>";
		    	print $row["comment"]."<br>";
		    	print "<hr><br>";
		    }
		    $dbh = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		?>
		</div>

		<br>
		<div class="event">
			<h3 class="event_title">EngSOC Barbecue</h3>
			<?php //Calculates the average rating of the event
			try {
			    $dbh = new PDO('mysql:host=x;dbname=ratingdb', "user", "pass");
			    $rows = $dbh->query('SELECT * from rating WHERE event="Other" ');
			    $total=0;
			    $counter=0;
			    foreach($rows as $row) {
			    	$total=$total+$row["rating"];
			    	$counter=$counter+1;
			    }
			    print "<p class='container'>Average Rating: ".$total/$counter."</p>";
		    	$dbh = null;
			} catch (PDOException $e) {
		    	print "Error!: " . $e->getMessage() . "<br/>";
		    	die();
			}
			?>
			<div class="pad">
			<p>April 2014</p>
			<p>1:00 PM</p>
			<p>City Park</p>
		<form name="input" action="" method="post">
			<input name="event" style="display:none;" value="Other" type="text">
			Name: <input type="text" name="name"><br>
			Rating 1-5: <input type="text" name="rating"><br>
			Comment: <textarea rows="10" cols="30" name="comment"></textarea><br>
			<input type="submit" value="Submit" name="submit_button">
		</form>
		</div>
		</div>
		<p class="event_comments" id="cc" onclick="seeComments(this)">See Other Comments</p>

		<div class="reply" id="c">
		<?php //Prints out all the comments from the database that refer to this event
		try {
		    $dbh = new PDO('mysql:host=x;dbname=ratingdb', "user", "pass");
		    $rows = $dbh->query('SELECT * from rating WHERE event="Other" ');
		    foreach($rows as $row) {
		    	print $row["name"].": <br>";
		    	print $row["rating"]."/5<br>";
		    	print $row["comment"]."<br>";
		    	print "<hr><br>";
		    }
		    $dbh = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		?>
		</div>

		<br>
	</div>
</body>

</html>