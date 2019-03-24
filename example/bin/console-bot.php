<?php

require __DIR__ . "/../../vendor/autoload.php";

$logger = new \Monolog\Logger("telegram-bot");
list($bot_name, $bot_key) = include(__DIR__ . '/../auth.php');

$botApi = new \alexshadie\TelegramBot\Bot\BotApi($bot_name, $bot_key, "https://api.telegram.org", $logger);

$messageDispatcher = new \alexshadie\TelegramBot\MessageDispatcher\MessageDispatcher($botApi);
$messageDispatcher->addHandler(
    new \alexshadie\TelegramBot\MessageDispatcher\EchoMessageHandler()
);

$bot = new \alexshadie\TelegramBot\Bot\LongPollingBot();
$bot->setBotApi($botApi)
    ->setMessageDispatcher($messageDispatcher)
    ->setLogger($logger);

$sigHandler = function ($signo) use ($logger, $bot) {
    $logger->info("Caught signal {$signo}, stopping...");
    $bot->stop();
    return true;
};

pcntl_async_signals(true);
pcntl_signal(SIGTERM, $sigHandler);
pcntl_signal(SIGINT, $sigHandler);

echo $bot->me()->toString();

$bot->run();
