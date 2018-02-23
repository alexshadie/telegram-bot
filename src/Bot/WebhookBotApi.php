<?php

namespace alexshadie\TelegramBot\Bot;


use alexshadie\TelegramBot\Objects\InputFile;
use Psr\Log\LoggerInterface;

class WebhookBotApi extends BotApi
{
    /** @var string */
    private $endpoint;

    public function __construct(string $bot_name, string $bot_key, string $endpoint, LoggerInterface $logger = null)
    {
        $this->endpoint = $endpoint;
        parent::__construct($bot_name, $bot_key, $logger);
    }

    /**
     * Registers webhook
     * @return bool
     * @throws \ErrorException
     */
    public function registerWebHook(): bool {
        $certificateFile = new InputFile(realpath(__DIR__ . "/../cert/cert.pem"));

        $data = $this->query(
            "setWebhook",
            [
                'url' => $this->endpoint,
                'certificate' => $certificateFile
            ]
        );

        $this->logger->debug("Webhook set with message '" . ($data->description ?? '') . "'");
        return $data->result;
    }

    /**
     * Unregisters webhook
     * @return bool
     * @throws \ErrorException
     */
    public function dropWebHook(): bool {
        $data = $this->query(
            "setWebhook",
            [
                'url' => '',
            ]
        );

        $this->logger->debug("Webhook unset with message '" . ($data->description ?? '') . "'");
        return $data->result;
    }
}