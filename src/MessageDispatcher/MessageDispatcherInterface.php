<?php

namespace alexshadie\TelegramBot\MessageDispatcher;


use alexshadie\TelegramBot\Query\Message;

interface MessageDispatcherInterface
{
    public function addHandler(MessageHandler $handler): void;

    public function dispatch(Message $message): void;
}