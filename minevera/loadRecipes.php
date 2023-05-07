<?php
const API_KEY = "9317caf4e63940199380dca4ac77dfde";

$testUrl = "https://api.spoonacular.com/recipes/random?apiKey={API_KEY}";

$data = [
    'API_KEY' => API_KEY
];



function generateUrl(string $templateUrl, array $replacments): string {
    foreach($replacments as $key=>$value) {
        $templateUrl = str_replace("{" . $key . "}", $value, $templateUrl);
    }
    return $templateUrl;
}

$url = generateUrl($testUrl, $data);

//echo $url;

$res = file_get_contents($url);

$dataJson = json_decode($res, false);

file_put_contents("random.json", serialize($dataJson));


$binaryData = file_get_contents("random.json");

$dataJson = unserialize($binaryData);

print_r($dataJson);