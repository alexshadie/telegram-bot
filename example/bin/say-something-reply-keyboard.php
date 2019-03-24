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
    $markup = new \alexshadie\TelegramBot\Objects\ReplyMarkup();
    $markup->setReplyKeyboard(
        new \alexshadie\TelegramBot\Keyboard\ReplyKeyboardMarkup(
            [
                new \alexshadie\TelegramBot\Keyboard\KeyboardButton("Button 1"),
                new \alexshadie\TelegramBot\Keyboard\KeyboardButton("Button 2"),
            ],
            true
        )

    );
    $bot->sayWithMarkup(258500651, "Вот две кнопки", $markup);
} catch (\alexshadie\TelegramBot\Bot\Exception\TelegramResponseException $e) {
    $logger->error($e);
}