<?php

namespace alexshadie\TelegramBot\Bot;

use alexshadie\TelegramBot\MessageDispatcher\MessageDispatcherInterface;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Query\Update;
use Psr\Log\LoggerInterface;

class LongPollingBot
{
    /**
     * @var LongPollingBotApi
     */
    private $botApi;
    /**
     * @var bool
     */
    private $stop;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var MessageDispatcherInterface
     */
    private $messageDispatcher;

    /**
     * LongPollingBot constructor.
     * @param LongPollingBotApi $botApi
     * @param MessageDispatcherInterface $messageDispatcher
     * @param LoggerInterface $logger
     */
    public function __construct(
        LongPollingBotApi $botApi,
        MessageDispatcherInterface $messageDispatcher,
        LoggerInterface $logger
    )
    {
        $this->botApi = $botApi;
        $this->messageDispatcher = $messageDispatcher;
        $this->logger = $logger;
    }

    /**
     * @return User
     * @throws \ErrorException
     */
    public function getMe(): User
    {
        return $this->botApi->getMe();
    }

    /**
     * @throws \ErrorException
     */
    public function run(): void
    {
        $this->stop = false;
        while (!$this->stop) {
            $updates = $this->botApi->getNewUpdates();

            if (count($updates)) {
                foreach ($updates as $update) {
                    $this->handleUpdate($update);
                }
            } else {
                $this->logger->debug("No updates");
                usleep(100000); // sleep for 100 msec
            }
        }
    }

    /**
     * @param Update $update
     * @return bool
     */
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

    /**
     *
     */
    public function stop(): void
    {
        $this->stop = true;
    }
}
