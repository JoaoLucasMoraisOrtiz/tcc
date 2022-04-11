<?php

define('URL', 'https://api.opensea.io/api/v1/assets?order_direction=desc&offset=0&limit=20');

$curl = curl_init(URL);
curl_setopt($curl, CURLOPT_URL, URL);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$page = curl_exec($curl);


curl_close($curl);

print_r($page);