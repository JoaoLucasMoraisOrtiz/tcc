<?php

require "./HandleJs.php";

$obHandle = new HandleJs;

$content = ['teste' => 'chegou ai?'];
$obHandle->post($content, 'http://localhost:8000/require.php');