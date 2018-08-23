<?php

namespace alexshadie\TelegramBot\MessageDispatcher;


use alexshadie\TelegramBot\Query\CallbackQuery;
use alexshadie\TelegramBot\Query\Message;

interface MessageDispatcherInterface
{
    /**
     * Adds message handler
     * @param MessageHandler $handler
     */
    public function addHandler(MessageHandler $handler): void;

    /**
     * @param CallbackQueryHandler $handler
     * @param int $priority
     */
    public function addCallbackQueryHandler(CallbackQueryHandler $handler, int $priority = 100): void;

    /**
     * Dispatches message. Finds and runs suitable handler.
     * @param Message $message
     * @throws \ErrorException
     */
    public function dispatch(Message $message): void;

    /**
     * Dispatches message. Finds and runs suitable handler.
     * @param CallbackQuery $message
     * @throws \ErrorException
     */
    public function dispatchCallbackQuery(CallbackQuery $message): void;
}
