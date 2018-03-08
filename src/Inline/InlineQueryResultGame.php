<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a Game.
 *
 * Note: This will only work in Telegram versions released after October 1, 2016. Older clients will not display any
 * inline results if a game result is among them.
 *
 */
class InlineQueryResultGame extends Object
{
    /**
     * Type of the result, must be game
     *
     * @var string
     */
    private $type;

    /**
     * Unique identifier for this result, 1-64 bytes
     *
     * @var string
     */
    private $id;

    /**
     * Short name of the game
     *
     * @var string
     */
    private $game_short_name;

    /**
     * Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    private $reply_markup;

    /**
     * InlineQueryResultGame constructor.
     *
     * @param string $type
     * @param string $id
     * @param string $gameShortName
     * @param InlineKeyboardMarkup|null $replyMarkup
     */
    public function __construct(string $type, string $id, string $gameShortName, ?InlineKeyboardMarkup $replyMarkup = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->game_short_name = $gameShortName;
        $this->reply_markup = $replyMarkup;
    }

    /**
     * Type of the result, must be game
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Unique identifier for this result, 1-64 bytes
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Short name of the game
     *
     * @return string
     */
    public function getGameShortName(): string
    {
        return $this->game_short_name;
    }

    /**
     * Inline keyboard attached to the message
     *
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    /**
      * Creates InlineQueryResultGame object from data.
      * @param \stdClass $data
      * @return InlineQueryResultGame
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultGame
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultGame(
            $data->type,
            $data->id,
            $data->game_short_name
        );

        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);

        return $object;
    }

    /**
      * Creates array of InlineQueryResultGame objects from data.
      * @param array $data
      * @return InlineQueryResultGame[]
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
