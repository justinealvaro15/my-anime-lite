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
		/* DISPLAY STUDIO NAME */
		if(isset($_GET['link'])){$_SESSION['link'] = $_GET['link'];}
		$query="SELECT * FROM Anime INNER JOIN Created ON Anime.anime_id = Created.anime_id INNER JOIN Studio ON Created.studio_id = Studio.studio_id WHERE Studio.studio_name ='". $_SESSION['link']."'";
		$result=mysqli_query($connection,$query);
		$result1 = $result->fetch_assoc();

		echo "<h1>".$_SESSION['link']; 
		echo "<a href='DeleteStudio.php?studio_id=".$result1["studio_id"]."'><span class='rename-delete'>Delete</a>&nbsp &nbsp &nbsp<a href='RenameStudio.php?studio_id=".$result1["studio_id"]."'><span class='rename-delete'>Rename</span></a></h1>";
		/* DISPLAY IMAGES */
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
