<?php

require "vendor/autoload.php";

$logger = new \Monolog\Logger("telegram-bot");
list($bot_name, $bot_key) = include(__DIR__ . '/auth.php');

$bot = new \alexshadie\telegram\bot\LongPollingBot($bot_name, $bot_key, $logger);


$sigHandler = function ($signo) use ($logger, $bot) {
    $logger->info("Caught signal {$signo}, stopping...");
    $bot->stop();
    return true;
};
pcntl_async_signals(true);
pcntl_signal(SIGTERM, $sigHandler);
pcntl_signal(SIGINT, $sigHandler);

echo $bot->getMe()->toString();

$bot->run();
