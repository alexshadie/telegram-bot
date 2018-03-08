<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Type\Location;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner. 
 *
 * Note: It is necessary to enable inline feedback via @Botfather in order to receive these objects in updates.
 *
 * 
 *
 * Payments
 *
 * Your bot can accept payments from Telegram users. Please see the introduction to payments for more details on the
 * process and how to set up payments for your bot. Please note that users will need Telegram v.4.0 or higher to use
 * payments (released on May 18, 2017).
 *
 */
class ChosenInlineResult extends Object
{
    /**
     * The unique identifier for the result that was chosen
     *
     * @var string
     */
    private $result_id;

    /**
     * The user that chose the result
     *
     * @var User
     */
    private $from;

    /**
     * Sender location, only for bots that require user location
     *
     * @var Location|null
     */
    private $location;

    /**
     * Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be
     * also received in callback queries and can be used to edit the message.
     *
     * @var string|null
     */
    private $inline_message_id;

    /**
     * The query that was used to obtain the result
     *
     * @var string
     */
    private $query;

    /**
     * ChosenInlineResult constructor.
     *
     * @param string $resultId
     * @param User $from
     * @param Location|null $location
     * @param string|null $inlineMessageId
     * @param string $query
     */
    public function __construct(string $resultId, User $from, string $query, ?Location $location = null, ?string $inlineMessageId = null)
    {
        $this->result_id = $resultId;
        $this->from = $from;
        $this->location = $location;
        $this->inline_message_id = $inlineMessageId;
        $this->query = $query;
    }

    /**
     * The unique identifier for the result that was chosen
     *
     * @return string
     */
    public function getResultId(): string
    {
        return $this->result_id;
    }

    /**
     * The user that chose the result
     *
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * Sender location, only for bots that require user location
     *
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be
     * also received in callback queries and can be used to edit the message.
     *
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    /**
     * The query that was used to obtain the result
     *
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
      * Creates ChosenInlineResult object from data.
      * @param \stdClass $data
      * @return ChosenInlineResult
      */
    public static function createFromObject(?\stdClass $data): ?ChosenInlineResult
    {
        if (is_null($data)) {
            return null;
        }
        $object = new ChosenInlineResult(
            $data->result_id,
            User::createFromObject($data->from),
            $data->query
        );

        $object->location = Location::createFromObject($data->location ?? null);
        $object->inline_message_id = $data->inline_message_id ?? null;

        return $object;
    }

    /**
      * Creates array of ChosenInlineResult objects from data.
      * @param array $data
      * @return ChosenInlineResult[]
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
