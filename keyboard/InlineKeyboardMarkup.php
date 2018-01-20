<?php

namespace alexshadie\telegram\keyboard;

use alexshadie\telegram\objects\Object;

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