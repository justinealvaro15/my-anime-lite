<?php
	include_once 'connection.php'; 
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
	<!--</div>-->

</div>

<!-----------------------THE BODY ------------------------>
<body>
<div class="categorybox"><span align="left">
	 <?php 
	 	$_SESSION['searchkey'] = $_POST["input"];
	 	echo "<h1>".$_SESSION['searchkey']."</h1>"; 
	 	$query="SELECT title_eng, title_jap, poster_link FROM Anime WHERE title_eng OR title_jap LIKE '%". $_SESSION['searchkey']. "%'";
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
				echo "<h3 class='description'><a class='searchres' href='AnimePage.php?link='". $row['title_eng']."'>". $row['title_eng']." (". 
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
	            this.style.display = "none"; // Other elements aren't affected. 
	        }
	    }
	})();
</script>
</html>
