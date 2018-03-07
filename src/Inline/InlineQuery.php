<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Type\Location;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some
 * default or trending results.
 *
 */
class InlineQuery extends Object
{
    /**
     * Unique identifier for this query
     *
     * @var string
     */
    private $id;

    /**
     * Sender
     *
     * @var User
     */
    private $from;

    /**
     * Sender location, only for bots that request user location
     *
     * @var Location|null
     */
    private $location;

    /**
     * Text of the query (up to 512 characters)
     *
     * @var string
     */
    private $query;

    /**
     * Offset of the results to be returned, can be controlled by the bot
     *
     * @var string
     */
    private $offset;

    /**
     * Unique identifier for this query
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sender
     *
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * Sender location, only for bots that request user location
     *
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * Text of the query (up to 512 characters)
     *
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * Offset of the results to be returned, can be controlled by the bot
     *
     * @return string
     */
    public function getOffset(): string
    {
        return $this->offset;
    }

    /**
      * Creates InlineQuery object from data.
      * @param \stdClass $data
      * @return InlineQuery
      */
    public static function createFromObject(?\stdClass $data): ?InlineQuery
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQuery();
        $object->id = $data->id;
        $object->from = User::createFromObject($data->from);
        $object->location = Location::createFromObject($data->location ?? null);
        $object->query = $data->query;
        $object->offset = $data->offset;
        return $object;
    }

    /**
      * Creates array of InlineQuery objects from data.
      * @param array $data
      * @return InlineQuery[]
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
