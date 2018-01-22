<?php

namespace alexshadie\telegram\bot;

use alexshadie\telegram\objects\User;
use alexshadie\telegram\query\Update;
use Monolog\Logger;

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
     * @var Logger
     */
    private $logger;

    public function __construct(string $bot_name, string $bot_key, Logger $logger)
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
        echo $update;
        return true;
    }
}
