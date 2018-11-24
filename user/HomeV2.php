<?php
	include_once 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="v2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:100|Montserrat|Maven+Pro|Bungee|Changa+One|Questrial" rel="stylesheet">

<title>MyAnimeLite</title>
<!-----------------------THE HEAD ------------------------>
<header>
	<div class="searchbar">
		<button type="submit"><i class="fa fa-search"></i></button>
		<input type="text" placeholder="Search...">
		<p class="logo">MyAnimeLite</p>
	</div>
</header>
</head>

<div class="sidenav">
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
<!-----------------------THE BODY ------------------------>
<body>	
	 <div class="previewbox">
		<div class="preview">
			<img class="preview_img" src="https://k39.kn3.net/taringa/1/2/4/6/3/7/40/tyler2000/057.jpg">
			<img class="preview_img" src="https://images5.alphacoders.com/605/605794.jpg">
			<img class="preview_img" src="https://www.desktopbackground.org/p/2014/11/25/861226_slam-dunk-anime-hd-wallpapers_1600x1200_h.jpg">
			<img class="preview_img" src="http://getwallpapers.com/wallpaper/full/8/6/7/494231.jpg">
			<img class="preview_img" src="http://originalneoglide.com/wp-content/uploads/2018/05/hd-poster-death-note-anime-death-note-1.jpg">
		</div><br><br>
	</div>
	<p id="title"> Trending Anime</p>
		<div class="gallery">
			<?php 
				$sql="SELECT poster_link FROM Anime ORDER BY score DESC LIMIT 15";
				$result=mysqli_query($connection,$sql);

				if ($result->num_rows > 0) {
			    // output data of each row
				    while($row = $result->fetch_assoc()) {
				    	if()
				        echo "<img class='gallery' src=". $row["poster_link"].">";
				    }
				} else {
				    echo "0 results";
				}
			?>
		</div>
	<br><br>
	<p id="title"> Top Airing</p>
		<div class="gallery">
			<img class="gallery" src="https://images-na.ssl-images-amazon.com/images/I/91kjVOEopVL._SY606_.jpg">
			<img class="gallery" src="http://assets-cf.gbeye.com/thumbnails/full_size_204762_1500563995.jpg">
			<img class="gallery" src="https://vignette.wikia.nocookie.net/trinity-seven/images/b/b2/Trinity_Seven_Anime_Poster.jpg">
			<img class="gallery" src="https://upload.wikimedia.org/wikipedia/ru/4/41/Orange_anime.jpg">
			<img class="gallery" src="https://images-na.ssl-images-amazon.com/images/I/61GI-8ZL4uL.jpg">
			<img class="gallery" src="http://www.prologue.ca/DATA/LIVRE/grande/9782505072140~v~Boruto__Naruto_next_generations__Agenda_2018-2019.jpg">
			<img class="gallery" src="https://images-na.ssl-images-amazon.com/images/I/91kjVOEopVL._SY606_.jpg">
			<img class="gallery" src="https://vignette.wikia.nocookie.net/dragonball/images/0/00/Dragon_Ball_Super_Poster.jpg">
		</div>
	<br><br>
	<p id="title"> All-time Top</p>
		<div class="gallery">
			<img class="gallery" src="https://images-na.ssl-images-amazon.com/images/I/61GI-8ZL4uL.jpg">
			<img class="gallery" src="https://vignette.wikia.nocookie.net/trinity-seven/images/b/b2/Trinity_Seven_Anime_Poster.jpg">
			<img class="gallery" src="https://images-na.ssl-images-amazon.com/images/I/91kjVOEopVL._SY606_.jpg">
			<img class="gallery" src="https://upload.wikimedia.org/wikipedia/ru/4/41/Orange_anime.jpg">
			<img class="gallery" src="https://images-na.ssl-images-amazon.com/images/I/91kjVOEopVL._SY606_.jpg">
			<img class="gallery" src="http://assets-cf.gbeye.com/thumbnails/full_size_204762_1500563995.jpg">
			<img class="gallery" src="https://vignette.wikia.nocookie.net/dragonball/images/0/00/Dragon_Ball_Super_Poster.jpg">
			<img class="gallery" src="http://www.prologue.ca/DATA/LIVRE/grande/9782505072140~v~Boruto__Naruto_next_generations__Agenda_2018-2019.jpg">
		</div>
</center>
<footer></footer>
</body> <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>

var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("preview_img");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 5000); 
}
</script>
</html>

<?php
$connection->close();
?>
