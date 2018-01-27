<?php

namespace alexshadie\TelegramBot\Keyboard;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Class InlineKeyboardButton
 * Этот объект представляет одну кнопку встроенной клавиатуры. Вы обязательно должны задействовать ровно одно опциональное поле.
 * @package telegram
 */
class InlineKeyboardButton extends Object
{
    /**
     * Текст на кнопке
     * @var string
     */
    private $text;
    /**
     * Опционально. URL, который откроется при нажатии на кнопку
     * @var string|null
     */
    private $url;
    /**
     * Опционально. Данные, которые будут отправлены в callback_query при нажатии на кнопку
     * @var string|null
     */
    private $callback_data;
    /**
     * Опционально. Если этот параметр задан, то при нажатии на кнопку приложение предложит пользователю выбрать
     * любой чат, откроет его и вставит в поле ввода сообщения юзернейм бота и определённый запрос для встроенного
     * режима. Если отправлять пустое поле, то будет вставлен только юзернейм бота.
     *
     * Примечание: это нужно для того, чтобы быстро переключаться между диалогом с ботом и встроенным режимом с этим же
     * ботом. Особенно полезно в сочетаниями с действиями switch_pm… – в этом случае пользователь вернётся в исходный
     * чат автоматически, без ручного выбора из списка.
     *
     * @var string|null
     */
    private $switch_inline_query;


    /**
     * Опционально. If set, pressing the button will insert the bot‘s username and the specified inline query in the
     * current chat's input field. Can be empty, in which case only the bot’s username will be inserted.
     *
     * @var string|null
     */
    private $switch_inline_query_current_chat;

    /**
     * Опционально. Description of the game that will be launched when the user presses the button.
     * NOTE: This type of button must always be the first button in the first row.
     *
     * @var CallbackGame|null
     */
    private $callback_game;
}