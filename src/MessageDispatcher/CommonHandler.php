<?php


namespace alexshadie\TelegramBot\MessageDispatcher;


interface CommonHandler
{
    public function isTerminator(): bool;
}