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
    $studio_id = $_GET["studio_id"];

    $sql1="SELECT * FROM Studio r1
        WHERE r1.studio_id = {$studio_id}";
		
    $get_studio = mysqli_query($connection,$sql1);

    if(mysqli_num_rows($get_studio)>0){
        $result = mysqli_fetch_assoc($get_studio);

        $studio_name = $result["studio_name"];

        if(isset($_POST["button"])){
			
			$sql2 = "UPDATE Created
			SET studio_id = '99999'
			WHERE studio_id = '$studio_id'";

			mysqli_query($connection,$sql2) or die(mysqli_error($connection));

			mysqli_query($connection, "DELETE FROM Studio WHERE studio_id='$studio_id'");

            header("Location: HomeV2.php");
        }
?>

<form class="container" method="POST">
    <div class="input-group">
        <h2>You are about to delete <font color="#f99a2c"><?php echo $studio_name ?>.</h2>
    </div>

    <div class="input-group">
        <input type="submit" name="button" value="Delete" class="btn-2">
        &nbsp; &nbsp;
        <a href="HomeV2.php" style="color: white;">Cancel</a>
    </div>
</form>


<?php
    } else{
        echo "There seems to be a problem.";
    }
?>