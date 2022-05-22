<?php
$query = $_GET['query'];
$curl = curl_init();
$apikey = "2174d146bb9c0eab47529b2e77d6b526";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/search/tv?api_key=".$apikey."&query=".$query,
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
  $searchTV = json_decode($response);
//  echo "<prev>"; print_r($searchMovie); echo "</prev>";
}

foreach($searchTV->results as $seTv){
?>
<div class="post-box">
  <!-- img -->
  <div class="post-img">
      <?php 
      $img = $seTv->poster_path;
      if(empty($img) && is_null($img)){
        $img =  dirname($_SERVER['PHP_SELF']).'/Images/no-gambar.jpg';
      }
      else {
        $img = 'http://image.tmdb.org/t/p/w300'.$img;
    }
      ?>
    <img src="<?php echo $img?>" alt="not found " />
  </div>
  <div class="main-slider-text">
    <span class="badge text-bg-danger">FULL HD</span>

    <!-- bottomtext -->
    <div class="bottom-text">
      <div class="movie-name">
      <a href=<?php echo 'detailTV.php?id='.$seTv->id ?>><?php echo $seTv->name?></a>
        <span><?php echo $seTv->first_air_date?></span>
      </div>
    </div>
  </div>
</div>
<?php }?> 
