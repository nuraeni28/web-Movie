<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Netflex Movie</title>
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
        <a class="h1 text-white navbar-brand text-bg-danger" href="index.php">Netflex</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="movies.php">Movies</a>
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
              <a class="nav-link" href="tv_show.php">TV Show</a>
            </li>
          </ul>
          <!-- <form class="d-flex" role="search" action="searchMovie.php" method="get">
              <button class="btn btn-outline-danger" type="submit">
                Search
              </button>
            </form> -->
        </div>
      </div>
    </nav>
  </header>

  <main>
    <!-- movie banner -->
    <!-- <section class="movie-banner">
      <div class="m-banner-img">
        <img src="images/cover.jpeg" alt="" />
      </div>
      <div class="banner-container"> -->
        <!-- title -->
        <!-- <div class="title-container">
          <div class="tittle-top">
            <div class="movie-title">
              <h1>The Adam Project</h1>
            </div>
            <div class="more-about-movie">
              <p class="text-light">
                After accidentally crash-landing in 2022, time-traveling fighter
                pilot Adam Reed teams up with his 12-year-old self for a mission
                to save the future.
              </p>
            </div>
            <div class="badges">
              <span class="h1 badge text-bg-danger">Ultra HD</span>
            </div> -->
            <!-- title bottom -->
          <!-- </div>
          <div class="title-bottom">
            <div class="category">
              <a class="text-light" href="#">Action</a> | <a href="#" class="text-light">Sci-Fi</a>
            </div>
            <button type="button" class="btn btn-outline-light">Watch Trailer</button>
          </div>
        </div>
      </div>
    </section> -->

    <!-- movieslider -->
    <section id="main-slider">
      <!-- Swiper -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <?php
          include_once "api/topRated.php";
          foreach ($topRated->results as $top) {
          ?>
            <div class="swiper-slide">
              <div class="main-slider-box">
                <!-- img -->
                <div class="main-slider-img">
                  <img src="<?php echo 'http://image.tmdb.org/t/p/w500' . $top->poster_path ?>" alt="" />
                </div>
                <!-- text -->
                <div class="main-slider-text">
                  <span class="badge text-bg-danger">4K BluRay</span>
                  <!-- bottomtext -->
                  <div class="bottom-text">
                    <div class="movie-name">
                      <a href=<?php echo 'detailMovie.php?id=' . $top->id ?>><?php echo $top->original_title ?></a>
                      <span><?php echo $top->release_date ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </section>


    <!-- Latest Movies -->

    <section id="latest">
      <!-- heading -->
      <div class="latest-heading">
        <h1>Popular Movies</h1>
      </div>

      <!-- container -->

      <div class="post-container">
        <!-- postbox -->
        <?php
        include_once "api/popular.php";
        foreach ($popular->results as $pop) {
        ?>
          <div class="post-box">
            <!-- img -->
            <div class="post-img">
              <img src="<?php echo 'http://image.tmdb.org/t/p/w500' . $pop->poster_path ?>" alt="" />
            </div>
            <div class="main-slider-text">
              <span class="badge text-bg-danger">FULL HD</span>

              <!-- bottomtext -->
              <div class="bottom-text">
                <div class="movie-name">
                  <a href=<?php echo 'detailMovie.php?id=' . $pop->id ?>> <?php echo $pop->original_title; ?></a>
                  <span><?php echo $pop->release_date ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>


    <!-- Latest Movies -->

    <section id="latest">
      <!-- heading -->
      <div class="latest-heading">
        <h1>Popular TV Show</h1>
      </div>

      <!-- container -->

      <div class="post-container">
        <!-- postbox -->
        <?php
        include_once "api/popular_tv_show.php";
        foreach ($popularTV->results as $popTV) {
        ?>
          <div class="post-box">
            <!-- img -->
            <div class="post-img">
              <img src="<?php echo 'http://image.tmdb.org/t/p/w500' . $popTV->poster_path ?>" alt="" />
            </div>
            <div class="main-slider-text">
              <span class="badge text-bg-danger">FULL HD</span>

              <!-- bottomtext -->
              <div class="bottom-text">
                <div class="movie-name">
                  <a href=<?php echo 'detailTV.php?id=' . $popTV->id ?>><?php echo $popTV->name ?></a>
                  <span><?php echo $popTV->first_air_date ?></span>
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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    function reinitSwiper(swiper) {
      setTimeout(function() {
        swiper.reInit();
      }, 500);
    }
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      },
    });
  </script>
</body>

</html>