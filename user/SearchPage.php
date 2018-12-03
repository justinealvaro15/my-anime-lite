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
	 	$_SESSION['searchkey'] = $_POST["input"];
	 	echo "<h1>".$_SESSION['searchkey']."</h1>"; 
	 	$query="SELECT title_eng, title_jap, poster_link, anime_id FROM Anime WHERE title_eng  LIKE '%". $_SESSION['searchkey']. "%' OR title_jap LIKE '%". $_SESSION['searchkey']. "%' ORDER BY title_eng ASC";
		$result=mysqli_query($connection,$query);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if(preg_match('/^\d/', $row['title_eng'])){
					if(preg_match('%$_SESSION%', $row['title_eng'])){
						echo "<h3 class='description'>". $row['title_eng']."</h3><br>";
					}
				}
				else if($row['title_eng']!=NULL)
				echo "<h3 class='description'><a class='searchres' href='AnimePage.php?link=". $row['anime_id']."'>". $row['title_eng']." (". 
					$row['title_jap']. ")</h3><br>";
			}
		} else {echo "0 results";}

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
