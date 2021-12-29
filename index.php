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
    <title>Movie Bookmark Application</title>
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
    <div id="app">
      <input
        type="text"
        autofocus
        placeholder="Enter a movie name"
        class="search_text"
      />
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        class="bi bi-search"
        viewBox="0 0 16 16"
      >
        <path
          d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
        />
      </svg>
      <div id="movies"></div>
    </div>
    <!-- Core theme JS-->
    <script defer src="/components/appHeader/appHeader.js"></script>
    <script defer src="/components/movieCard/movieCard.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
