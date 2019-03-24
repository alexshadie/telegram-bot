<?php
error_reporting(E_ALL);

require __DIR__ . '/../../vendor/autoload.php';

$config = require __DIR__ . '/../auth.php';
list($name, $token, $endpoint) = $config;

$logger = new \Monolog\Logger("telegram-bot");

$webHookBotApi = new \alexshadie\TelegramBot\Bot\BotApi($name, $token, "https://api.telegram.org", $logger);

$bot = new \alexshadie\TelegramBot\Bot\WebHookBot(
    $endpoint,
    realpath(__DIR__ . "/../cert/cert.pem")
);

$bot->setBotApi($webHookBotApi)
    ->setLogger($logger);

try {
    $bot->say(258500651, "Это сообщение");
} catch (\alexshadie\TelegramBot\Bot\Exception\TelegramResponseException $e) {
    $logger->error($e);
}