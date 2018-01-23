<?php

namespace alexshadie\TelegramBot\bot;

use alexshadie\TelegramBot\objects\User;
use alexshadie\TelegramBot\query\Update;
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

    public function __construct(string $bot_name, string $bot_key, LoggerInterface $logger)
    {
        $this->botApi = new LongPollingBotApi($bot_name, $bot_key, $this->logger = $logger);
    }

    public function getMe() : User
    {
        return $this->botApi->getMe();
    }

    public function run() : void
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

    public function stop() : void
    {
        $this->stop = true;
    }

    public function handleUpdate(Update $update) : bool
    {
        if ($update->getMessage()) {
            $this->logger->debug("Message received");
            if ($messageText = $update->getMessage()->getText()) {
                $this->logger->info("Text message received");
                $this->logger->info("\033[31mContent: '{$messageText}'\033[0m");
            } else {
                $this->logger->debug("Unsupported message received");
            }
        } else {
            $this->logger->debug("Unsupported query");
            echo $update;
        }
        return true;
    }
}
