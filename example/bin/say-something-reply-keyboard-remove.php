<?php
error_reporting(E_ALL);

require __DIR__ . '/../../vendor/autoload.php';

$config = require __DIR__ . '/../auth.php';
list($name, $token, $endpoint) = $config;

$logger = new \Monolog\Logger("telegram-bot");

$webHookBotApi = new \alexshadie\TelegramBot\Bot\BotApi($name, $token, $logger);

$bot = new \alexshadie\TelegramBot\Bot\WebHookBot(
    $endpoint,
    realpath(__DIR__ . "/../cert/cert.pem")
);

$bot->setBotApi($webHookBotApi)
    ->setLogger($logger);

try {
    $markup = new \alexshadie\TelegramBot\Objects\ReplyMarkup();
    $markup->setReplyKeyboardRemove(
        new \alexshadie\TelegramBot\Keyboard\ReplyKeyboardRemove(true)
    );
    $bot->sayWithMarkup(258500651, "Вот и нет кнопок", $markup);
} catch (\alexshadie\TelegramBot\Bot\Exception\TelegramResponseException $e) {
    $logger->error($e);
}