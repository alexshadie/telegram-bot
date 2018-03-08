<?php

namespace alexshadie\TelegramBot\Bot;

class WebHookBot extends AbstractBot
{
    /** @var string */
    private $endpoint;
    /** @var string */
    private $certificateFile;

    /**
     * WebHookBot constructor.
     *
     * @param string $endpoint
     * @param string $certificateFile
     */
    public function __construct(
        string $endpoint,
        string $certificateFile
    )
    {
        $this->endpoint = $endpoint;
        $this->certificateFile = $certificateFile;
    }

    /**
     * Registers webhook
     *
     * @return bool
     * @throws \ErrorException
     * @throws Exception\TelegramResponseException
     */
    public function register()
    {
        return $this->botApi->registerWebHook($this->endpoint, $this->certificateFile);
    }

    /**
     * Unregisters webhook
     *
     * @return bool
     * @throws \ErrorException
     * @throws Exception\TelegramResponseException
     */
    public function unregister()
    {
        return $this->botApi->dropWebHook();
    }
}
