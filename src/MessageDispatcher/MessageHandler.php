<?php

namespace alexshadie\TelegramBot\MessageDispatcher;

use alexshadie\TelegramBot\Bot\BotApi;
use alexshadie\TelegramBot\Query\Message;

interface MessageHandler extends CommonHandler
{
    public function isSuitable(Message $message): bool;

    public function beforeHandle(Message $message): void;

    public function handle(Message $message, BotApi $botApi): void;

    public function afterHandle(Message $message, BotApi $botApi): void;
}
