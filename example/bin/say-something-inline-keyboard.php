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
    $markup->setInlineKeyboard(
        (new \alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup([]))
            ->addButton(new \alexshadie\TelegramBot\Keyboard\InlineKeyboardButton("Open ya.ru", "http://ya.ru"))
            ->addButton(new \alexshadie\TelegramBot\Keyboard\InlineKeyboardButton("Open google.com", "http://google.com"))
    );
    $bot->sayWithMarkup(258500651, "Какой поисковик открыть?", $markup);
} catch (\alexshadie\TelegramBot\Bot\Exception\TelegramResponseException $e) {
    $logger->error($e);
}