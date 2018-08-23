<?php


namespace alexshadie\TelegramBot\Bot;


use alexshadie\TelegramBot\Bot\Exception\BotException;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;
use alexshadie\TelegramBot\MessageDispatcher\MessageDispatcherInterface;
use alexshadie\TelegramBot\Objects\ReplyMarkup;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Query\Message;
use alexshadie\TelegramBot\Query\Update;
use Psr\Log\LoggerInterface;

/**
 * Common bot API interactions
 * @package alexshadie\TelegramBot\Bot
 */
abstract class AbstractBot implements BotInterface
{
    /**
     * Maximum length of message
     */
    const MAX_MESSAGE_LENGTH = 4096;

    /**
     * Bot API
     * @var BotApiInterface
     */
    protected $botApi;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Message Dispatcher
     * @var MessageDispatcherInterface
     */
    protected $messageDispatcher;

    /**
     * Sets Bot Api
     *
     * @param BotApiInterface $botApi
     * @return AbstractBot
     */
    public function setBotApi(BotApiInterface $botApi): AbstractBot
    {
        $this->botApi = $botApi;
        return $this;
    }

    /**
     * Sets logger
     *
     * @param LoggerInterface $logger
     * @return AbstractBot
     */
    public function setLogger(LoggerInterface $logger): AbstractBot
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * Sets message dispatcher
     *
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
     *
     * @param Update $update
     * @return bool
     * @throws BotException
     * @throws \ErrorException
     */
    public function handleUpdate(Update $update): bool
    {
        if (is_null($this->messageDispatcher) || is_null($this->botApi)) {
            throw new BotException("Invalid bot configuration");
        }
        if ($update->getMessage()) {
            $this->messageDispatcher->dispatch($update->getMessage());
            $this->logger && $this->logger->debug("Message received");
        } elseif ($update->getCallbackQuery()) {
            $this->messageDispatcher->dispatchCallbackQuery($update->getCallbackQuery());
            $this->logger->debug('callback query');
        } else {
            $this->logger->debug(var_export($update, 1));
            $this->logger && $this->logger->debug("Unsupported query");
            return false;
        }
        return true;
    }

    /**
     * Gets information about bot
     *
     * @return User
     * @throws \ErrorException
     * @throws Exception\TelegramResponseException
     * @throws BotException
     */
    public function me(): User
    {
        if (is_null($this->botApi)) {
            throw new BotException("Invalid bot configuration");
        }
        return $this->botApi->getMe();
    }

    /**
     * Send message to specified chat
     * TODO: Long messages split
     *
     * @param int|string $chatId
     * @param string $message
     * @return Message
     * @throws \ErrorException
     * @throws Exception\TelegramResponseException
     * @throws Exception\BotException
     */
    public function say($chatId, string $message): Message
    {
        if (is_null($this->botApi)) {
            throw new BotException("Invalid bot configuration");
        }
        return $this->botApi->sendMessage($chatId, $message);
    }

    public function sayWithMarkup($chatId, string $message, ReplyMarkup $keyboardMarkup) {
        if (is_null($this->botApi)) {
            throw new BotException("Invalid bot configuration");
        }

        return $this->botApi->sendMessage(
            $chatId,
            $message,
            null,
            null,
            null,
            null,
            $keyboardMarkup
        );
    }
}