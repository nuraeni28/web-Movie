<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Netflex and Stress</title>
  <script src="https://unpkg.com/feather-icons"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="images/icon.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <!-- SwiperCSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="h1 text-white navbar-brand text-bg-danger" href="#">Netlfex</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Movies</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Genre
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Comedy</a></li>
                <li><a class="dropdown-item" href="#">Romance</a></li>
                <li><a class="dropdown-item" href="#">Horror</a></li>
                <li><a class="dropdown-item" href="#">Thriller</a></li>
                <li><a class="dropdown-item" href="#">Sci-Fi</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link">TV Show</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-danger" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <!-- movie banner -->
    <section class="movie-banner">
    <?php
       $id_movie = $_GET['id'];
        include_once "api/detail_movie.php";
        ?>
      <div class="m-banner-img">
        <img src="<?php echo 'http://image.tmdb.org/t/p/w500'.$detailMovie->poster_path?>" alt="" />
      </div>
      <div class="banner-container">
        <!-- title -->
        <div class="title-container">
          <div class="tittle-top">
            <div class="movie-title">
              <h1><?php echo $detailMovie->original_title?></h1>
            </div>
            <div class="more-about-movie">
              <p class="text-light">
              <?php echo $detailMovie->overview?>
              </p>
            </div>
            <div class="badges">
              <span class="h1 badge text-bg-danger">Ultra HD</span>
            </div>
            <!-- title bottom -->
          </div>
          <div class="title-bottom">
            <div class="category">
              <?php
            foreach($detailMovie->genres as $genres){
              ?>
              <a class="text-light" href="#"> <?php echo $genres->name?></a> |
             
            </div>
            <?php }?>
            <a href="https://www.youtube.com/watch?v=Rf8LAYJSOL8" type="button" class="btn btn-outline-light">Watch Trailer</a>
            
          </div>
         
        </div>

        <div class="play-btn-container">
          <div class="play-btn">
            <a href="javascript:void">
              <i data-feather="play"></i>
            </a>
          </div>
        </div>

        <!--full movie -->
        <div id="play" class="play">
          <!-- close -->
          <a href="javascript:void" class="close-movie">
            <i data-feather="x"></i>
          </a>
          <!-- trailer -->
          <div class="play-movie">
            <video id="m-video" controls>
              <source src="images/The Adam Project Official Trailer Netflix.mp4" type="video/mp4" />
            </video>
          </div>
        </div>
      </div>
    </section>
    <section id="latest">
      <!-- heading -->
      <div class="latest-heading">
        <h1>More to Explore</h1>
      </div>

      <!-- container -->

      <div class="post-container">
        <!-- postbox -->
        <?php
        include_once "api/recomended_movie.php";
        foreach ($recomendedMovie->results as $recomended) {
        ?>
          <div class="post-box">
            <!-- img -->
            <div class="post-img">
              <img src="<?php echo 'http://image.tmdb.org/t/p/w500' . $recomended->poster_path ?>" alt="" />
            </div>
            <div class="main-slider-text">
              <span class="badge text-bg-danger">FULL HD</span>

              <!-- bottomtext -->
              <div class="bottom-text">
                <div class="movie-name">
                  <a href="#"><?php echo $recomended->original_title ?></a>
                  <span><?php echo $recomended->release_date ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>
  </main>
  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>

  <script>
    /*==popup-open==================================*/
    $(document).on("click", ".play-btn a", function() {
      $(".play").addClass("active-popup");
    });
    /*==popup-Close==================================*/
    $(document).on("click", ".close-movie", function() {
      $(".play").removeClass("active-popup");
    });
    /*==auto-play-when-popup-open===================*/
    $(".play-btn a").click(function() {
      $("#m-video")[0].play();
    });
    /*==Close-video-when-poppup-close==============*/
    $(".close-movie").click(function() {
      $("#m-video")[0].pause();
    });
  </script>

  <script src="js/jQuery.js"></script>

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script>
    feather.replace();
  </script>
    <script>
</body>

</html>