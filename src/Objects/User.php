<?php

namespace alexshadie\TelegramBot\Objects;

/**
 * This object represents a Telegram user or bot.
 * @package TelegramBot
 */
class User extends Object
{
    /**
     * Unique identifier for this user or bot
     * @var int
     */
    private $id;
    /**
     * True, if this user is a bot
     * @var bool
     */
    private $is_bot;
    /**
     * User‘s or bot’s first name
     * @var string
     */
    private $first_name;
    /**
     * User‘s or bot’s last name
     * @var string|null
     */
    private $last_name;
    /**
     * User‘s or bot’s username
     * @var string|null
     */
    private $username;
    /**
     * IETF language tag of the user's language.
     * @see https://en.wikipedia.org/wiki/IETF_language_tag
     * @var string|null
     */
    private $language_code;

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
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return null|string
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @return null|string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return bool
     */
    public function isBot(): bool
    {
        return $this->is_bot;
    }

    /**
     * @return string|null
     */
    public function getLanguageCode(): ?string
    {
        return $this->language_code;
    }

    /**
     * @param \stdClass $data
     * @return User
     */
    public static function createFromObject(\stdClass $data)
    {
        if (is_null($data)) {
            return null;
        }
        $object = new User();
        $object->id = $data->id;
        $object->is_bot = $data->is_bot;
        $object->first_name = $data->first_name;
        $object->last_name = $data->last_name ?? null;
        $object->username = $data->username ?? null;
        $object->language_code = $data->language_code ?? null;
        return $object;
    }
}