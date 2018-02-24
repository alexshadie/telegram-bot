<?php

namespace alexshadie\TelegramBot\Bot;

class WebHookBot extends AbstractBot
{
    /** @var string  */
    private $endpoint;
    /** @var string */
    private $certificateFile;

    public function __construct(
        string $endpoint,
        string $certificateFile
    )
    {
        $this->endpoint = $endpoint;
        $this->certificateFile = $certificateFile;
    }

    /**
     * @return bool
     * @throws \ErrorException
     * @throws Exception\TelegramResponseException
     */
    public function register() {
        return $this->botApi->registerWebHook($this->endpoint, $this->certificateFile);
    }

    /**
     * @return bool
     * @throws \ErrorException
     * @throws Exception\TelegramResponseException
     */
    public function unregister() {
        return $this->botApi->dropWebHook();
    }
}
