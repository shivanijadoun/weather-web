<?php
$apikey = "a6be145309dea23ebbb7df4ee6964ddb";
$apiurl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";

if(isset($_GET['city'])) {
    $city = $_GET['city'];
    $apiCall = $apiurl . $city . "&appid=" . $apikey;
    $weatherData = file_get_contents($apiCall);
    $weatherJSON = json_decode($weatherData, true);

    $xml = new SimpleXMLElement('<weatherData></weatherData>');
    $xml->addChild('city', $weatherJSON['name']);
    $xml->addChild('temperature', $weatherJSON['main']['temp'] . '°C');
    $xml->addChild('humidity', $weatherJSON['main']['humidity'] . '%');
    $xml->addChild('windSpeed', $weatherJSON['wind']['speed'] . 'km/h');
    $xml->addChild('weatherType', $weatherJSON['weather'][0]['main']);

    $xml->asXML('weather_data.xml');
}
?>
