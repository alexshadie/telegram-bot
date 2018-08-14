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
     * Runs event loop
     *
     * @throws \ErrorException
     * @throws Exception\TelegramResponseException
     * @throws Exception\BotException
     */
    public function run(): void
    {
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
        $this->stop = false;
    }

    /**
     * Fetches new updates from Telegram API
     *
     * @return UpdateBatch
     * @throws \ErrorException
     * @throws Exception\TelegramResponseException
     */
    public function getNewUpdates(): UpdateBatch
    {
        $batch = $this->botApi->getUpdates($this->lastReceivedUpdateId ? $this->lastReceivedUpdateId + 1 : null, $this->limit, $this->timeout);
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
