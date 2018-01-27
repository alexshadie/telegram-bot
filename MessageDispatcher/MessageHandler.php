<?php

namespace alexshadie\TelegramBot\MessageDispatcher;

use alexshadie\TelegramBot\Query\Message;

interface MessageHandler
{
    public function isSuitable(Message $message) : bool;
    public function handle(Message $message) : void;
    public function isTerminator() : bool;
}