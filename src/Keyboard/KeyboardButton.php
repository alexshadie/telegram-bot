<?php

namespace alexshadie\TelegramBot\Keyboard;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents one button of the reply keyboard. For simple text buttons String can be used instead of this
 * object to specify text of the button. Optional fields are mutually exclusive.
 *
 * Note: request_contact and request_location options will only work in Telegram versions released after 9 April, 2016.
 * Older clients will ignore them.
 *
 */
class KeyboardButton extends Object
{
    /**
     * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
     *
     * @var string
     */
    private $text;

    /**
     * If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats
     * only
     *
     * @var bool|null
     */
    private $request_contact;

    /**
     * If True, the user's current location will be sent when the button is pressed. Available in private chats only
     *
     * @var bool|null
     */
    private $request_location;

    /**
     * KeyboardButton constructor.
     *
     * @param string $text
     * @param bool|null $requestContact
     * @param bool|null $requestLocation
     */
    public function __construct(string $text, ?bool $requestContact = null, ?bool $requestLocation = null)
    {
        $this->text = $text;
        $this->request_contact = $requestContact;
        $this->request_location = $requestLocation;
    }

    /**
     * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats
     * only
     *
     * @return bool|null
     */
    public function getRequestContact(): ?bool
    {
        return $this->request_contact;
    }

    /**
     * If True, the user's current location will be sent when the button is pressed. Available in private chats only
     *
     * @return bool|null
     */
    public function getRequestLocation(): ?bool
    {
        return $this->request_location;
    }

    /**
      * Creates KeyboardButton object from data.
      * @param \stdClass $data
      * @return KeyboardButton
      */
    public static function createFromObject(?\stdClass $data): ?KeyboardButton
    {
        if (is_null($data)) {
            return null;
        }
        $object = new KeyboardButton(
            $data->text
        );

        $object->request_contact = $data->request_contact ?? null;
        $object->request_location = $data->request_location ?? null;

        return $object;
    }

    /**
      * Creates array of KeyboardButton objects from data.
      * @param array $data
      * @return KeyboardButton[]
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

    public function getMarkup() {
        $result = [];
        if ($this->text) {
            $result['text'] = $this->text;
        }
        if ($this->request_contact) {
            $result['request_contact'] = $this->request_contact;
        }
        if ($this->request_location) {
            $result['request_location'] = $this->request_location;
        }
        return $result;
    }

}
