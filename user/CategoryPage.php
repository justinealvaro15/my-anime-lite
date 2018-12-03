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
	<div class="searchbar"><form action="SearchPage.php" method="post">
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
<div class="categorybox"><span align="left">
	
	<?php 
		/* DISPLAY GENRE TITLE */
		if(isset($_GET['link'])){$_SESSION['link'] = $_GET['link'];}
		$query="SELECT * FROM Genre WHERE genre_name='". $_SESSION['link']."'";
		$result=mysqli_query($connection,$query);	
		$result1 = $result->fetch_assoc();

		echo "<h1>".$_SESSION['link']; 
		echo "<a href='DeleteGenre.php?genre_name=".$result1["genre_name"]."'><span class='rename-delete'>Delete</a>&nbsp &nbsp &nbsp<a href='UpdateGenre.php?genre_name=".$result1["genre_name"]."'><span class='rename-delete'>Update</span></a></h1>";
		/* DISPLAY GENRE DESCRIPTION */
			if ($result->num_rows > 0) {
			    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<h3 class='description'>". $row['genre_desc']."</h3><br>";
				    }
				} else {echo "0 results";}

		/* DISPLAY IMAGES */
			$query="SELECT Anime.poster_link, Anime.title_eng, Anime.title_jap, Anime.anime_id AS anime_id FROM Anime, Classification WHERE genre='". $_SESSION['link']. "' AND Classification.anime_id=Anime.anime_id GROUP BY rank_overall";
			$result=mysqli_query($connection,$query);

				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				    	if($row['title_eng']!=NULL)
				        echo "<div class='img-title'><img class='gallery' src=". $row["poster_link"]."><br class='space'><a class='title' href='AnimePage.php?link=". $row["anime_id"]."'>".$row["title_eng"]."</a></div>";
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
	            this.style.content = "url('no_logo.jpg')"; // Other elements aren't affected. 
	        }
	    }
	})();
</script>
</html>
