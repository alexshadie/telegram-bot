<?php


namespace alexshadie\TelegramBot\Bot;


use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Query\Update;

interface BotInterface
{
    /**
     * Gets information about bot
     * @return User
     * @throws \ErrorException
     */
    public function me(): User;

    /**
     * Update handler
     * @param Update $update
     * @return bool
     * @throws \ErrorException
     */
    public function handleUpdate(Update $update): bool;
}