<?php

namespace alexshadie\TelegramBot\bot;

use alexshadie\TelegramBot\objects\User;
use alexshadie\TelegramBot\query\Update;

class LongPollingBotApi extends BotApi
{

    /**
     * Id of last received update
     * @var int
     */
    private $last_received_update = null;

    /**
     * @return User
     */
    public function getMe() : User {
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
    public function getUpdates(?int $offset = null, int $limit = 100, int $timeout = 0) : ?array {
        $data = $this->query("getUpdates", ['offset' => $offset, 'limit' => $limit, 'timeout' => $timeout]);
        $updates = Update::createFromObjectList($data->result);
        if (!count($updates)) {
            return [];
        }
        $this->last_received_update = end($updates)->getUpdateId();
        return $updates;
    }

    /**
     * @param int $limit
     * @param int $timeout
     * @return Update[]|null
     */
    public function getNewUpdates(int $limit = 100, int $timeout = 0) : ?array {
        return $this->getUpdates($this->last_received_update + 1, $limit, $timeout);
    }

    protected function query($method_name, array $data = [], $http_method = 'POST') : \stdClass {
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