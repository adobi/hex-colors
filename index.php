<?php
ini_set('display_errors', 1);
require_once('api/TwitterApiExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "9683362-0ZbAJf6iQbHSjSefejMMuPI2s1KJWTqLIie0ZPOmAq",
    'oauth_access_token_secret' => "FTWv9AsTam2unOsrY4ihlVa5tRArXIaS8TNEF6HEsRBpe",
    'consumer_key' => "T2RnoIAaWXF5KsliDQ1gxnm3J",
    'consumer_secret' => "nAYXptp808zGlTueXr0GsHJLAeGVKoE14Iygrhv9XZkpLKH8L8"
);

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=EveryHexColor';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);

$responseJSON = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

$response = null;
if ($responseJSON) {
  $response = json_decode($responseJSON);
}
require_once('template/layout.php');
