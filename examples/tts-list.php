<?php

require_once(__DIR__ . '/../autoload.php');

$MessageBird = new \MessageBird\Client('YOUR_ACCESS_KEY'); // Set your own API access key here.

try {
    $TtsMessageList = $MessageBird->tts->getList(array ('offset' => 100, 'count' => 30));
    var_dump($TtsMessageList);

} catch (MessageBird\Exceptions\AuthenticateException $e) {
    // That means that your accessKey is unknown
    echo 'wrong login';

} catch (Exception $e) {
    var_dump($e->getMessage());
}


