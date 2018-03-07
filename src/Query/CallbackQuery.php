<?php

namespace alexshadie\TelegramBot\Query;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Objects\User;

/**
 * This object represents an incoming callback query from a callback button in an inline keyboard. If the button that
 * originated the query was attached to a message sent by the bot, the field message will be present. If the button was
 * attached to a message sent via the bot (in inline mode), the field inline_message_id will be present. Exactly one of
 * the fields data or game_short_name will be present.
 *
 * 
 *
 * NOTE: After the user presses a callback button, Telegram clients will display a progress bar until you call
 * answerCallbackQuery. It is, therefore, necessary to react by calling answerCallbackQuery even if no notification to
 * the user is needed (e.g., without specifying any of the optional parameters).
 *
 */
class CallbackQuery extends Object
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
     * Message with the callback button that originated the query. Note that message content and message date will not be
     * available if the message is too old
     *
     * @var Message|null
     */
    private $message;

    /**
     * Identifier of the message sent via the bot in inline mode, that originated the query.
     *
     * @var string|null
     */
    private $inline_message_id;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful
     * for high scores in games.
     *
     * @var string
     */
    private $chat_instance;

    /**
     * Data associated with the callback button. Be aware that a bad client can send arbitrary data in this field.
     *
     * @var string|null
     */
    private $data;

    /**
     * Short name of a Game to be returned, serves as the unique identifier for the game
     *
     * @var string|null
     */
    private $game_short_name;

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
     * Message with the callback button that originated the query. Note that message content and message date will not be
     * available if the message is too old
     *
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * Identifier of the message sent via the bot in inline mode, that originated the query.
     *
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful
     * for high scores in games.
     *
     * @return string
     */
    public function getChatInstance(): string
    {
        return $this->chat_instance;
    }

    /**
     * Data associated with the callback button. Be aware that a bad client can send arbitrary data in this field.
     *
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Short name of a Game to be returned, serves as the unique identifier for the game
     *
     * @return string|null
     */
    public function getGameShortName(): ?string
    {
        return $this->game_short_name;
    }

    /**
      * Creates CallbackQuery object from data.
      * @param \stdClass $data
      * @return CallbackQuery
      */
    public static function createFromObject(?\stdClass $data): ?CallbackQuery
    {
        if (is_null($data)) {
            return null;
        }
        $object = new CallbackQuery();
        $object->id = $data->id;
        $object->from = User::createFromObject($data->from);
        $object->message = Message::createFromObject($data->message ?? null);
        $object->inline_message_id = $data->inline_message_id ?? null;
        $object->chat_instance = $data->chat_instance;
        $object->data = $data->data ?? null;
        $object->game_short_name = $data->game_short_name ?? null;
        return $object;
    }

    /**
      * Creates array of CallbackQuery objects from data.
      * @param array $data
      * @return CallbackQuery[]
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
