<?php

namespace alexshadie\TelegramBot\MessageDispatcher;


use alexshadie\TelegramBot\Bot\BotApi;
use alexshadie\TelegramBot\Query\Message;

class MessageDispatcher implements MessageDispatcherInterface
{
    /**
     * @var MessageHandler[][]
     */
    private $handlers = [];

    /** @var BotApi */
    private $botApi;

    public function __construct(BotApi $botApi)
    {
        $this->botApi = $botApi;
    }

    public function addHandler(MessageHandler $handler, int $priority = 100) : void {
        if (!isset($this->handlers[$priority])) {
            $this->handlers[$priority] = [];
        }
        $this->handlers[$priority][] = $handler;
    }

    public function dispatch(Message $message) : void {
        foreach ($this->handlers as $handlerList) {
            foreach ($handlerList as $handler) {
                if ($handler->isSuitable($message)) {
                    $handler->handle($message, $this->botApi);
                    if ($handler->isTerminator()) {
                        return;
                    }
                }
            }
        }
    }
}