<?php

namespace alexshadie\telegram\bot;

use alexshadie\telegram\objects\User;
use alexshadie\telegram\query\Update;
use Monolog\Logger;

class LongPollingBot
{
    const TELEGRAM_URL = "https://api.telegram.org";
    /** @var string */
    private $bot_name;
    /** @var string */
    private $bot_key;
    /** @var Logger */
    private $logger;

    /**
     * Id of last received update
     * @var int
     */
    private $last_received_update = null;

    public function __construct($bot_name, $bot_key, Logger $logger = null)
    {
        $this->bot_name = $bot_name;
        $this->bot_key = $bot_key;
        if (is_null($logger)) {
            $this->logger = new Logger(__CLASS__);
        } else {
            $this->logger = $logger;
        }
    }

    /**
     * @return User
     */
    public function getMe() {
        $data = $this->query("getMe");
        $bot = User::createFromObject($data->result);
        return $bot;
    }

    /**
     * @param int|null $offset
     * @param int $limit
     * @param int $timeout
     * @return Update[]|null
     */
    public function getUpdates(?int $offset = null, int $limit = 100, int $timeout = 0) {
        $data = $this->query("getUpdates", ['offset' => $offset, 'limit' => $limit, 'timeout' => $timeout]);
        $updates = Update::createFromObjectList($data->result);
        $this->last_received_update = end($updates)->getUpdateId();
        return $updates;
    }

    /**
     * @param int $limit
     * @param int $timeout
     * @return Update[]|null
     */
    public function getNewUpdates(int $limit = 100, int $timeout = 0) {
        return $this->getUpdates($this->last_received_update, $limit, $timeout);
    }

    protected function query($method_name, array $data = [], $http_method = 'POST') {
        $url = self::TELEGRAM_URL . '/bot' . $this->bot_key . '/' . $method_name;
        $this->logger->debug("Quering {$url}, method: {$http_method}");
        $ch = curl_init($url);
        switch ($http_method) {
            default:
                $this->logger->debug("Params: " . http_build_query($data));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);
        $curl_error = curl_error($ch);

        curl_close ($ch);

        if ($curl_error) {
            throw new \ErrorException("Curl error: " . $curl_error);
        }

        $data = json_decode($server_output);

        if (!isset($data->ok) || !$data->ok) {
            throw new \ErrorException("Telegram response error");
        }

        return $data;
    }
}