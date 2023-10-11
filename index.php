<?php

// Remplacez ces valeurs par les clés d'API de votre application Twitter
$consumerKey = '***';
$consumerSecret = '***';
$accessToken = '***';
$accessTokenSecret = '***';

// Composez votre tweet
$tweet = "testimg";

// Chemin de l'image que vous voulez poster
$imagePath = 'tweet.jpg';

// Chargez la bibliothèque TwitterOAuth
require 'vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

// Initialisez l'objet TwitterOAuth
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

// Vérifiez si l'image existe et peut être chargée
if (file_exists($imagePath)) {

    // Chargez l'image sur Twitter
    $media = $connection->upload('media/upload', ['media' => $imagePath]);

    // Vérifiez si le chargement de l'image a réussi
    if (isset($media->media_id_string)) {
        // Attachez l'image au tweet
        $queryParams = [

            'text' => $tweet,
            'media' => [
                "media_ids" => [$media->media_id_string]
            ]
        ];

        $connection->setApiVersion('2');

        $connection->post("tweets", $queryParams, true);


        // Vérifiez si le tweet a été publié avec succès
        if ($connection->getLastHttpCode() == 200 || $connection->getLastHttpCode() == 201) {
            echo "Tweet publié avec succès!";
        } else {
            echo "Erreur lors de la publication du tweet : " .  $connection->getLastHttpCode();
        }
    } else {
        echo "Erreur lors du chargement de l'image : " . json_encode($media, JSON_PRETTY_PRINT);
    }
} else {
    echo "L'image n'existe pas ou ne peut pas être chargée.";
}
?>
