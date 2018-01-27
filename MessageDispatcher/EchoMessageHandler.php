<?php

namespace alexshadie\TelegramBot\MessageDispatcher;


use alexshadie\TelegramBot\Bot\BotApi;
use alexshadie\TelegramBot\Bot\LongPollingBotApi;
use alexshadie\TelegramBot\Query\Message;

class EchoMessageHandler implements MessageHandler
{
    /**
     * @var BotApi
     */
    private $bot;

    public function __construct($bot)
    {
        $this->bot = $bot;
    }

    public function isSuitable(Message $message) : bool
    {
        return !is_null($message->getText());
    }

    public function handle(Message $message) : void
    {
        $this->bot->message($message->getChat()->getId(), $message->getText());
    }

    public function isTerminator() : bool {
        return true;
    }

}