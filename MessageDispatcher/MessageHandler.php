<?php

namespace alexshadie\TelegramBot\MessageDispatcher;

use alexshadie\TelegramBot\Bot\BotApi;
use alexshadie\TelegramBot\Query\Message;

interface MessageHandler
{
    public function isSuitable(Message $message) : bool;
    public function handle(Message $message, BotApi $botApi) : void;
    public function isTerminator() : bool;
}