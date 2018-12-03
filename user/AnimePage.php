<?php
	include_once ('../server.php');
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="v2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:100|Montserrat|Maven+Pro|Bungee|Changa+One|Questrial|Ubuntu" rel="stylesheet">

<title>MyAnimeLite</title>
<!-----------------------THE HEAD ------------------------>
<header>
	<div class="searchbar"><form action="searchpage.php" method="post">
		<button type="submit"><i class="fa fa-search"></i></button>
		<input type="text" placeholder="Search..." name="input" value="">
	
		<p class="logo">MyAnimeLite</p></form>
	</div>
</header>
</head>

<div class="sidenav">
	<center>
	<?php  if (isset($_SESSION['username'])) : ?>
		<a>Welcome <?php echo "<i class='username'>".$_SESSION['username']."</i>"; ?></a>
	<?php endif ?>
	<a href="HomeV2.php"> Home</a>
	<a href="MoviesPage.php"> Movies</a>
	<a href="StudiosPage.php"> Studios</a>
	
	<a> Genres: </a>
		<div class="dropdown-content">
			<?php 
				$sql="SELECT genre_name FROM Genre";
				$result=mysqli_query($connection,$sql);

				if ($result->num_rows > 0) {
			    // output data of each row
				    while($row = $result->fetch_assoc()) {
				    	echo "<a href='CategoryPage.php?link=".$row['genre_name']."'>".$row['genre_name']."</a>";
				    }
				} else {
				    echo "0 results";
				}
			?>
		</div>
	<strong><a href="AddAnime.php"> Add Anime</a></strong>
	<?php  if (isset($_SESSION['username'])) : ?>
		<a id="logout" href="../index.php?logout='1'">logout</span></a>
	<?php endif ?>
</div>
<!-----------------------THE BODY ------------------------>
<body>

<div class="poster-hover">
	<?php
		if(isset($_GET['link'])){$_SESSION['link'] = $_GET['link'];}	
		$sql="SELECT * FROM Anime t1
		INNER JOIN Aired t2 ON t1.anime_id = t2.anime_id
		INNER JOIN Created t3 ON t1.anime_id = t3.anime_id
		INNER JOIN Licensed t4 ON t1.anime_id = t4.anime_id
		INNER JOIN Studio r1 ON t3.studio_id = r1.studio_id
		INNER JOIN Licensor r2 ON t4.lic_id = r2.lic_id
		WHERE t1.anime_id = {$_SESSION['link']}";

		$result=mysqli_query($connection,$sql)->fetch_assoc();

		echo "<img class='poster_img' src=". $result["poster_link"].">";
	?>
</div>

<div class="infobox">
	<?php
		// var_dump($result);

		// Display Data
		echo "<h1 class='animetitle'>". $result["title_jap"]."<t> <span class='yr'>".$result["year"]."</span></h1>";
		echo "<div class='score-rank'><h3 class='score-rank'><span class='score-rank-data'>". $result["score"]."<br></span>Score</h3></div>";
		echo "<div class='score-rank'><h3 class='score-rank'><span class='score-rank-data'>#". $result["rank_overall"]."<br></span>Ranked</h3></div>";
		echo "<div class='score-rank'><h3 class='score-rank'><span class='score-rank-data'>#". $result["rank_popularity"]."<br></span>Popularity</h3></div>";
		echo "<br><br>";

		echo "<h3>English Title: <span class='data'>".$result["title_eng"]."</span></h3>";
		echo "<h3>Type: <span class='data'>".$result["type"]."</span></h3>";
		echo "<h3>Source: <span class='data'>".$result["source"]."</span></h3>";
		echo "<h3>Episode Count: <span class='data'>".$result["ep_count"]."</span></h3>";
		echo "<h3>Duration: <span class='data'>".$result["duration_min"]." min.</span></h3>";

		echo "<h3>Aired: <span class='data'>".$result["season"]." ".$result["year"]."</span></h3>";
		echo "<h3>Studio: <span class='data'>".$result["studio_name"]."</span></h3>";
		echo "<h3>Licensor: <span class='data'>".$result["lic_name"]."</span></h3>";

		$sql="SELECT genre FROM Classification WHERE anime_id = {$_SESSION['link']}";
		$result2=mysqli_query($connection,$sql);

		// var_dump($result);
		if ($result2->num_rows > 0) {
		// output data of each row
			echo "<h3>Genre:";
			while($row = $result2->fetch_assoc()) {
				echo "<a class='data' href='CategoryPage.php?link=".$row['genre']."'>".$row['genre']."</a> |";
			}echo "</h3>";
		} else {
			echo "";
		}

		echo "<br><br><br><br>";
		echo "<h3><a class='link' href='UpdateAnime.php?anime_id=".$result["anime_id"]."'>Update</a>";
		echo "&nbsp &nbsp &nbsp";
		echo "<a class='link' href='DeleteAnime.php?anime_id=".$result["anime_id"]."'>Delete</a></h3>";
	?>

	<!-- <div class="btn-group">
		<button type="submit" class="btn" name="update_anime" id="update">Login</button>
			<script>
				var btn = document.getElementById('update');
				btn.addEventListener('click', function() {
					document.location.href = '<?php echo "UpdateAnime.php"; ?>';
				});
			</script>
		<button>Delete</button>
	</div> -->

</div>	
<footer></footer>
</body>
<script type="text/javascript">
(function() {
	    var allimgs = document.images;
	    for (var i = 0; i < allimgs.length; i++) {
	        allimgs[i].onerror = function() {
	            this.style.content = "url('no_logo.jpg')"; // Other elements aren't affected. 
	        }
	    }
	})();
</script>
</html>
