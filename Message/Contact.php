<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Этот объект представляет контакт с номером телефона.
 * @package telegram
 */
class Contact extends Object
{
    /**
     * Номер телефона
     * @var string
     */
    private $phone_number;
    /**
     * Имя
     * @var string
     */
    private $first_name;
    /**
     * Опционально. Фамилия
     * @var string|null
     */
    private $last_name;
    /**
     * Опционально. Идентификатор пользователя в Telegram
     * @var int|null
     */
    private $user_id;
}