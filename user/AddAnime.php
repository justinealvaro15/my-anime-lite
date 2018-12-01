<!DOCTYPE html>
<html>
<head>
	<title>MyAnimeLite</title>
	<link rel="stylesheet" type="text/css" href="../stylev2.css">
</head>

<?php
    include("../server.php");

$new_anime_id = $new_anime_id_error = "";
$new_title_jap = $new_title_jap_error = "";
$new_title_eng = $new_title_eng_error = "";
$new_score = $new_score_error = "";
$new_rank_overall =  $new_rank_overall_error = "";
$new_rank_popularity = $new_rank_popularity_error = "";
$new_type = $new_type_error = "";
$new_source = $new_source_error = "";
$new_ep_count =  $new_ep_count_error = "";
$new_duration_min = $new_duration_min_error = "";
$new_poster_link = $new_poster_link_error = "";

$new_season = $new_season_error = "";
$new_year = $new_year_error = "";

$new_studio_name =  $new_studio_name_error = "";
$new_lic_name = $new_lic_name_error = "";


if(isset($_POST["button"])){
    if(empty($_POST["new_anime_id"])){
        $new_anime_id_error = "This field must not be empty";
    } else{
        $new_anime_id = $_POST["new_anime_id"];
    }
    
    if(empty($_POST["new_title_jap"])){
        $new_title_jap_error = "This field must not be empty";
    } else{
        $new_title_jap = $_POST["new_title_jap"];
    }

    if(empty($_POST["new_title_eng"])){
        $new_title_eng_error = "This field must not be empty";
    } else{
        $new_title_eng = $_POST["new_title_eng"];
    }

    if(empty($_POST["new_score"])){
        $new_score_error = "This field must not be empty";
    } else{
        $new_score = $_POST["new_score"];
    }

    if(empty($_POST["new_rank_overall"])){
        $new_rank_overall_error = "This field must not be empty";
    } else{
        $new_rank_overall = $_POST["new_rank_overall"];
    }

    if(empty($_POST["new_rank_popularity"])){
        $new_rank_popularity_error = "This field must not be empty";
    } else{
        $new_rank_popularity = $_POST["new_rank_popularity"];
    }

    if(empty($_POST["new_type"])){
        $new_type_error = "This field must not be empty";
    } else{
        $new_type = $_POST["new_type"];
    }

    if(empty($_POST["new_source"])){
        $new_source_error = "This field must not be empty";
    } else{
        $new_source = $_POST["new_source"];
    }

    if(empty($_POST["new_ep_count"])){
        $new_ep_count_error = "This field must not be empty";
    } else{
        $new_ep_count = $_POST["new_ep_count"];
    }

    if(empty($_POST["new_duration_min"])){
        $new_duration_min_error = "This field must not be empty";
    } else{
        $new_duration_min = $_POST["new_duration_min"];
    }

    if(empty($_POST["new_season"])){
        $new_season_error = "This field must not be empty";
    } else{
        $new_season = $_POST["new_season"];
    }

    if(empty($_POST["new_year"])){
        $new_year_error = "This field must not be empty";
    } else{
        $new_year = $_POST["new_year"];
    }

    if(empty($_POST["new_studio_name"])){
        $new_studio_name_error = "This field must not be empty";
    } else{
        $new_studio_name = $_POST["new_studio_name"];
        $sql3 = "SELECT studio_id FROM `studio` WHERE studio_name=".$_POST["new_studio_name"];
        $result3 = $connection->query($sql3);

        if ($result3->num_rows > 0) {
            // output data of each row
            while($row = $result3->fetch_assoc()) {
                $new_studio_id = $row["studio_id"];
            }
        } else {
            $rowSQL = mysqli_query($connection, "SELECT MAX(studio_id) AS max FROM `studio`" ) ;
            $row = mysqli_fetch_array( $rowSQL );
            $largestNumber = $row['max'] + 1;

            $new_studio_id = $largestNumber;
        }
    }

    if(empty($_POST["new_lic_name"])){
        $new_lic_name_error = "This field must not be empty";
    } else{
        $new_lic_name = $_POST["new_lic_name"];
        $sql2 = "SELECT lic_id FROM `licensor` WHERE lic_name=".$_POST["new_lic_name"];
        $result2 = $connection->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while($row = $result2->fetch_assoc()) {
                $new_lic_id = $row["lic_id"];
            }
        } else {
            $rowSQL = mysqli_query($connection, "SELECT MAX(lic_id) AS max FROM `licensor`" );
            $row = mysqli_fetch_array( $rowSQL );
            $largestNumber = $row['max'] + 1;

            $new_lic_id = $largestNumber;
        }
        
    }
    
    if(empty($_POST["new_poster_link"])){
        $new_poster_link_error = "This field must not be empty";
    } else{
        $new_poster_link = $_POST["new_poster_link"];
    }  
        
    if($new_title_jap AND 
        $new_title_eng AND
        $new_score AND
        $new_rank_overall AND
        $new_rank_popularity AND
        $new_type AND
        $new_source AND
        $new_ep_count AND
        $new_duration_min AND

        $new_season AND
        $new_year AND

        $new_studio_name AND
        $new_lic_name AND
        $new_poster_link){

            $sql1 = "INSERT INTO Anime
            (anime_id, title_jap, title_eng, score, rank_overall, rank_popularity, `type`, source, ep_count, duration_min, poster_link)
            VALUES
            ('$new_anime_id', '$new_title_jap', '$new_title_eng', '$new_score', '$new_rank_overall', '$new_rank_popularity', '$new_type', '$new_source', '$new_ep_count', '$new_duration_min', '$new_poster_link')";

            mysqli_query($connection,$sql1) or die(mysqli_error($connection));

            mysqli_query($connection,"INSERT INTO `licensor` (lic_id, lic_name) VALUES ('$new_lic_id', '$new_lic_name')");
            mysqli_query($connection,"INSERT INTO `licensed` (lic_id, anime_id) VALUES ('$new_lic_id', '$new_anime_id')");

            mysqli_query($connection,"INSERT INTO `studio` (studio_id, studio_name) VALUES ('$new_studio_id', '$new_studio_name')");
            mysqli_query($connection,"INSERT INTO `created` (studio_id, anime_id) VALUES ('$new_studio_id', '$new_anime_id')");

            mysqli_query($connection,"INSERT INTO `aired` (year, season, anime_id) VALUES ('$new_year', '$new_season', '$new_anime_id')");
            // var_dump($sql2);
            header("Location: HomeV2.php");
    }
}
?>

<form class="container" method="POST">

    <?php include('../errors.php'); ?>
    <div class="input-group">
        <h2>Add a new anime</h2>
    </div>
    
    <div class="input-group">
        <label>MyAnimeList Anime ID:</label>
        <input type="text" name="new_anime_id" value="<?php echo $new_anime_id ?>">
        <small class="error"><?php echo $new_anime_id_error ?></small>
    </div>

    <div class="input-group">
        <label>Japanese Title:</label>
        <input type="text" name="new_title_jap" value="<?php echo $new_title_jap ?>">
        <small class="error"><?php echo $new_title_jap_error ?></small>
    </div>

    <div class="input-group">
        <label>English Title:</label>
        <input type="text" name="new_title_eng" value="<?php echo $new_title_eng ?>">
        <small class="error"><?php echo $new_title_eng_error ?></small>
    </div>

    <div class="input-group">
        <label>Score:</label>
        <input type="text" name="new_score" value="<?php echo $new_score ?>">
        <small class="error"><?php echo $new_score_error ?></small>
    </div>

    <div class="input-group">
        <label>Overall Rank:</label>
        <input type="text" name="new_rank_overall" value="<?php echo $new_rank_overall ?>">
        <small class="error"><?php echo $new_rank_overall_error ?></small>
    </div>

    <div class="input-group">
        <label>Popularity Rank:</label>
        <input type="text" name="new_rank_popularity" value="<?php echo $new_rank_popularity ?>">
        <small class="error"><?php echo $new_rank_popularity_error ?></small>
    </div>

    <div class="input-group">
        <label>Type:</label>
        <input type="text" name="new_type" value="<?php echo $new_type ?>">
        <small class="error"><?php echo $new_type_error ?></small>
    </div>

    <div class="input-group">
        <label>Source:</label>
        <input type="text" name="new_source" value="<?php echo $new_source ?>">
        <small class="error"><?php echo $new_source_error ?></small>
    </div>

    <div class="input-group">
        <label>Episode Count:</label>
        <input type="text" name="new_ep_count" value="<?php echo $new_ep_count ?>">
        <small class="error"><?php echo $new_ep_count_error ?></small>
    </div>

    <div class="input-group">
        <label>Episode Duration:</label>
        <input type="text" name="new_duration_min" value="<?php echo $new_duration_min ?>">
        <small class="error"><?php echo $new_duration_min_error ?></small>
    </div>

    <div class="input-group">
        <label>Season:</label>
        <input type="text" name="new_season" value="<?php echo $new_season ?>">
        <small class="error"><?php echo $new_season_error ?></small>
    </div>

    <div class="input-group">
        <label>Year:</label>
        <input type="text" name="new_year" value="<?php echo $new_year ?>">
        <small class="error"><?php echo $new_year_error ?></small>
    </div>

    <div class="input-group">
        <label>Studio:</label>
        <input type="text" name="new_studio_name" value="<?php echo $new_studio_name ?>">
        <small class="error"><?php echo $new_studio_name_error ?></small>
    </div>

    <div class="input-group">
        <label> Licensor:</label>
        <input type="text" name="new_lic_name" value="<?php echo $new_lic_name ?>">
        <small class="error"><?php echo $new_lic_name_error ?></small>
    </div>

    <div class="input-group">
        <label> Poster Link:</label>
        <input type="text" name="new_poster_link" value="<?php echo $new_poster_link ?>">
        <small class="error"><?php echo $new_poster_link_error ?></small>
    </div>

     <div class="input-group">
        <input type="submit" name="button" value="Create" class="btn">
    </div>

     <div class="input-group">
        <a href="HomeV2.php" style="color: white;">Cancel</a>
    </div>

    <!-- <div class="input-group">
        <button type="submit" class="btn" name="login_user" id="login">Login</button>
        <script>
            var btn = document.getElementById('login');
            btn.addEventListener('click', function() {
                document.location.href = '<?php echo "user/HomeV2.php"; ?>';
            });
        </script>
    </div> -->

</form>