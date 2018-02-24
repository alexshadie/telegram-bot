<?php

namespace alexshadie\TelegramBot\MessageDispatcher;


use alexshadie\TelegramBot\Query\Message;

interface MessageDispatcherInterface
{
    /**
     * Adds message handler
     * @param MessageHandler $handler
     */
    public function addHandler(MessageHandler $handler): void;

    /**
     * Dispatches message. Finds and runs suitable handler.
     * @param Message $message
     * @throws \ErrorException
     */
    public function dispatch(Message $message): void;
}
