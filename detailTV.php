<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Netflex Movie - Show Detail</title>
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
        <a class="h1 text-white navbar-brand text-bg-danger" href="index.php">Netflex</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
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
              <a class="nav-link active" href="tv_show.php">TV Show</a>
            </li>
          </ul>
          <form class="d-flex" role="search" action="searchMovie.php" method="get">
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
    <section class="movie-banner-detail">
      <?php
      // $id_movie = $_GET['id'];
      include_once "api/detail_tv.php";
      ?>
      <div class="m-banner-img">
        <img src="<?php echo 'http://image.tmdb.org/t/p/w500' . $detailTV->backdrop_path ?>" alt="backdrop path" />
      </div>
      <div class="banner-container">

        <!-- title -->
        <div class="title-container">
          <img class="mb-3" src="<?php echo 'http://image.tmdb.org/t/p/w500' . $detailTV->poster_path ?>" alt="" />
          <div class="tittle-top">
            <div class="movie-title">
              <h1><?php echo $detailTV->name ?></h1>
            </div>
            <div class="more-about-movie">
              <p class="text-light">
                <?php echo $detailTV->overview ?>
              </p>
            </div>

            <div class="badges">
              <span class="h1 badge text-bg-danger">Ultra HD</span>
              <!-- rating -->
              <span class="h1 badge text-bg-warning ms-3"><?php echo $detailTV->vote_average ?></span>
              <span class="h1 badge text-bg-dark ms-3"><?php echo $detailTV->number_of_episodes ?> EPISODES</span>
              <span class="h1 badge text-bg-dark ms-3"><?php echo $detailTV->number_of_seasons ?> SEASONS</span>
              <!-- endrating -->
            </div>
            <!-- title bottom -->
          </div>
          <div class="title-bottom">
            <div class="category">
              <?php
              foreach ($detailTV->genres as $genres) {
              ?>
                <a class="text-light" href="#"> <?php echo $genres->name ?></a> |
              <?php } ?>
            </div>

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

    <!-- cast -->
    <section id="main-slider">
      <section id="latest">
        <div class="latest-heading mb-3">
          <h1>Cast</h1>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
            include_once "api/credit_tv.php";
            foreach ($creditTV->cast as $credit) {
            ?>
              <div class="swiper-slide">
                <div class="main-slider-box">
                  <!-- img -->
                  <div class="main-slider-img">
                    <img src="<?php echo 'http://image.tmdb.org/t/p/w500' . $credit->profile_path ?>" alt="" />
                  </div>
                  <!-- text -->
                  <div class="main-slider-text-cast">
                    <span class="badge text-bg-primary">Cast</span>
                    <!-- bottomtext -->
                    <div class="bottom-text">
                      <div class="movie-name">
                        <a class="text-light" href="#"><?php echo $credit->original_name ?></a>
                        <span class="text-light"><?php echo $credit->character ?></span>
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
    </section>

    <section id="latest">
      <section class="images">
        <div class="latest-heading mb-3">
          <h1 class="text-danger">Images</h1>
        </div>

        <!-- images container -->
        <div class="images-container">
          <?php
          include_once "api/images_tv.php";
          foreach ($imgTV->backdrops as $img) {
          ?>
            <img src="<?php echo 'http://image.tmdb.org/t/p/w500' . $img->file_path ?>" alt="">
          <?php } ?>
        </div>
      </section>

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
        include_once "api/recomended_tv.php";
        foreach ($recomendedTV->results as $recomended) {
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
                  <a href=<?php echo 'detailTV.php?id=' . $recomended->id ?>><?php echo $recomended->name ?></a>
                  <span><?php echo $recomended->first_air_date ?></span>
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
        <a class="text-danger" href="#">Back to top</a>
      </p>
    </div>
  </footer>

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script>
    feather.replace();
  </script>
</body>

</html>