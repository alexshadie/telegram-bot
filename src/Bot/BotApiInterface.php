<?php


namespace alexshadie\TelegramBot\Bot;


use alexshadie\TelegramBot\Bot\Exception\TelegramResponseException;
use alexshadie\TelegramBot\Message\File;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Query\Message;
use alexshadie\TelegramBot\Query\UpdateBatch;

interface BotApiInterface
{
    /** Telegram API url */
    const TELEGRAM_URL = "https://api.telegram.org";

    /**
     * Sends message to Telegram
     *
     * @param int|string $chat_id
     * @param string $text
     * @return Message
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function message($chat_id, string $text): Message;

    /**
     * Gets Bot information
     *
     * @return User
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function getMe(): User;

    /**
     * Gets file info
     * TODO: Check for invalid file
     *
     * @param string $fileId
     * @return File
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function getFile(string $fileId): File;

    /**
     * Downloads file
     * TODO: Check for invalid file
     *
     * @param File $file
     * @param string $tmpPath
     */
    public function downloadFile(File $file, string $tmpPath): void;

    /**
     * Registers webhook
     *
     * @param string $endpoint
     * @param string $certFile
     * @return bool
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function registerWebHook(string $endpoint, string $certFile): bool;

    /**
     * Unregisters webhook
     *
     * @return bool
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function dropWebHook(): bool;

    /**
     * Gets updates
     * TODO: check webhooks
     *
     * @param int|null $offset
     * @param int $limit
     * @param int $timeout
     * @return UpdateBatch
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function getUpdates(?int $offset = null, int $limit = 100, int $timeout = 0): UpdateBatch;
}