<?php

namespace alexshadie\TelegramBot\Chat;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Objects\User;

/**
 * This object contains information about one member of a chat.
 *
 */
class ChatMember extends Object
{
    /**
     * Information about the user
     *
     * @var User
     */
    private $user;

    /**
     * The member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”,
     * “left” or “kicked”
     *
     * @var string
     */
    private $status;

    /**
     * Restricted and kicked only. Date when restrictions will be lifted for this user, unix time
     *
     * @var int|null
     */
    private $until_date;

    /**
     * Administrators only. True, if the bot is allowed to edit administrator privileges of that user
     *
     * @var bool|null
     */
    private $can_be_edited;

    /**
     * Administrators only. True, if the administrator can change the chat title, photo and other settings
     *
     * @var bool|null
     */
    private $can_change_info;

    /**
     * Administrators only. True, if the administrator can post in the channel, channels only
     *
     * @var bool|null
     */
    private $can_post_messages;

    /**
     * Administrators only. True, if the administrator can edit messages of other users and can pin messages, channels only
     *
     * @var bool|null
     */
    private $can_edit_messages;

    /**
     * Administrators only. True, if the administrator can delete messages of other users
     *
     * @var bool|null
     */
    private $can_delete_messages;

    /**
     * Administrators only. True, if the administrator can invite new users to the chat
     *
     * @var bool|null
     */
    private $can_invite_users;

    /**
     * Administrators only. True, if the administrator can restrict, ban or unban chat members
     *
     * @var bool|null
     */
    private $can_restrict_members;

    /**
     * Administrators only. True, if the administrator can pin messages, supergroups only
     *
     * @var bool|null
     */
    private $can_pin_messages;

    /**
     * Administrators only. True, if the administrator can add new administrators with a subset of his own privileges or
     * demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by
     * the user)
     *
     * @var bool|null
     */
    private $can_promote_members;

    /**
     * Restricted only. True, if the user can send text messages, contacts, locations and venues
     *
     * @var bool|null
     */
    private $can_send_messages;

    /**
     * Restricted only. True, if the user can send audios, documents, photos, videos, video notes and voice notes, implies
     * can_send_messages
     *
     * @var bool|null
     */
    private $can_send_media_messages;

    /**
     * Restricted only. True, if the user can send animations, games, stickers and use inline bots, implies
     * can_send_media_messages
     *
     * @var bool|null
     */
    private $can_send_other_messages;

    /**
     * Restricted only. True, if user may add web page previews to his messages, implies can_send_media_messages
     *
     * @var bool|null
     */
    private $can_add_web_page_previews;

    /**
     * Information about the user
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * The member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”,
     * “left” or “kicked”
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Restricted and kicked only. Date when restrictions will be lifted for this user, unix time
     *
     * @return int|null
     */
    public function getUntilDate(): ?int
    {
        return $this->until_date;
    }

    /**
     * Administrators only. True, if the bot is allowed to edit administrator privileges of that user
     *
     * @return bool|null
     */
    public function getCanBeEdited(): ?bool
    {
        return $this->can_be_edited;
    }

    /**
     * Administrators only. True, if the administrator can change the chat title, photo and other settings
     *
     * @return bool|null
     */
    public function getCanChangeInfo(): ?bool
    {
        return $this->can_change_info;
    }

    /**
     * Administrators only. True, if the administrator can post in the channel, channels only
     *
     * @return bool|null
     */
    public function getCanPostMessages(): ?bool
    {
        return $this->can_post_messages;
    }

    /**
     * Administrators only. True, if the administrator can edit messages of other users and can pin messages, channels only
     *
     * @return bool|null
     */
    public function getCanEditMessages(): ?bool
    {
        return $this->can_edit_messages;
    }

    /**
     * Administrators only. True, if the administrator can delete messages of other users
     *
     * @return bool|null
     */
    public function getCanDeleteMessages(): ?bool
    {
        return $this->can_delete_messages;
    }

    /**
     * Administrators only. True, if the administrator can invite new users to the chat
     *
     * @return bool|null
     */
    public function getCanInviteUsers(): ?bool
    {
        return $this->can_invite_users;
    }

    /**
     * Administrators only. True, if the administrator can restrict, ban or unban chat members
     *
     * @return bool|null
     */
    public function getCanRestrictMembers(): ?bool
    {
        return $this->can_restrict_members;
    }

    /**
     * Administrators only. True, if the administrator can pin messages, supergroups only
     *
     * @return bool|null
     */
    public function getCanPinMessages(): ?bool
    {
        return $this->can_pin_messages;
    }

    /**
     * Administrators only. True, if the administrator can add new administrators with a subset of his own privileges or
     * demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by
     * the user)
     *
     * @return bool|null
     */
    public function getCanPromoteMembers(): ?bool
    {
        return $this->can_promote_members;
    }

    /**
     * Restricted only. True, if the user can send text messages, contacts, locations and venues
     *
     * @return bool|null
     */
    public function getCanSendMessages(): ?bool
    {
        return $this->can_send_messages;
    }

    /**
     * Restricted only. True, if the user can send audios, documents, photos, videos, video notes and voice notes, implies
     * can_send_messages
     *
     * @return bool|null
     */
    public function getCanSendMediaMessages(): ?bool
    {
        return $this->can_send_media_messages;
    }

    /**
     * Restricted only. True, if the user can send animations, games, stickers and use inline bots, implies
     * can_send_media_messages
     *
     * @return bool|null
     */
    public function getCanSendOtherMessages(): ?bool
    {
        return $this->can_send_other_messages;
    }

    /**
     * Restricted only. True, if user may add web page previews to his messages, implies can_send_media_messages
     *
     * @return bool|null
     */
    public function getCanAddWebPagePreviews(): ?bool
    {
        return $this->can_add_web_page_previews;
    }

    /**
      * Creates ChatMember object from data.
      * @param \stdClass $data
      * @return ChatMember
      */
    public static function createFromObject(?\stdClass $data): ?ChatMember
    {
        if (is_null($data)) {
            return null;
        }
        $object = new ChatMember();
        $object->user = User::createFromObject($data->user);
        $object->status = $data->status;
        $object->until_date = $data->until_date ?? null;
        $object->can_be_edited = $data->can_be_edited ?? null;
        $object->can_change_info = $data->can_change_info ?? null;
        $object->can_post_messages = $data->can_post_messages ?? null;
        $object->can_edit_messages = $data->can_edit_messages ?? null;
        $object->can_delete_messages = $data->can_delete_messages ?? null;
        $object->can_invite_users = $data->can_invite_users ?? null;
        $object->can_restrict_members = $data->can_restrict_members ?? null;
        $object->can_pin_messages = $data->can_pin_messages ?? null;
        $object->can_promote_members = $data->can_promote_members ?? null;
        $object->can_send_messages = $data->can_send_messages ?? null;
        $object->can_send_media_messages = $data->can_send_media_messages ?? null;
        $object->can_send_other_messages = $data->can_send_other_messages ?? null;
        $object->can_add_web_page_previews = $data->can_add_web_page_previews ?? null;
        return $object;
    }

    /**
      * Creates array of ChatMember objects from data.
      * @param array $data
      * @return ChatMember[]
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
