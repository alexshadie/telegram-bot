<?php


namespace alexshadie\TelegramBot\Bot;


use alexshadie\TelegramBot\MessageDispatcher\MessageDispatcherInterface;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Query\Message;
use alexshadie\TelegramBot\Query\Update;
use Psr\Log\LoggerInterface;

abstract class AbstractBot implements BotInterface
{
    /**
     * @var BotApi
     */
    protected $botApi;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var MessageDispatcherInterface
     */
    protected $messageDispatcher;

    /**
     * @param BotApi $botApi
     * @return AbstractBot
     */
    public function setBotApi(BotApi $botApi): AbstractBot
    {
        $this->botApi = $botApi;
        return $this;
    }

    /**
     * @param LoggerInterface $logger
     * @return AbstractBot
     */
    public function setLogger(LoggerInterface $logger): AbstractBot
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @param MessageDispatcherInterface $messageDispatcher
     * @return AbstractBot
     */
    public function setMessageDispatcher(MessageDispatcherInterface $messageDispatcher): AbstractBot
    {
        $this->messageDispatcher = $messageDispatcher;
        return $this;
    }

    /**
     * Update handler
     * @param Update $update
     * @return bool
     * @throws \ErrorException
     */
    public function handleUpdate(Update $update): bool
    {
        if ($update->getMessage()) {
            $this->messageDispatcher->dispatch($update->getMessage());
            $this->logger->debug("Message received");
        } else {
            $this->logger->debug("Unsupported query");
            echo $update;
        }
        return true;
    }

    /**
     * Gets information about bot
     * @return User
     * @throws \ErrorException
     * @throws Exception\TelegramResponseException
     */
    public function me(): User
    {
        return $this->botApi->getMe();
    }

    /**
     * Send message to specified chat
     *
     * @param int|string $chatId
     * @param string $message
     * @return Message
     * @throws \ErrorException
     * @throws Exception\TelegramResponseException
     */
    public function say($chatId, string $message): Message
    {
        return $this->botApi->message($chatId, $message);
    }
}