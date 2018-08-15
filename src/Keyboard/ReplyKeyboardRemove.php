<?php

namespace alexshadie\TelegramBot\Keyboard;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard and display the
 * default letter-keyboard. By default, custom keyboards are displayed until a new keyboard is sent by a bot. An
 * exception is made for one-time keyboards that are hidden immediately after the user presses a button (see
 * ReplyKeyboardMarkup).
 *
 */
class ReplyKeyboardRemove extends Object
{
    /**
     * Requests clients to remove the custom keyboard (user will not be able to summon this keyboard; if you want to hide
     * the keyboard from sight but keep it accessible, use one_time_keyboard in ReplyKeyboardMarkup)
     *
     * @var bool
     */
    private $remove_keyboard;

    /**
     * Use this parameter if you want to remove the keyboard for specific users only. Targets: 1) users that are @mentioned
     * in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the
     * original message.Example: A user votes in a poll, bot returns confirmation message in reply to the vote and removes
     * the keyboard for that user, while still showing the keyboard with poll options to users who haven't voted yet.
     *
     * @var bool|null
     */
    private $selective;

    /**
     * ReplyKeyboardRemove constructor.
     *
     * @param bool $removeKeyboard
     * @param bool|null $selective
     */
    public function __construct(bool $removeKeyboard, ?bool $selective = null)
    {
        $this->remove_keyboard = $removeKeyboard;
        $this->selective = $selective;
    }

    /**
     * Requests clients to remove the custom keyboard (user will not be able to summon this keyboard; if you want to hide
     * the keyboard from sight but keep it accessible, use one_time_keyboard in ReplyKeyboardMarkup)
     *
     * @return bool
     */
    public function getRemoveKeyboard(): bool
    {
        return $this->remove_keyboard;
    }

    /**
     * Use this parameter if you want to remove the keyboard for specific users only. Targets: 1) users that are @mentioned
     * in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the
     * original message.Example: A user votes in a poll, bot returns confirmation message in reply to the vote and removes
     * the keyboard for that user, while still showing the keyboard with poll options to users who haven't voted yet.
     *
     * @return bool|null
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }

    /**
      * Creates ReplyKeyboardRemove object from data.
      * @param \stdClass $data
      * @return ReplyKeyboardRemove
      */
    public static function createFromObject(?\stdClass $data): ?ReplyKeyboardRemove
    {
        if (is_null($data)) {
            return null;
        }
        $object = new ReplyKeyboardRemove(
            $data->remove_keyboard
        );

        $object->selective = $data->selective ?? null;

        return $object;
    }

    /**
      * Creates array of ReplyKeyboardRemove objects from data.
      * @param array $data
      * @return ReplyKeyboardRemove[]
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
        $markup = [];
        if ($this->remove_keyboard) {
            $markup['remove_keyboard'] = $this->remove_keyboard;
        }
        if ($this->selective) {
            $markup['selective'] = $this->selective;
        }
        return $markup;
    }

}
