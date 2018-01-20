<?php

namespace alexshadie\telegram\objects;

use alexshadie\telegram\objects\Object;

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
}