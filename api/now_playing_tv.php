<?php

$curl = curl_init();
$apikey = "2174d146bb9c0eab47529b2e77d6b526";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/tv/on_the_air?api_key=".$apikey,
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
  $playingNow = json_decode($response);
//  echo "<prev>"; print_r($data); echo "</prev>";
}
?>