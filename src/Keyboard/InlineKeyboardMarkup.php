<?php

namespace alexshadie\TelegramBot\Keyboard;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will display unsupported
 * message.
 *
 */
class InlineKeyboardMarkup extends Object
{
    /**
     * Array of button rows, each represented by an Array of InlineKeyboardButton objects
     *
     * @var InlineKeyboardButton[]
     */
    private $inline_keyboard;

    /**
     * Current row of keyboard
     * @var int
     */
    private $currentRow = 0;

    /**
     * InlineKeyboardMarkup constructor.
     *
     * @param InlineKeyboardButton[] $inlineKeyboard
     */
    public function __construct(array $inlineKeyboard)
    {
        $this->inline_keyboard = $inlineKeyboard;
    }

    public function addButton(InlineKeyboardButton $button): InlineKeyboardMarkup
    {
        $this->inline_keyboard[$this->currentRow][] = $button;
        return $this;
    }

    public function nextRow()
    {
        $this->currentRow++;
    }

    /**
     * Array of button rows, each represented by an Array of InlineKeyboardButton objects
     *
     * @return InlineKeyboardButton[]
     */
    public function getInlineKeyboard(): array
    {
        return $this->inline_keyboard;
    }

    /**
     * Creates InlineKeyboardMarkup object from data.
     * @param \stdClass $data
     * @return InlineKeyboardMarkup
     */
    public static function createFromObject(?\stdClass $data): ?InlineKeyboardMarkup
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineKeyboardMarkup(
            InlineKeyboardButton::createFromObjectList($data->inline_keyboard)
        );


        return $object;
    }

    /**
     * Creates array of InlineKeyboardMarkup objects from data.
     * @param array $data
     * @return InlineKeyboardMarkup[]
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
        foreach ($this->inline_keyboard as $btns) {
            $row = [];
            foreach ($btns as $button) {
                $row[] = $button->getMarkup();
            }
            $result[] = $row;
        }
        return ['inline_keyboard' => $result];
    }

}
