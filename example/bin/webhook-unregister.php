<?php
error_reporting(E_ALL);

require __DIR__ . '/../../vendor/autoload.php';

$config = require __DIR__ . '/../auth.php';
list($name, $token, $endpoint) = $config;

$logger = new \Monolog\Logger("telegram-bot");

$webHookBot = new \alexshadie\TelegramBot\Bot\WebhookBotApi($name, $token, $endpoint, $logger);
$webHookBot->dropWebHook();