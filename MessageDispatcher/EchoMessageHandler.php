<?php

namespace alexshadie\TelegramBot\MessageDispatcher;


use alexshadie\TelegramBot\Bot\BotApi;
use alexshadie\TelegramBot\Query\Message;

class EchoMessageHandler implements MessageHandler
{
    public function isSuitable(Message $message) : bool
    {
        return !is_null($message->getText());
    }

    public function handle(Message $message, BotApi $botApi) : void
    {
        $botApi->message($message->getChat()->getId(), $message->getText());
    }

    public function isTerminator() : bool {
        return true;
    }

}