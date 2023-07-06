<?php
include 'configs.php';
$url = "https://api.openai.com/v1/chat/completions";
$question = "What is PHP";
$curl = curl_init();
$data = array(
  "model" => "gpt-3.5-turbo",
  "messages" =>array(
    array("role" =>"user", "content" =>$question),
  ),
  "temperature" =>0.7
);
$header = array(
  "Content-Type: application/json",
  "Authorization: Bearer $OPENAI_API_KEY"
);

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => $header
));
$response = curl_exec($curl);

curl_close($curl);

$response_data = json_decode($response, true);
$answer = $response_data['choices'][0]['message']['content'];

echo $answer;