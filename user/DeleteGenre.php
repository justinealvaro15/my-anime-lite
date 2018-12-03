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
	<h2>MyAnimeLite</h2>
	<?php  if (isset($_SESSION['username'])) : ?>
		<a>Welcome <strong><?php echo $_SESSION['username']; ?></strong></a>
	<?php endif ?>
	<a href="HomeV2.php"> Home</a>
	<a href="MoviesPage.php"> Movies</a>
	<a href="AddAnime.php"> Add Anime</a>
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
	<?php  if (isset($_SESSION['username'])) : ?>
		<a href="../index.php?logout='1'">logout</a>
	<?php endif ?>
</div>

<?php
    $genre_name = $_GET["genre_name"];

    $sql1="SELECT * FROM Genre
		WHERE genre_name = '$genre_name'";
		
    $get_genre = mysqli_query($connection,$sql1) or die(mysqli_error($connection));

    if(mysqli_num_rows($get_genre)>0){
        $result = mysqli_fetch_assoc($get_genre);

        if(isset($_POST["button"])){
            mysqli_query($connection, "DELETE FROM Genre WHERE genre_name='$genre_name'");

            header("Location: HomeV2.php");
        }
?>

<form class="container" method="POST">
    <div class="input-group">
        <h2>You are about to delete <font color="#f99a2c"><?php echo $genre_name ?>.</h2>
    </div>

    <div class="input-group">
        <input type="submit" name="button" value="Delete" class="btn-2">
        &nbsp; &nbsp;
        <a href="CategoryPage.php" style="color: white;">Cancel</a>
    </div>
</form>


<?php
    } else{
        echo "There seems to be a problem.";
    }
?>