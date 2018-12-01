<?php
	include_once ('../server.php'); 
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="v2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:100|Montserrat|Maven+Pro|Bungee|Changa+One|Questrial" rel="stylesheet">

<head>
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
	<a href="MoviesPage.php"> Movies</a>
	<a> Link</a>
		<a> genres: </a>
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

</div>

<!-----------------------THE BODY ------------------------>
<body>
<div class="categorybox"><span align="left">
	
	<?php 
		/* DISPLAY GENRE TITLE */
		if(isset($_GET['link'])){$_SESSION['link'] = $_GET['link'];}	
		echo "<h1>".$_SESSION['link']."</h1>" ; 

		/* DISPLAY GENRE DESCRIPTION */
			$query="SELECT genre_desc FROM Genre WHERE genre_name='". $_SESSION['link']."'";
			$result=mysqli_query($connection,$query);
			if ($result->num_rows > 0) {
			    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<h3 class='description'>". $row['genre_desc']."</h3><br>";
				    }
				} else {echo "0 results";}

		/* DISPLAY IMAGES */
			$query="SELECT Anime.poster_link, Anime.title_eng, Anime.title_jap FROM Anime, Classification WHERE genre='". $_SESSION['link']. "' AND Classification.anime_id=Anime.anime_id GROUP BY rank_overall";
			$result=mysqli_query($connection,$query);

				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				    	if($row['title_eng']!=NULL)
				        echo "<div class='img-title'><img class='gallery' src=". $row["poster_link"]."><br class='space'><a class='title' href='AnimePage.php?link=". $row["title_jap"]."'>".$row["title_eng"]."</a></div>";
				    }
				} else {
				    echo "0 results";
				}
	?>
</span>
</div>
<footer></footer>
</body>
<script>
	(function() {
	    var allimgs = document.images;
	    for (var i = 0; i < allimgs.length; i++) {
	        allimgs[i].onerror = function() {
	            this.style.visibility = "hidden"; // Other elements aren't affected. 
	        }
	    }
	})();
</script>
</html>
