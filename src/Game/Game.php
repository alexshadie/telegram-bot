<?php

namespace alexshadie\TelegramBot\Game;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Type\PhotoSize;
use alexshadie\TelegramBot\Objects\MessageEntity;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique
 * identifiers.
 *
 */
class Game extends Object
{
    /**
     * Title of the game
     *
     * @var string
     */
    private $title;

    /**
     * Description of the game
     *
     * @var string
     */
    private $description;

    /**
     * Photo that will be displayed in the game message in chats.
     *
     * @var PhotoSize[]
     */
    private $photo;

    /**
     * Brief description of the game or high scores included in the game message. Can be automatically edited to include
     * current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096
     * characters.
     *
     * @var string|null
     */
    private $text;

    /**
     * Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     *
     * @var MessageEntity[]|null
     */
    private $text_entities;

    /**
     * Animation that will be displayed in the game message in chats. Upload via BotFather
     *
     * @var Animation|null
     */
    private $animation;

    /**
     * Game constructor.
     *
     * @param string $title
     * @param string $description
     * @param PhotoSize[] $photo
     * @param string|null $text
     * @param MessageEntity[]|null $textEntities
     * @param Animation|null $animation
     */
    public function __construct(string $title, string $description, array $photo, ?string $text = null, ?array $textEntities = null, ?Animation $animation = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->photo = $photo;
        $this->text = $text;
        $this->text_entities = $textEntities;
        $this->animation = $animation;
    }

    /**
     * Title of the game
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Description of the game
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Photo that will be displayed in the game message in chats.
     *
     * @return PhotoSize[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * Brief description of the game or high scores included in the game message. Can be automatically edited to include
     * current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096
     * characters.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     *
     * @return MessageEntity[]|null
     */
    public function getTextEntities(): ?array
    {
        return $this->text_entities;
    }

    /**
     * Animation that will be displayed in the game message in chats. Upload via BotFather
     *
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
      * Creates Game object from data.
      * @param \stdClass $data
      * @return Game
      */
    public static function createFromObject(?\stdClass $data): ?Game
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Game(
            $data->title,
            $data->description,
            PhotoSize::createFromObjectList($data->photo)
        );

        $object->text = $data->text ?? null;
        $object->text_entities = MessageEntity::createFromObject($data->text_entities ?? null);
        $object->animation = Animation::createFromObject($data->animation ?? null);

        return $object;
    }

    /**
      * Creates array of Game objects from data.
      * @param array $data
      * @return Game[]
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
