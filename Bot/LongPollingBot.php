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

    public function getMe(): User
    {
        return $this->botApi->getMe();
    }

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

    public function handleUpdate(Update $update): bool
    {
        if ($update->getMessage()) {
            $this->messageDispatcher->dispatch($update->getMessage());
            $this->logger->debug("Message received");
//            if ($messageText = $update->getMessage()->getText()) {
//                $this->logger->info("Text message received");
//                $this->logger->info("\033[31mContent: '{$messageText}'\033[0m");
//
//                $this->botApi->message($update->getMessage()->getChat()->getId(), "Hello!");
//            } else {
//                $this->logger->debug("Unsupported message received");
//            }
        } else {
            $this->logger->debug("Unsupported query");
            echo $update;
        }
        return true;
    }

    public function stop(): void
    {
        $this->stop = true;
    }
}
