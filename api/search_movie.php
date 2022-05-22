<?php
$query = $_GET['query'];
$curl = curl_init();
$apikey = "2174d146bb9c0eab47529b2e77d6b526";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?api_key=".$apikey."&query=".$query,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $searchMovie = json_decode($response);
//  echo "<prev>"; print_r($searchMovie); echo "</prev>";
}

foreach($searchMovie->results as $seMov){
?>
<div class="post-box">
  <!-- img -->
  <div class="post-img">
    <img src="<?php echo 'http://image.tmdb.org/t/p/w500'.$seMov->poster_path?>" alt="not found " />
  </div>
  <div class="main-slider-text">
    <span class="badge text-bg-danger">FULL HD</span>

    <!-- bottomtext -->
    <div class="bottom-text">
      <div class="movie-name">
      <a href=<?php echo 'detailMovie.php?id='.$seMov->id ?>><?php echo $seMov->original_title?></a>
        <span><?php echo $seMov->release_date?></span>
      </div>
    </div>
  </div>
</div>
<?php }?> 
