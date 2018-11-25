<?php
	include_once 'db.php'; 
	$_SESSION['genre_name']="";
	$_SESSION['searchkey'] ="";
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
	<div class="searchbar"><form action="searchpage.php" method="post">
		<button type="submit"><i class="fa fa-search"></i></button>
		<input type="text" placeholder="Search..." name="input" value="">
	
		<p class="logo">MyAnimeLite</p></form>
	</div>
</header>
</head>

<div class="sidenav">
	<h2>MyAnimeLite</h2>
	<a href="HomeV2.php"> Home</a>
	<a> Link</a>
	<a> Link</a>
		<a> genres: </a>
		<div class="dropdown-content">
			<a href="CategoryPage.php?link=Action">Action</a>
			<a href="CategoryPage.php?link=Adventure">Adventure</a>
			<a href="CategoryPage.php?link=Cars">Cars</a>
			<a href="CategoryPage.php?link=Comedy">Comedy</a>
			<a href="CategoryPage.php?link=Dementia">Dementia</a>
			<a href="CategoryPage.php?link=Demons">Demons</a>
			<a href="CategoryPage.php?link=Drama">Drama</a>
			<a href="CategoryPage.php?link=Fantasy">Fantasy</a>
			<a href="CategoryPage.php?link=Game">Game</a>
			<a href="CategoryPage.php?link=Historical">Historical</a>
			<a href="CategoryPage.php?link=Horror">Horror</a>
			<a href="CategoryPage.php?link=Josei">Josei</a>
			<a href="CategoryPage.php?link=Kids">Kids</a>
			<a href="CategoryPage.php?link=Magic">Magic</a>
			<a href="CategoryPage.php?link=Martial">Martial Arts</a>
			<a href="CategoryPage.php?link=Mecha">Mecha</a>
			<a href="CategoryPage.php?link=Military">Military</a>
			<a href="CategoryPage.php?link=Music">Music</a>
			<a href="CategoryPage.php?link=Mystery">Mystery</a>
			<a href="CategoryPage.php?link=Parody">Parody</a>
			<a href="CategoryPage.php?link=Police">Police</a>
			<a href="CategoryPage.php?link=Psychological">Psychological</a>
			<a href="CategoryPage.php?link=Romance">Romance</a>
			<a href="CategoryPage.php?link=Samurai">Samurai</a>
			<a href="CategoryPage.php?link=School">School</a>
			<a href="CategoryPage.php?link=Sci-Fi">Sci-Fi</a>
			<a href="CategoryPage.php?link=Seinen">Seinen</a>
			<a href="CategoryPage.php?link=Shoujo">Shoujo</a>
			<a href="CategoryPage.php?link=Shoujo Ai">Shoujo Ai</a>
			<a href="CategoryPage.php?link=Shounen">Shounen</a>
			<a href="CategoryPage.php?link=Shounen Ai">Shounen Ai</a>
			<a href="CategoryPage.php?link=Slice of Life">Slice of Life</a>
			<a href="CategoryPage.php?link=Space">Space</a>
			<a href="CategoryPage.php?link=Sports">Sports</a>
			<a href="CategoryPage.php?link=Super Power">Super Power</a>
			<a href="CategoryPage.php?link=Supernatural">Supernatural</a>
			<a href="CategoryPage.php?link=Thriller">Thriller</a>
			<a href="CategoryPage.php?link=Vampire">Vampire</a>
		</div>

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
	<p id="title"> Most Popular</p>
		<div class="gallery">
			<?php 
				$sql="SELECT poster_link, title_eng FROM Anime ORDER BY rank_popularity ASC LIMIT 14";
				$result=mysqli_query($connection,$sql);

				if ($result->num_rows > 0) {
			    // output data of each row
				    while($row = $result->fetch_assoc()) {
				    	if($row['title_eng']!=NULL)
				    	echo "<div class='img-title'><img class='gallery' src=". $row["poster_link"]."><br class='space'><p class='title'>". $row["title_eng"]."</p></div>";
				    }
				} else {
				    echo "0 results";
				}
			?>
		</div>
		<br><br>
	<p id="title"> Top Rated</p> 
		<div class="gallery">
			<?php 
				$sql="SELECT poster_link, title_eng FROM Anime ORDER BY score DESC LIMIT 14";
				$result=mysqli_query($connection,$sql);

				if ($result->num_rows > 0) {
			    // output data of each row
				    while($row = $result->fetch_assoc()) {
				    	if($row['title_eng']!=NULL)
				        echo "<div class='img-title'><img class='gallery' onerror='this.style.display = 'none' src=". $row["poster_link"]."><br><p class='title'>". $row["title_eng"]."</p></div>";
				    }
				} else {
				    echo "0 results";
				}
			?>
		</div>
	<br><br>
	<p id="title"> Best of 2018</p>
		<div class="gallery">
			
			<?php 
				$sql="SELECT poster_link, title_eng FROM Anime, Aired WHERE year=2018 AND season='Winter' AND Aired.anime_id = Anime.anime_id ORDER BY Anime.rank_popularity ASC LIMIT 14";
				$result=mysqli_query($connection,$sql);

				if ($result->num_rows > 0) {
			    // output data of each row
				    while($row = $result->fetch_assoc()) {
				    	if($row['title_eng']!=NULL)
				        echo "<div class='img-title'><img class='gallery' src=". $row["poster_link"]."><br class='space'><p class='title'>". $row["title_eng"]."</p></div>";
				    }
				} else {
				    echo "0 results";
				}
			?>
		</div>
</center>
<footer></footer>
</body> <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
(function() {
    var allimgs = document.images;
    var y = document.getElementsByClassName("img-title");
    for (var i = 0; i < y.length; i++) {
        allimgs[i].onerror = function() {
            //this.style.display = "none"; // Other elements aren't affected.
        }
    }
})();
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

function search(){
	var input = document.getElementById("search");
}
</script>
</html>

<?php

$connection->close();
?>
