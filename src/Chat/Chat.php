<?php

namespace alexshadie\TelegramBot\Chat;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Query\Message;

/**
 * This object represents a chat.
 *
 */
class Chat extends Object
{
    /**
     * Unique identifier for this chat. This number may be greater than 32 bits and some programming languages may have
     * difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or
     * double-precision float type are safe for storing this identifier.
     *
     * @var int
     */
    private $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     *
     * @var string
     */
    private $type;

    /**
     * Title, for supergroups, channels and group chats
     *
     * @var string|null
     */
    private $title;

    /**
     * Username, for private chats, supergroups and channels if available
     *
     * @var string|null
     */
    private $username;

    /**
     * First name of the other party in a private chat
     *
     * @var string|null
     */
    private $first_name;

    /**
     * Last name of the other party in a private chat
     *
     * @var string|null
     */
    private $last_name;

    /**
     * True if a group has ‘All Members Are Admins’ enabled.
     *
     * @var bool|null
     */
    private $all_members_are_administrators;

    /**
     * Chat photo. Returned only in getChat.
     *
     * @var ChatPhoto|null
     */
    private $photo;

    /**
     * Description, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string|null
     */
    private $description;

    /**
     * Chat invite link, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string|null
     */
    private $invite_link;

    /**
     * Pinned message, for supergroups and channel chats. Returned only in getChat.
     *
     * @var Message|null
     */
    private $pinned_message;

    /**
     * For supergroups, name of group sticker set. Returned only in getChat.
     *
     * @var string|null
     */
    private $sticker_set_name;

    /**
     * True, if the bot can change the group sticker set. Returned only in getChat.
     *
     * @var bool|null
     */
    private $can_set_sticker_set;

    /**
     * Chat constructor.
     *
     * @param int $id
     * @param string $type
     * @param string|null $title
     * @param string|null $username
     * @param string|null $firstName
     * @param string|null $lastName
     * @param bool|null $allMembersAreAdministrators
     * @param ChatPhoto|null $photo
     * @param string|null $description
     * @param string|null $inviteLink
     * @param Message|null $pinnedMessage
     * @param string|null $stickerSetName
     * @param bool|null $canSetStickerSet
     */
    public function __construct(int $id, string $type, ?string $title = null, ?string $username = null, ?string $firstName = null, ?string $lastName = null, ?bool $allMembersAreAdministrators = null, ?ChatPhoto $photo = null, ?string $description = null, ?string $inviteLink = null, ?Message $pinnedMessage = null, ?string $stickerSetName = null, ?bool $canSetStickerSet = null)
    {
        $this->id = $id;
        $this->type = $type;
        $this->title = $title;
        $this->username = $username;
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->all_members_are_administrators = $allMembersAreAdministrators;
        $this->photo = $photo;
        $this->description = $description;
        $this->invite_link = $inviteLink;
        $this->pinned_message = $pinnedMessage;
        $this->sticker_set_name = $stickerSetName;
        $this->can_set_sticker_set = $canSetStickerSet;
    }

    /**
     * Unique identifier for this chat. This number may be greater than 32 bits and some programming languages may have
     * difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or
     * double-precision float type are safe for storing this identifier.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Title, for supergroups, channels and group chats
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Username, for private chats, supergroups and channels if available
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * First name of the other party in a private chat
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * Last name of the other party in a private chat
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * True if a group has ‘All Members Are Admins’ enabled.
     *
     * @return bool|null
     */
    public function getAllMembersAreAdministrators(): ?bool
    {
        return $this->all_members_are_administrators;
    }

    /**
     * Chat photo. Returned only in getChat.
     *
     * @return ChatPhoto|null
     */
    public function getPhoto(): ?ChatPhoto
    {
        return $this->photo;
    }

    /**
     * Description, for supergroups and channel chats. Returned only in getChat.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Chat invite link, for supergroups and channel chats. Returned only in getChat.
     *
     * @return string|null
     */
    public function getInviteLink(): ?string
    {
        return $this->invite_link;
    }

    /**
     * Pinned message, for supergroups and channel chats. Returned only in getChat.
     *
     * @return Message|null
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinned_message;
    }

    /**
     * For supergroups, name of group sticker set. Returned only in getChat.
     *
     * @return string|null
     */
    public function getStickerSetName(): ?string
    {
        return $this->sticker_set_name;
    }

    /**
     * True, if the bot can change the group sticker set. Returned only in getChat.
     *
     * @return bool|null
     */
    public function getCanSetStickerSet(): ?bool
    {
        return $this->can_set_sticker_set;
    }

    /**
      * Creates Chat object from data.
      * @param \stdClass $data
      * @return Chat
      */
    public static function createFromObject(?\stdClass $data): ?Chat
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Chat(
            $data->id,
            $data->type
        );

        $object->title = $data->title ?? null;
        $object->username = $data->username ?? null;
        $object->first_name = $data->first_name ?? null;
        $object->last_name = $data->last_name ?? null;
        $object->all_members_are_administrators = $data->all_members_are_administrators ?? null;
        $object->photo = ChatPhoto::createFromObject($data->photo ?? null);
        $object->description = $data->description ?? null;
        $object->invite_link = $data->invite_link ?? null;
        $object->pinned_message = Message::createFromObject($data->pinned_message ?? null);
        $object->sticker_set_name = $data->sticker_set_name ?? null;
        $object->can_set_sticker_set = $data->can_set_sticker_set ?? null;

        return $object;
    }

    /**
      * Creates array of Chat objects from data.
      * @param array $data
      * @return Chat[]
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
