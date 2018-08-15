<?php

namespace alexshadie\TelegramBot\Keyboard;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents a custom keyboard with reply options (see Introduction to bots for details and examples).
 *
 */
class ReplyKeyboardMarkup extends Object
{
    /**
     * Array of button rows, each represented by an Array of KeyboardButton objects
     *
     * @var KeyboardButton[]
     */
    private $keyboard;

    /**
     * Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are just
     * two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the app's
     * standard keyboard.
     *
     * @var bool|null
     */
    private $resize_keyboard;

    /**
     * Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but clients
     * will automatically display the usual letter-keyboard in the chat – the user can press a special button in the input
     * field to see the custom keyboard again. Defaults to false.
     *
     * @var bool|null
     */
    private $one_time_keyboard;

    /**
     * Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in
     * the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original
     * message.Example: A user requests to change the bot‘s language, bot replies to the request with a keyboard to select
     * the new language. Other users in the group don’t see the keyboard.
     *
     * @var bool|null
     */
    private $selective;

    /**
     * ReplyKeyboardMarkup constructor.
     *
     * @param KeyboardButton[] $keyboard
     * @param bool|null $resizeKeyboard
     * @param bool|null $oneTimeKeyboard
     * @param bool|null $selective
     */
    public function __construct(array $keyboard, ?bool $resizeKeyboard = null, ?bool $oneTimeKeyboard = null, ?bool $selective = null)
    {
        $this->keyboard = $keyboard;
        $this->resize_keyboard = $resizeKeyboard;
        $this->one_time_keyboard = $oneTimeKeyboard;
        $this->selective = $selective;
    }

    /**
     * Array of button rows, each represented by an Array of KeyboardButton objects
     *
     * @return KeyboardButton[]
     */
    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    /**
     * Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are just
     * two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the app's
     * standard keyboard.
     *
     * @return bool|null
     */
    public function getResizeKeyboard(): ?bool
    {
        return $this->resize_keyboard;
    }

    /**
     * Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but clients
     * will automatically display the usual letter-keyboard in the chat – the user can press a special button in the input
     * field to see the custom keyboard again. Defaults to false.
     *
     * @return bool|null
     */
    public function getOneTimeKeyboard(): ?bool
    {
        return $this->one_time_keyboard;
    }

    /**
     * Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in
     * the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original
     * message.Example: A user requests to change the bot‘s language, bot replies to the request with a keyboard to select
     * the new language. Other users in the group don’t see the keyboard.
     *
     * @return bool|null
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }

    /**
      * Creates ReplyKeyboardMarkup object from data.
      * @param \stdClass $data
      * @return ReplyKeyboardMarkup
      */
    public static function createFromObject(?\stdClass $data): ?ReplyKeyboardMarkup
    {
        if (is_null($data)) {
            return null;
        }
        $object = new ReplyKeyboardMarkup(
            KeyboardButton::createFromObjectList($data->keyboard)
        );

        $object->resize_keyboard = $data->resize_keyboard ?? null;
        $object->one_time_keyboard = $data->one_time_keyboard ?? null;
        $object->selective = $data->selective ?? null;

        return $object;
    }

    /**
      * Creates array of ReplyKeyboardMarkup objects from data.
      * @param array $data
      * @return ReplyKeyboardMarkup[]
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

    public function getMarkup()
    {
        $result = [];

        $buttons = [];
        foreach ($this->keyboard as $button) {
            $buttons[] = $button->getMarkup();
        }
        $result['keyboard'] = [$buttons];
        if ($this->resize_keyboard) {
            $result['resize_keyboard'] = $this->resize_keyboard;
        }
        if ($this->one_time_keyboard) {
            $result['one_time_keyboard'] = $this->one_time_keyboard;
        }
        if ($this->selective) {
            $result['selective'] = $this->selective;
        }

        return $result;
    }

}
