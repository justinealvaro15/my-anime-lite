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
        WHERE t1.anime_id = {$anime_id}";
		
    $get_anime = mysqli_query($connection,$sql1);

    if(mysqli_num_rows($get_anime)>0){
        while($result = mysqli_fetch_assoc($get_anime)){
            $title_jap = $result["title_jap"];
            $title_eng = $result["title_eng"];
            $score = $result["score"];
            $rank_overall = $result["rank_overall"];
            $rank_popularity = $result["rank_popularity"];
            $type = $result["type"];
            $source = $result["source"];
            $ep_count = $result["ep_count"];
            $duration_min = $result["duration_min"];

            $season = $result["season"];
            $year = $result["year"];

            $studio_name = $result["studio_name"];
            $lic_name = $result["lic_name"];
            $poster_link = $result['poster_link'];
        }

        $new_title_jap = $new_title_jap_error = "";
        $new_title_eng = $new_title_eng_error = "";
        $new_score = $new_score_error = "";
        $new_rank_overall =  $new_rank_overall_error = "";
        $new_rank_popularity = $new_rank_popularity_error = "";
        $new_type = $new_type_error = "";
        $new_source = $new_source_error = "";
        $new_ep_count =  $new_ep_count_error = "";
        $new_duration_min = $new_duration_min_error = "";

        $new_season = $new_season_error = "";
        $new_year = $new_year_error = "";

        $new_studio_name =  $new_studio_name_error = "";
        $new_lic_name = $new_lic_name_error = "";
        $new_poster_link = $new_poster_link_error = "";


        if(isset($_POST["button"])){
            if(empty($_POST["new_title_jap"])){
                $new_title_jap_error = "This field must not be empty";
            } else{
                $new_title_jap = $_POST["new_title_jap"];
                $title_jap = $new_title_jap;
            }

            if(empty($_POST["new_title_eng"])){
                $new_title_eng_error = "This field must not be empty";
            } else{
                $new_title_eng = $_POST["new_title_eng"];
                $title_eng = $new_title_eng;
            }

            if(empty($_POST["new_score"])){
                $new_score_error = "This field must not be empty";
            } else{
                $new_score = $_POST["new_score"];
                $score = $new_score;
            }

            if(empty($_POST["new_rank_overall"])){
                $new_rank_overall_error = "This field must not be empty";
            } else{
                $new_rank_overall = $_POST["new_rank_overall"];
                $rank_overall = $new_rank_overall;
            }

            if(empty($_POST["new_rank_popularity"])){
                $new_rank_popularity_error = "This field must not be empty";
            } else{
                $new_rank_popularity = $_POST["new_rank_popularity"];
                $rank_popularity = $new_rank_popularity;
            }

            if(empty($_POST["new_type"])){
                $new_type_error = "This field must not be empty";
            } else{
                $new_type = $_POST["new_type"];
                $type = $new_type;
            }

            if(empty($_POST["new_source"])){
                $new_source_error = "This field must not be empty";
            } else{
                $new_source = $_POST["new_source"];
                $source = $new_source;
            }

            if(empty($_POST["new_ep_count"])){
                $new_ep_count_error = "This field must not be empty";
            } else{
                $new_ep_count = $_POST["new_ep_count"];
                $ep_count = $new_ep_count;
            }

            if(empty($_POST["new_duration_min"])){
                $new_duration_min_error = "This field must not be empty";
            } else{
                $new_duration_min = $_POST["new_duration_min"];
                $duration_min = $new_duration_min;
            }

            if(empty($_POST["new_season"])){
                $new_season_error = "This field must not be empty";
            } else{
                $new_season = $_POST["new_season"];
                $season = $new_season;
            }

            if(empty($_POST["new_year"])){
                $new_year_error = "This field must not be empty";
            } else{
                $new_year = $_POST["new_year"];
                $year = $new_year;
            }

            if(empty($_POST["new_studio_name"])){
                $new_studio_name_error = "This field must not be empty";
            } else{
                $new_studio_name = $_POST["new_studio_name"];
                $studio_name = $new_studio_name;
            }

            if(empty($_POST["new_lic_name"])){
                $new_lic_name_error = "This field must not be empty";
            } else{
                $new_lic_name = $_POST["new_lic_name"];
                $lic_name = $new_lic_name;
            }
            
            if(empty($_POST["new_poster_link"])){
                $new_poster_link_error = "This field must not be empty";
            } else{
                $new_poster_link = $_POST["new_poster_link"];
                $poster_link = $new_poster_link;
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

                    $sql2 = "UPDATE Anime t1
                    INNER JOIN Aired t2 ON t1.anime_id = t2.anime_id
                    INNER JOIN Created t3 ON t1.anime_id = t3.anime_id
                    INNER JOIN Licensed t4 ON t1.anime_id = t4.anime_id
                    INNER JOIN Studio r1 ON t3.studio_id = r1.studio_id
                    INNER JOIN Licensor r2 ON t4.lic_id = r2.lic_id
                    SET title_jap = '$new_title_jap',
                        title_eng = '$new_title_eng',
                        score = '$new_score',
                        rank_overall = '$new_rank_overall',
                        rank_popularity = '$new_rank_popularity',
                        `type` = '$new_type',
                        source = '$new_source',
                        ep_count = '$new_ep_count',
                        duration_min = '$new_duration_min',

                        season = '$new_season',
                        year = '$new_year',

                        studio_name = '$new_studio_name',
                        lic_name = '$new_lic_name',
                        poster_link = '$new_poster_link'
                    WHERE t1.anime_id = {$anime_id}";

                    mysqli_query($connection,$sql2) or die(mysqli_error($connection));

                    // var_dump($sql2);
                    header("Location: AnimePage.php");
            }
        }
?>

<form class="container" method="POST">

    <?php include('../errors.php'); ?>
    <div class="input-group">
        <h2>Edit details about this anime</h2>
    </div>
    
    <div class="input-group">
        <label>Japanese Title:</label>
        <input type="text" name="new_title_jap" value="<?php echo $title_jap ?>">
        <small class="error"><?php echo $new_title_jap_error ?></small>
    </div>

    <div class="input-group">
        <label>English Title:</label>
        <input type="text" name="new_title_eng" value="<?php echo $title_eng ?>">
        <small class="error"><?php echo $new_title_eng_error ?></small>
    </div>

    <div class="input-group">
        <label>Score:</label>
        <input type="text" name="new_score" value="<?php echo $score ?>">
        <small class="error"><?php echo $new_score_error ?></small>
    </div>

    <div class="input-group">
        <label>Overall Rank:</label>
        <input type="text" name="new_rank_overall" value="<?php echo $rank_overall ?>">
        <small class="error"><?php echo $new_rank_overall_error ?></small>
    </div>

    <div class="input-group">
        <label>Popularity Rank:</label>
        <input type="text" name="new_rank_popularity" value="<?php echo $rank_popularity ?>">
        <small class="error"><?php echo $new_rank_popularity_error ?></small>
    </div>

    <div class="input-group">
        <label>Type:</label>
        <input type="text" name="new_type" value="<?php echo $type ?>">
        <small class="error"><?php echo $new_type_error ?></small>
    </div>

    <div class="input-group">
        <label>Source:</label>
        <input type="text" name="new_source" value="<?php echo $source ?>">
        <small class="error"><?php echo $new_source_error ?></small>
    </div>

    <div class="input-group">
        <label>Episode Count:</label>
        <input type="text" name="new_ep_count" value="<?php echo $ep_count ?>">
        <small class="error"><?php echo $new_ep_count_error ?></small>
    </div>

    <div class="input-group">
        <label>Episode Duration:</label>
        <input type="text" name="new_duration_min" value="<?php echo $duration_min ?>">
        <small class="error"><?php echo $new_duration_min_error ?></small>
    </div>

    <div class="input-group">
        <label>Season:</label>
        <input type="text" name="new_season" value="<?php echo $season ?>">
        <small class="error"><?php echo $new_season_error ?></small>
    </div>

    <div class="input-group">
        <label>Year:</label>
        <input type="text" name="new_year" value="<?php echo $year ?>">
        <small class="error"><?php echo $new_year_error ?></small>
    </div>

    <div class="input-group">
        <label>Studio:</label>
        <input type="text" name="new_studio_name" value="<?php echo $studio_name ?>">
        <small class="error"><?php echo $new_studio_name_error ?></small>
    </div>

    <div class="input-group">
        <label> Licensor:</label>
        <input type="text" name="new_lic_name" value="<?php echo $lic_name ?>">
        <small class="error"><?php echo $new_lic_name_error ?></small>
    </div>
    
    <div class="input-group">
        <label> Poster Link:</label>
        <input type="text" name="new_poster_link" value="<?php echo $poster_link ?>">
        <small class="error"><?php echo $new_poster_link_error ?></small>
    </div>

     <div class="input-group">
        <input type="submit" name="button" value="Update" class="btn">
    </div>

     <div class="input-group">
        <a href="AnimePage.php" style="color: white;">Cancel</a>
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

<?php
} else{
    echo "There seems to be an error.";
}
?>
