<?php

namespace alexshadie\TelegramBot\MessageDispatcher;


use alexshadie\TelegramBot\Bot\BotApi;
use alexshadie\TelegramBot\Query\Message;

class EchoMessageHandler implements MessageHandler
{
    public function isSuitable(Message $message): bool
    {
        return !is_null($message->getText());
    }

    public function beforeHandle(Message $message): void
    {

    }

    public function handle(Message $message, BotApi $botApi): void
    {
        $botApi->sendMessage($message->getChat()->getId(), $message->getText());
    }

    public function isTerminator(): bool
    {
        return true;
    }

    public function afterHandle(Message $message, BotApi $botApi): void
    {
        return;
    }

}