<?php

namespace alexshadie\TelegramBot\MessageDispatcher;


use alexshadie\TelegramBot\Bot\BotApi;
use alexshadie\TelegramBot\Query\CallbackQuery;
use alexshadie\TelegramBot\Query\Message;

class MessageDispatcher implements MessageDispatcherInterface
{
    /**
     * @var MessageHandler[][]
     */
    private $handlers = [];

    /**
     * @var CallbackQueryHandler[][]
     */
    private $callbackQueryHandlers = [];

    /** @var BotApi */
    private $botApi;

    public function __construct(BotApi $botApi)
    {
        $this->botApi = $botApi;
    }

    protected function setupHandler(CommonHandler $handler): void
    {
        // Perform setup operations for each handler, e.g. dependency injections and so on
    }

    protected function beforeDispatch($message): void
    {
        // Performs pre-dispatch initialization
    }

    public function addHandler(MessageHandler $handler, int $priority = 100): void
    {
        if (!isset($this->handlers[$priority])) {
            $this->handlers[$priority] = [];
            ksort($this->handlers);
        }
        $this->setupHandler($handler);
        $this->handlers[$priority][] = $handler;
    }

    public function addCallbackQueryHandler(CallbackQueryHandler $handler, int $priority = 100): void
    {
        if (!isset($this->callbackQueryHandlers[$priority])) {
            $this->callbackQueryHandlers[$priority] = [];
            ksort($this->callbackQueryHandlers);
        }
        $this->setupHandler($handler);
        $this->callbackQueryHandlers[$priority][] = $handler;
    }

    public function dispatch(Message $message): void
    {
        $this->beforeDispatch($message);
        foreach ($this->handlers as $handlerList) {
            foreach ($handlerList as $handler) {
                if ($handler->isSuitable($message)) {
                    $handler->beforeHandle($message);
                    $handler->handle($message, $this->botApi);
                    $handler->afterHandle($message, $this->botApi);
                    if ($handler->isTerminator()) {
                        return;
                    }
                }
            }
        }
    }

    public function dispatchCallbackQuery(CallbackQuery $message): void
    {
        $this->beforeDispatch($message);
        foreach ($this->callbackQueryHandlers as $handlerList) {
            foreach ($handlerList as $handler) {
                if ($handler->isSuitable($message)) {
                    $handler->beforeHandle($message);
                    $handler->handle($message, $this->botApi);
                    $handler->afterHandle($message, $this->botApi);
                    if ($handler->isTerminator()) {
                        return;
                    }
                }
            }
        }
    }
}