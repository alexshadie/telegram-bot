<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Represents the content of a contact message to be sent as the result of an inline query. 
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 */
class InputContactMessageContent extends Object
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
     * InputContactMessageContent constructor.
     *
     * @param string $phoneNumber
     * @param string $firstName
     * @param string|null $lastName
     */
    public function __construct(string $phoneNumber, string $firstName, ?string $lastName = null)
    {
        $this->phone_number = $phoneNumber;
        $this->first_name = $firstName;
        $this->last_name = $lastName;
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
      * Creates InputContactMessageContent object from data.
      * @param \stdClass $data
      * @return InputContactMessageContent
      */
    public static function createFromObject(?\stdClass $data): ?InputContactMessageContent
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InputContactMessageContent(
            $data->phone_number,
            $data->first_name
        );

        $object->last_name = $data->last_name ?? null;

        return $object;
    }

    /**
      * Creates array of InputContactMessageContent objects from data.
      * @param array $data
      * @return InputContactMessageContent[]
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
