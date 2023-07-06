<?php
include 'configs.php';
$url = "https://api.openai.com/v1/models";
$header = array(
  "Authorization: Bearer $OPENAI_API_KEY"
);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => $header
));

echo $reponse = curl_exec($curl);
