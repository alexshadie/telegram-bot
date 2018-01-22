<?php

namespace alexshadie\telegram\bot;

use Monolog\Logger;

class BotApi
{
    const TELEGRAM_URL = "https://api.telegram.org";
    /** @var string */
    protected $bot_name;
    /** @var string */
    protected $bot_key;
    /** @var Logger */
    protected $logger;

    public function __construct(string $bot_name, string $bot_key, Logger $logger = null)
    {
        $this->bot_name = $bot_name;
        $this->bot_key = $bot_key;
        if (is_null($logger)) {
            $this->logger = new Logger(__CLASS__);
        } else {
            $this->logger = $logger;
        }
    }

}