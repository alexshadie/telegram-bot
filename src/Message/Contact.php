<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents a phone contact.
 *
 */
class Contact extends Object
{
    /**
     * Contact's phone number
     *
     * @var string
     */
    private $phone_number;

    /**
     * Contact's first name
     *
     * @var string
     */
    private $first_name;

    /**
     * Contact's last name
     *
     * @var string|null
     */
    private $last_name;

    /**
     * Contact's user identifier in Telegram
     *
     * @var int|null
     */
    private $user_id;

    /**
     * Contact constructor.
     *
     * @param string $phoneNumber
     * @param string $firstName
     * @param string|null $lastName
     * @param int|null $userId
     */
    public function __construct(string $phoneNumber, string $firstName, ?string $lastName = null, ?int $userId = null)
    {
        $this->phone_number = $phoneNumber;
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->user_id = $userId;
    }

    /**
     * Contact's phone number
     *
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * Contact's first name
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * Contact's last name
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * Contact's user identifier in Telegram
     *
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
      * Creates Contact object from data.
      * @param \stdClass $data
      * @return Contact
      */
    public static function createFromObject(?\stdClass $data): ?Contact
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Contact(
            $data->phone_number,
            $data->first_name
        );

        $object->last_name = $data->last_name ?? null;
        $object->user_id = $data->user_id ?? null;

        return $object;
    }

    /**
      * Creates array of Contact objects from data.
      * @param array $data
      * @return Contact[]
      */
    public static function createFromObjectList(?array $data): ?array
    {
        if (is_null($data)) {
            return null;
        };
        $objects = [];
        foreach ($data as $row) {
            $objects[] = static::createFromObject($row);
        }
        return $objects;
    }

}
