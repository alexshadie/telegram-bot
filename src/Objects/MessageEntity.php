<?php

namespace alexshadie\TelegramBot\Objects;


/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 */
class MessageEntity extends Object
{
    /**
     * Type of the entity. Can be mention (@username), hashtag, bot_command, url, email, bold (bold text), italic (italic
     * text), code (monowidth string), pre (monowidth block), text_link (for clickable text URLs), text_mention (for users
     * without usernames)
     *
     * @var string
     */
    private $type;

    /**
     * Offset in UTF-16 code units to the start of the entity
     *
     * @var int
     */
    private $offset;

    /**
     * Length of the entity in UTF-16 code units
     *
     * @var int
     */
    private $length;

    /**
     * For “text_link” only, url that will be opened after user taps on the text
     *
     * @var string|null
     */
    private $url;

    /**
     * For “text_mention” only, the mentioned user
     *
     * @var User|null
     */
    private $user;

    /**
     * MessageEntity constructor.
     *
     * @param string $type
     * @param int $offset
     * @param int $length
     * @param string|null $url
     * @param User|null $user
     */
    public function __construct(string $type, int $offset, int $length, ?string $url = null, ?User $user = null)
    {
        $this->type = $type;
        $this->offset = $offset;
        $this->length = $length;
        $this->url = $url;
        $this->user = $user;
    }

    /**
     * Type of the entity. Can be mention (@username), hashtag, bot_command, url, email, bold (bold text), italic (italic
     * text), code (monowidth string), pre (monowidth block), text_link (for clickable text URLs), text_mention (for users
     * without usernames)
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Offset in UTF-16 code units to the start of the entity
     *
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * Length of the entity in UTF-16 code units
     *
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * For “text_link” only, url that will be opened after user taps on the text
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * For “text_mention” only, the mentioned user
     *
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
      * Creates MessageEntity object from data.
      * @param \stdClass $data
      * @return MessageEntity
      */
    public static function createFromObject(?\stdClass $data): ?MessageEntity
    {
        if (is_null($data)) {
            return null;
        }
        $object = new MessageEntity(
            $data->type,
            $data->offset,
            $data->length
        );

        $object->url = $data->url ?? null;
        $object->user = User::createFromObject($data->user ?? null);

        return $object;
    }

    /**
      * Creates array of MessageEntity objects from data.
      * @param array $data
      * @return MessageEntity[]
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
