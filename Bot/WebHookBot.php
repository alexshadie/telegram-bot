<?php

namespace alexshadie\TelegramBot\Bot;

use alexshadie\TelegramBot\MessageDispatcher\MessageDispatcherInterface;
use alexshadie\TelegramBot\Query\Update;
use Psr\Log\LoggerInterface;

class WebHookBot
{
    /**
     * @var WebhookBotApi
     */
    private $botApi;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var MessageDispatcherInterface
     */
    private $messageDispatcher;

    public function __construct(
        WebHookBotApi $botApi,
        MessageDispatcherInterface $messageDispatcher,
        LoggerInterface $logger
    )
    {
        $this->botApi = $botApi;
        $this->messageDispatcher = $messageDispatcher;
        $this->logger = $logger;
    }

    public function handleUpdate(Update $update): bool
    {
        if ($update->getMessage()) {
            $this->messageDispatcher->dispatch($update->getMessage());
            $this->logger->debug("Message received");
        } else {
            $this->logger->debug("Unsupported query");
            echo $update;
        }
        return true;
    }
}
