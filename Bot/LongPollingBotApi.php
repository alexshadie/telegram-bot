<?php

namespace alexshadie\TelegramBot\Bot;

use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Query\Update;

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
}