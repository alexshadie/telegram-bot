<?php

namespace alexshadie\TelegramBot\Bot;

use alexshadie\TelegramBot\Message\File;
use alexshadie\TelegramBot\Objects\InputFile;
use alexshadie\TelegramBot\Query\Message;
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

    /**
     * @param int|string $chat_id
     * @param string $text
     * @return Message
     * @throws \ErrorException
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
     * @param $method_name
     * @param array $data
     * @param string $http_method
     * @return \stdClass
     * @throws \ErrorException
     */
    protected function query($method_name, array $data = [], $http_method = 'POST'): \stdClass
    {
        $url = self::TELEGRAM_URL . '/bot' . $this->bot_key . '/' . $method_name;
        $this->logger->debug("Quering {$url}, method: {$http_method}");
        $ch = curl_init($url);

        switch ($http_method) {
            case 'POST':
                foreach ($data as $key => $item) {
                    if ($item instanceof InputFile) {
                        $data[$key] = $item->getPostObject();
                    }
                }
                $this->logger->debug("Params: " . http_build_query($data));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                $this->logger->debug("Params: " . http_build_query($data));
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
            var_export($data);
            throw new \ErrorException("Telegram response error");
        }

        return $data;
    }

    /**
     * TODO: Check for invalid file
     * @param string $fileId
     * @return File
     * @throws \ErrorException
     */
    public function getFile(string $fileId) : File
    {
        $params = [
            'file_id' => $fileId,
        ];
        $data = $this->query("getFile", $params);
        $file = File::createFromObject($data->result);
        return $file;
    }

    /**
     * TODO: Check for invalid file
     * @param File $file
     * @param string $tmpPath
     */
    public function downloadFile(File $file, string $tmpPath): void
    {
        file_put_contents($tmpPath, fopen(self::TELEGRAM_URL . '/file/bot' . $this->bot_key . '/' . $file->getFilePath(), 'r'));
    }
}