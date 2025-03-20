<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
    exit;
}

$uri = $_SERVER['REQUEST_URI'];
if (!($p = strpos($uri, 'netdrive.php/')) || !($url = substr($uri, $p + 13)))
    exit;

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_RETURNTRANSFER => false,
    CURLOPT_HEADER => false,
    CURLOPT_USERAGENT => 'PHP cURL'
]);

header('Access-Control-Allow-Origin: *');
curl_exec($ch);
curl_close($ch);
exit;