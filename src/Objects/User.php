<?php

namespace alexshadie\TelegramBot\Objects;

/**
 * Class User
 * Этот объект представляет бота или пользователя Telegram
 * @package telegram
 */
class User extends Object
{
    /**
     * Уникальный идентификатор пользователя или бота
     * @var int
     */
    private $id;
    /**
     * Имя бота или пользователя
     * @var string
     */
    private $first_name;
    /**
     * Фамилия бота или пользователя
     * @var string|null
     */
    private $last_name;
    /**
     * Username пользователя или бота
     * @var string|null
     */
    private $username;
    /**
     * @var bool|null
     */
    private $is_bot;

    /**
     * @param $data
     * @return User
     */
    public static function createFromObject($data)
    {
        if (is_null($data)) {
            return null;
        }
        $object = new User();
        $object->id = $data->id ?? null;
        $object->is_bot = $data->is_bot ?? null;
        $object->first_name = $data->first_name ?? null;
        $object->last_name = $data->last_name ?? null;
        $object->username = $data->username ?? null;
        return $object;
    }
}