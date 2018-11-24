<?php
	include_once '../config/db.php'
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="v2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:100|Montserrat|Maven+Pro|Bungee|Changa+One|Questrial|Ubuntu" rel="stylesheet">

<title>MyAnimeLite</title>
<!-----------------------THE HEAD ------------------------>
<header >
	<div class="searchbar">
		<button type="submit"><i class="fa fa-search"></i></button>
		<input type="text" placeholder="Search...">
		<button class="back" onclick="goBack()">←</button>
	</div>
</header>
</head>
<div id="mySidenav" class="sidenav">
	
	<h2>MyAnimeLite</h2>
	<a href=""> Link</a>
	<a> Link</a>
	<a> Link</a>
	<!--<div class="dropdown">-->
		<a> genres: </a>
		<div class="dropdown-content">
			<a>Action</a><a>Adventure</a><a>Cars</a><a>Comedy</a><a>Dementia</a><a>Demons</a><a>Drama</a><a>Fantasy</a><a>Game</a>
			<a>Historical</a><a>Horror</a><a>Josei</a><a>Kids</a><a>Magic</a><a>Martial Arts</a><a>Mecha</a><a>Military</a>
			<a>Music</a><a>Mystery</a><a>Parody</a><a>Police</a><a>Psychological</a><a>Romance</a><a>Samurai</a><a>School</a>
			<a>Sci-Fi</a><a>Seinen</a><a>Shoujo</a><a>Shoujo Ai</a><a>Shounen</a><a>Shounen Ai</a><a>Slice of Life</a>
			<a>Space</a><a>Sports</a><a>Super Power</a><a>Supernatural</a><a>Thriller</a><a>Vampire</a>
		</div>
	<!--</div>-->

</div>
</head>
<!-----------------------THE BODY ------------------------>
<body>

<div class="poster-hover">
	<?php
		$sql="SELECT poster_link FROM Anime WHERE anime_id = 31964";
		$result=mysqli_query($connection,$sql)->fetch_assoc();

		echo "<img class='poster_img' src=". $result["poster_link"].">";
	?>
</div>

<div class="infobox">
	<?php
		$sql="SELECT * FROM Anime t1
		INNER JOIN Aired t2 ON t1.anime_id = t2.anime_id
		INNER JOIN Created t3 ON t1.anime_id = t3.anime_id
		-- INNER JOIN Licensed t4 ON t1.anime_id = t4.anime_id
		INNER JOIN Studio r1 ON t3.studio_id = r1.studio_id
		-- INNER JOIN Licensor r2 ON t4.lic_id = r2.lic_id
		WHERE t1.anime_id = 31964";

		$result=mysqli_query($connection,$sql)->fetch_assoc();
		var_dump($result);

		// Display Data
		echo "<h1>". $result["title_jap"]."<t> <span class='yr'>".$result["year"]."</span></h1>";
		// echo "<h2><span class="yr">". $result["title_jap"]."
		echo "<div class='score-rank'><h3 class='score-rank'><span class='score-rank-data'>". $result["score"]."<br></span>Score</h3></div>";
		echo "<div class='score-rank'><h3 class='score-rank'><span class='score-rank-data'>#". $result["rank_overall"]."<br></span>Ranked</h3></div>";
		echo "<div class='score-rank'><h3 class='score-rank'><span class='score-rank-data'>#". $result["rank_popularity"]."<br></span>Popularity</h3></div>";
		echo "<br><br>";
	?>
	<!-- <h1>My Hero Academia<t>  <span class="yr">(2017)</span></h1> -->
	<!-- <h2><span class="yr">action/shoujou</span></h2> -->

	<!-- <div class="score-rank"><h3 class="score-rank"><span class="score-rank-data">8.43<br></span>score</h3></div>
	<div class="score-rank"><h3 class="score-rank"><span class="score-rank-data">123<br></span>Rank Popularity </h3></div>
	<div class="score-rank"><h3 class="score-rank"><span class="score-rank-data">18<br></span>Rank Overall</h3></div> -->
	<!-- <br><br> -->
	<h3>Japanese Title: <span class="data">僕のヒーローアカデミア </span></h3>
	<h3>Romaji: <span class="data"> Boku no Hero Academia</span></h3>
	<h3>Type: <span class="data">TV</span></h3>
	<h3>Source: <span class="data">Manga</span></h3>
	<h3>Episode Count: <span class="data">13</span></h3>
	<h3>Duration: <span class="data">24mins. </span></h3> <br>
	<h3>Studio: <span class="data">Bones</span></h3>
	<h3>Licensor:<span class="data">Netflix</span></h3>
	<h3>Airing: <span class="data">No</span></h3>
</div>	
<footer></footer>
</body>
<script type="text/javascript">


	function goBack() {
    window.history.back();
}
</script>
</html>
