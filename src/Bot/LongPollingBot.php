<?php

namespace alexshadie\TelegramBot\Bot;

use alexshadie\TelegramBot\Query\UpdateBatch;

class LongPollingBot extends AbstractBot
{
    /** @var int Last received update id */
    private $lastReceivedUpdateId = null;
    /** @var int Limit messages */
    private $limit = 30;
    /** @var int Request timeout */
    private $timeout = 30;
    /** @var bool Stop flag */
    private $stop = false;

    /**
     * @throws \ErrorException
     */
    public function run(): void
    {
        $this->stop = false;
        while (!$this->stop) {
            $updates = $this->getNewUpdates();

            if (count($updates)) {
                foreach ($updates as $update) {
                    $this->handleUpdate($update);
                }
            } else {
                $this->logger && $this->logger->debug("No updates");
                usleep(100000); // sleep for 100 msec
            }
        }
    }

    /**
     * Fetches new updates from Telegram API
     * @return UpdateBatch
     * @throws \ErrorException
     */
    public function getNewUpdates() {
        $batch = $this->botApi->getUpdates($this->lastReceivedUpdateId + 1, $this->limit, $this->timeout);
        $this->lastReceivedUpdateId = $batch->getLastUpdateId();
        return $batch;
    }

    /**
     * Terminates event loop
     */
    public function stop(): void
    {
        $this->logger && $this->logger->debug("Stopping bot");
        $this->stop = true;
    }
}
