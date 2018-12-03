<?php
	include_once ('../server.php'); 
?>

<!DOCTYPE html>
<html>
<head>
<title>MyAnimeLite</title>
<link rel="stylesheet" type="text/css" href="v2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:100|Montserrat|Maven+Pro|Bungee|Changa+One|Questrial" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../stylev2.css">
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

<?php
    $anime_id = $_GET["anime_id"];

    $sql1="SELECT * FROM Anime t1
        INNER JOIN Aired t2 ON t1.anime_id = t2.anime_id
        INNER JOIN Created t3 ON t1.anime_id = t3.anime_id
		INNER JOIN Licensed t4 ON t1.anime_id = t4.anime_id
		INNER JOIN Studio r1 ON t3.studio_id = r1.studio_id
		INNER JOIN Licensor r2 ON t4.lic_id = r2.lic_id
        WHERE t1.anime_id = '$anime_id'";
		
    $get_anime = mysqli_query($connection,$sql1);

    if(mysqli_num_rows($get_anime)>0){
        $result = mysqli_fetch_assoc($get_anime);

        $title_jap = $result["title_jap"];

        if(isset($_POST["button"])){
			mysqli_query($connection, "DELETE FROM Aired WHERE anime_id='$anime_id'");
			mysqli_query($connection, "DELETE FROM Created WHERE anime_id='$anime_id'");
			mysqli_query($connection, "DELETE FROM Licensed WHERE anime_id='$anime_id'");
			mysqli_query($connection, "DELETE FROM Classification WHERE anime_id='$anime_id'");
			mysqli_query($connection, "DELETE FROM Relationship WHERE anime_id='$anime_id'");
            mysqli_query($connection, "DELETE FROM Anime WHERE anime_id='$anime_id'");

            header("Location: HomeV2.php");
        }
?>

<form class="container" method="POST">
    <div class="input-group">
        <h2>You are about to delete <font color="#f99a2c"><?php echo $title_jap ?>.</h2>
    </div>

    <div class="input-group">
        <input type="submit" name="button" value="Delete" class="btn-2">
        &nbsp; &nbsp;
        <a href="AnimePage.php" style="color: white;">Cancel</a>
    </div>
</form>


<?php
    } else{
        echo "There seems to be a problem.";
    }
?>
