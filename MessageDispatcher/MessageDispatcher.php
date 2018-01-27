<?php

namespace alexshadie\TelegramBot\MessageDispatcher;


use alexshadie\TelegramBot\MessageDispatcher\MessageHandler;
use alexshadie\TelegramBot\Query\Message;

class MessageDispatcher implements MessageDispatcherInterface
{
    /**
     * @var MessageHandler[]
     */
    private $handlers = [];

    public function addHandler(MessageHandler $handler) : void {
        $this->handlers[] = $handler;
    }

    public function dispatch(Message $message) : void {
        foreach ($this->handlers as $handler) {
            if ($handler->isSuitable($message)) {
                $handler->handle($message);
                if ($handler->isTerminator()) {
                    return;
                }
            }
        }
    }
}