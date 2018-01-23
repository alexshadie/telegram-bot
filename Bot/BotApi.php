<?php

namespace alexshadie\TelegramBot\bot;

use Psr\Log\LoggerInterface;

class BotApi
{
    const TELEGRAM_URL = "https://api.telegram.org";
    /** @var string */
    protected $bot_name;
    /** @var string */
    protected $bot_key;
    /** @var LoggerInterface */
    protected $logger;

    public function __construct(string $bot_name, string $bot_key, LoggerInterface $logger = null)
    {
        $this->bot_name = $bot_name;
        $this->bot_key = $bot_key;
        $this->logger = $logger;
    }

}