<?php
$url = "http://localhost:8000/api/articles";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$articles = json_decode(curl_exec($ch));
if (!empty($articles)) $articles = array_reverse($articles);
curl_close($ch);

include("views/_home.php");
?>