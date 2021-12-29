<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Movie Bookmark Application - Bookmarks</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/style.css" />
  </head>
  <body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Movie Bookmark Application</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
			<?php session_start(); if(isset($_SESSION['userid']) && $_SESSION['userid'] != NULL){echo('
            <li class="nav-item">
              <a class="nav-link" href="favourites.php">Favourites</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="bookmarks.php">Bookmarks</a>
            </li>');} ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php if(isset($_SESSION['userid']) && $_SESSION['userid'] != NULL) {echo('logout.php');} else {echo('/login/login.php');} ?>"><?php if(isset($_SESSION["userid"]) && $_SESSION["userid"] != NULL){echo("Log-out");}else{echo("Log-in");} ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page content-->
      <center id="movies" >
	  
		<link rel="stylesheet" href="/../components/movieCard/movieCard.css" />

<?php
require_once'functions.php';
$sql = $dbh->prepare("SELECT * FROM movies WHERE user_id = :ui and listing_type=2");
$sql->setFetchMode(PDO::FETCH_ASSOC);
$sql->bindParam(':ui',$_SESSION["userid"],PDO::PARAM_INT);
$sql->execute();


if($sql->rowCount() != 0) {

?>
 <?php     
 while($row=$sql->fetch()) 
 {
	 echo(strlen($row["movie_image"]));
	 if(strlen($row["movie_image"])<20)
	 {
		 $img= "default.png";
	 }
	 else
	 {
		$img=$row["movie_id"];
	 }
		   echo '
		   <div class="movie-container">
    <div class="image-container">
        <img src='.$img.'/>
    </div>
    <div class="info">
        <h3 class="title">'.$row["movie_name"].'</h3>
		<p id="index" hidden>'.$row["movie_id"].'</p>
        <p>'.$row["movie_year"].' / '.$row["movie_type"].'</p>
        <p>Saved on '.$row["create_date"].'</p>
        <div class="action_container">
            <a href="link" id="isBookmark"><i class="is_bookmarked fa fa-bookmark"></i></a>
            <a target="_blank" href="https://imdb.com/title/'.$row["movie_link"].'" class="button">IMDb</a>
        </div>
        <div class="bs-example">
</div>
    </div>
	</div>
		   ';
 }

}
else
{
     echo "don't exist records for list on the table";
}

?>
	  
    </center>
    <!-- Core theme JS-->
    <script defer src="/components/appHeader/appHeader.js"></script>
    <script defer src="/components/movieCard/movieCard.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
