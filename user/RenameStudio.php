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
		<a>Welcome, <?php echo "<i class='username'>".$_SESSION['username']."</i>"; ?></a>
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
    $studio_id = $_GET["studio_id"];

    $sql1="SELECT * FROM Studio r1
        WHERE r1.studio_id = {$studio_id}";
		
    $get_studio = mysqli_query($connection,$sql1);

    if(mysqli_num_rows($get_studio)>0){
        $result = mysqli_fetch_assoc($get_studio);

        $studio_name = $result["studio_name"];

        $new_studio_name =  $new_studio_name_error = "";

        if(isset($_POST["button"])){
            if(empty($_POST["new_studio_name"])){
                $new_studio_name_error = "This field must not be empty";
            } else{
                $new_studio_name = $_POST["new_studio_name"];
                $studio_name = $new_studio_name;
            }
                   
            if($new_studio_name){

                    $sql2 = "UPDATE Studio r1
                    SET studio_name = '$new_studio_name'
                    WHERE r1.studio_id = '$studio_id'";

                    mysqli_query($connection,$sql2) or die(mysqli_error($connection));

                    // var_dump($sql2);
                    header("Location: StudiosPage.php");
            }
        }
?>

<form class="container" method="POST">

    <?php include('../errors.php'); ?>
    <div class="input-group">
        <h2>Rename studio <font color="#f99a2c"><?php echo $studio_name ?>.</h2>
    </div>

    <div class="input-group">
        <input type="text" name="new_studio_name" value="<?php echo $studio_name ?>">
        <small class="error"><?php echo $new_studio_name_error ?></small>
    </div>

    <div class="input-group">
        <input type="submit" name="button" value="Update" class="btn">
    </div>

     <div class="input-group">
        <a href="Studio.php" style="color: white;">Cancel</a>
    </div>

</form>

<?php
} else{
    echo "There seems to be an error.";
}
?>
