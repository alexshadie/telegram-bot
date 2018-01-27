<?php

namespace alexshadie\TelegramBot\Keyboard;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Class InlineKeyboardMarkup
 * Этот объект представляет встроенную клавиатуру, которая появляется под соответствующим сообщением.
 * @package telegram
 */
class InlineKeyboardMarkup extends Object
{
    /**
     * Массив строк, каждая из которых является массивом объектов InlineKeyboardButton.
     * @var InlineKeyboardButton[][]
     */
    private $inline_keyboard;
}