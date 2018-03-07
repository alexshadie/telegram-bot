<?php

namespace alexshadie\TelegramBot\Bot;

use alexshadie\TelegramBot\Bot\Exception\TelegramResponseException;
use alexshadie\TelegramBot\Message\File;
use alexshadie\TelegramBot\Objects\InputFile;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Query\Message;
use alexshadie\TelegramBot\Query\Update;
use alexshadie\TelegramBot\Query\UpdateBatch;
use Psr\Log\LoggerInterface;

class BotApi implements BotApiInterface
{
    /** @var string */
    protected $bot_name;
    /** @var string */
    protected $bot_key;
    /** @var LoggerInterface */
    protected $logger;

    /**
     * BotApi constructor.
     * @param string $bot_name
     * @param string $bot_key
     * @param LoggerInterface|null $logger
     */
    public function __construct(string $bot_name, string $bot_key, LoggerInterface $logger = null)
    {
        $this->bot_name = $bot_name;
        $this->bot_key = $bot_key;
        $this->logger = $logger;
    }

    /**
     * Sends message to Telegram
     *
     * @param int|string $chat_id
     * @param string $text
     * @return Message
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function message($chat_id, string $text): Message
    {
        $params = [
            'chat_id' => $chat_id,
            'text' => $text,
        ];

        $data = $this->query("sendMessage", $params);
        $message = Message::createFromObject($data->result);
        return $message;
    }

    /**
     * Sends query to server
     *
     * @param $method_name
     * @param array $data
     * @param string $http_method
     * @return mixed
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    protected function query($method_name, array $data = [], $http_method = 'POST')
    {
        $url = self::TELEGRAM_URL . '/bot' . $this->bot_key . '/' . $method_name;
        $this->logger && $this->logger->debug("Quering {$url}, method: {$http_method}");
        $ch = curl_init($url);

        switch ($http_method) {
            case 'POST':
                foreach ($data as $key => $item) {
                    if ($item instanceof InputFile) {
                        $data[$key] = $item->getPostObject();
                    }
                }
                $this->logger && $this->logger->debug("Params: " . http_build_query($data));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                $this->logger && $this->logger->debug("Params: " . http_build_query($data));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        $curl_error = curl_error($ch);

        curl_close($ch);

        if ($curl_error) {
            throw new \ErrorException("Curl error: " . $curl_error);
        }

        $data = json_decode($server_output);

        if (!isset($data->ok) || !$data->ok) {
            throw new TelegramResponseException(
                $data->description ?? "",
                $data->error_code ?? 0,
                $data
            );
        }

        return $data;
    }

    /**
     * Gets Bot information
     *
     * @return User
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function getMe(): User
    {
        $data = $this->query("getMe");
        $bot = User::createFromObject($data->result);
        return $bot;
    }

    /**
     * Gets file info
     * TODO: Check for invalid file
     *
     * @param string $fileId
     * @return File
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function getFile(string $fileId): File
    {
        $params = [
            'file_id' => $fileId,
        ];
        $data = $this->query("getFile", $params);
        $file = File::createFromObject($data->result);
        return $file;
    }

    /**
     * Downloads file
     * TODO: Check for invalid file
     *
     * @param File $file
     * @param string $tmpPath
     */
    public function downloadFile(File $file, string $tmpPath): void
    {
        file_put_contents($tmpPath, fopen(self::TELEGRAM_URL . '/file/bot' . $this->bot_key . '/' . $file->getFilePath(), 'r'));
    }

    /**
     * Registers webhook
     *
     * @param string $endpoint
     * @param string $certFile
     * @return bool
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function registerWebHook(string $endpoint, string $certFile): bool
    {
        $certificateFile = new InputFile(realpath($certFile));

        $data = $this->query(
            "setWebhook",
            [
                'url' => $endpoint,
                'certificate' => $certificateFile
            ]
        );

        $this->logger && $this->logger->info("Webhook set with message '" . ($data->description ?? '') . "'");
        return $data->result;
    }

    /**
     * Unregisters webhook
     *
     * @return bool
     * @throws \ErrorException
     * @throws TelegramResponseException
     */
    public function dropWebHook(): bool
    {
        $data = $this->query(
            "setWebhook",
            [
                'url' => '',
            ]
        );

        $this->logger && $this->logger->info("Webhook unset with message '" . ($data->description ?? '') . "'");
        return $data->result;
    }

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
    public function getUpdates(?int $offset = null, int $limit = 100, int $timeout = 0): UpdateBatch
    {
        $data = $this->query("getUpdates", ['offset' => $offset, 'limit' => $limit, 'timeout' => $timeout]);
        $updates = Update::createFromObjectList($data->result);
        if (!count($updates)) {
            return new UpdateBatch([]);
        }
        return new UpdateBatch($updates);
    }
}