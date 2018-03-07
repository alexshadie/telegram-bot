<?php

namespace alexshadie\TelegramBot\Objects;

/**
 * Class Chat
 * Этот объект представляет собой чат.
 * @package telegram
 */
class Chat extends Object
{
    /**
     * Уникальный идентификатор чата. Абсолютное значение не превышает 1e13
     * @var int
     */
    private $id;
    /**
     * Тип чата: “private”, “group”, “supergroup” или “channel”
     * @var string
     */
    private $type;
    /**
     * Опционально. Название, для каналов или групп
     * @var string|null
     */
    private $title;
    /**
     * Опционально. Username, для чатов и некоторых каналов
     * @var string|null
     */
    private $username;
    /**
     * Опционально. Имя собеседника в чате
     * @var string|null
     */
    private $first_name;
    /**
     * Опционально. Фамилия собеседника в чате
     * @var string|null
     */
    private $last_name;
    /**
     * Опционально.True, если все участники чата являются администраторами
     * @var bool|null
     */
    private $all_members_are_administrators;

    /**
     * @param \stdClass $data
     * @return Chat|null
     */
    public static function createFromObject(\stdClass $data)
    {
        if (is_null($data)) {
            return null;
        }

        $chat = new Chat();

        $chat->id = $data->id;
        $chat->type = $data->type;
        $chat->title = $data->title ?? null;
        $chat->username = $data->username ?? null;
        $chat->first_name = $data->first_name ?? null;
        $chat->last_name = $data->last_name ?? null;
        $chat->all_members_are_administrators = $data->all_members_are_administrators ?? null;

        return $chat;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return null|string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return null|string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return null|string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return bool|null
     */
    public function getAllMembersAreAdministrators()
    {
        return $this->all_members_are_administrators;
    }

}