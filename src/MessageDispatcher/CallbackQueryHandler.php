<?php

namespace alexshadie\TelegramBot\MessageDispatcher;

use alexshadie\TelegramBot\Bot\BotApi;
use alexshadie\TelegramBot\Query\CallbackQuery;

interface CallbackQueryHandler extends CommonHandler
{
    public function isSuitable(CallbackQuery $message): bool;

    public function beforeHandle(CallbackQuery $message): void;

    public function handle(CallbackQuery $message, BotApi $botApi): void;
}