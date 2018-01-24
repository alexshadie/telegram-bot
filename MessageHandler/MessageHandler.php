<?php

namespace alexshadie\TelegramBot\MessageHandler;

abstract class MessageHandler
{
    private $command;

    public function __construct($command)
    {
        $this->command = $command;
    }

    public function getCommand() {
        return $this->command;
    }

    abstract public function handle($payload);
}