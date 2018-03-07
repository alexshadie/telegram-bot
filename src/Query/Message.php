<?php

namespace alexshadie\TelegramBot\Query;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Chat\Chat;
use alexshadie\TelegramBot\Objects\MessageEntity;
use alexshadie\TelegramBot\Message\Audio;
use alexshadie\TelegramBot\Message\Document;
use alexshadie\TelegramBot\Game\Game;
use alexshadie\TelegramBot\Type\PhotoSize;
use alexshadie\TelegramBot\Message\Sticker;
use alexshadie\TelegramBot\Message\Video;
use alexshadie\TelegramBot\Message\Voice;
use alexshadie\TelegramBot\Message\VideoNote;
use alexshadie\TelegramBot\Message\Contact;
use alexshadie\TelegramBot\Type\Location;
use alexshadie\TelegramBot\Message\Venue;
use alexshadie\TelegramBot\Payment\Invoice;
use alexshadie\TelegramBot\Payment\SuccessfulPayment;

/**
 * This object represents a message.
 *
 */
class Message extends Object
{
    /**
     * Unique message identifier inside this chat
     *
     * @var int
     */
    private $message_id;

    /**
     * Sender, empty for messages sent to channels
     *
     * @var User|null
     */
    private $from;

    /**
     * Date the message was sent in Unix time
     *
     * @var int
     */
    private $date;

    /**
     * Conversation the message belongs to
     *
     * @var Chat
     */
    private $chat;

    /**
     * For forwarded messages, sender of the original message
     *
     * @var User|null
     */
    private $forward_from;

    /**
     * For messages forwarded from channels, information about the original channel
     *
     * @var Chat|null
     */
    private $forward_from_chat;

    /**
     * For messages forwarded from channels, identifier of the original message in the channel
     *
     * @var int|null
     */
    private $forward_from_message_id;

    /**
     * For messages forwarded from channels, signature of the post author if present
     *
     * @var string|null
     */
    private $forward_signature;

    /**
     * For forwarded messages, date the original message was sent in Unix time
     *
     * @var int|null
     */
    private $forward_date;

    /**
     * For replies, the original message. Note that the Message object in this field will not contain further
     * reply_to_message fields even if it itself is a reply.
     *
     * @var Message|null
     */
    private $reply_to_message;

    /**
     * Date the message was last edited in Unix time
     *
     * @var int|null
     */
    private $edit_date;

    /**
     * The unique identifier of a media message group this message belongs to
     *
     * @var string|null
     */
    private $media_group_id;

    /**
     * Signature of the post author for messages in channels
     *
     * @var string|null
     */
    private $author_signature;

    /**
     * For text messages, the actual UTF-8 text of the message, 0-4096 characters.
     *
     * @var string|null
     */
    private $text;

    /**
     * For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     *
     * @var MessageEntity[]|null
     */
    private $entities;

    /**
     * For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
     *
     * @var MessageEntity[]|null
     */
    private $caption_entities;

    /**
     * Message is an audio file, information about the file
     *
     * @var Audio|null
     */
    private $audio;

    /**
     * Message is a general file, information about the file
     *
     * @var Document|null
     */
    private $document;

    /**
     * Message is a game, information about the game. More about games »
     *
     * @var Game|null
     */
    private $game;

    /**
     * Message is a photo, available sizes of the photo
     *
     * @var PhotoSize[]|null
     */
    private $photo;

    /**
     * Message is a sticker, information about the sticker
     *
     * @var Sticker|null
     */
    private $sticker;

    /**
     * Message is a video, information about the video
     *
     * @var Video|null
     */
    private $video;

    /**
     * Message is a voice message, information about the file
     *
     * @var Voice|null
     */
    private $voice;

    /**
     * Message is a video note, information about the video message
     *
     * @var VideoNote|null
     */
    private $video_note;

    /**
     * Caption for the audio, document, photo, video or voice, 0-200 characters
     *
     * @var string|null
     */
    private $caption;

    /**
     * Message is a shared contact, information about the contact
     *
     * @var Contact|null
     */
    private $contact;

    /**
     * Message is a shared location, information about the location
     *
     * @var Location|null
     */
    private $location;

    /**
     * Message is a venue, information about the venue
     *
     * @var Venue|null
     */
    private $venue;

    /**
     * New members that were added to the group or supergroup and information about them (the bot itself may be one of these
     * members)
     *
     * @var User[]|null
     */
    private $new_chat_members;

    /**
     * A member was removed from the group, information about them (this member may be the bot itself)
     *
     * @var User|null
     */
    private $left_chat_member;

    /**
     * A chat title was changed to this value
     *
     * @var string|null
     */
    private $new_chat_title;

    /**
     * A chat photo was change to this value
     *
     * @var PhotoSize[]|null
     */
    private $new_chat_photo;

    /**
     * Service message: the chat photo was deleted
     *
     * @var bool|null
     */
    private $delete_chat_photo;

    /**
     * Service message: the group has been created
     *
     * @var bool|null
     */
    private $group_chat_created;

    /**
     * Service message: the supergroup has been created. This field can‘t be received in a message coming through updates,
     * because bot can’t be a member of a supergroup when it is created. It can only be found in reply_to_message if
     * someone replies to a very first message in a directly created supergroup.
     *
     * @var bool|null
     */
    private $supergroup_chat_created;

    /**
     * Service message: the channel has been created. This field can‘t be received in a message coming through updates,
     * because bot can’t be a member of a channel when it is created. It can only be found in reply_to_message if someone
     * replies to a very first message in a channel.
     *
     * @var bool|null
     */
    private $channel_chat_created;

    /**
     * The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits
     * and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits,
     * so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    private $migrate_to_chat_id;

    /**
     * The supergroup has been migrated from a group with the specified identifier. This number may be greater than 32 bits
     * and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits,
     * so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    private $migrate_from_chat_id;

    /**
     * Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message
     * fields even if it is itself a reply.
     *
     * @var Message|null
     */
    private $pinned_message;

    /**
     * Message is an invoice for a payment, information about the invoice. More about payments »
     *
     * @var Invoice|null
     */
    private $invoice;

    /**
     * Message is a service message about a successful payment, information about the payment. More about payments »
     *
     * @var SuccessfulPayment|null
     */
    private $successful_payment;

    /**
     * The domain name of the website on which the user has logged in. More about Telegram Login »
     *
     * @var string|null
     */
    private $connected_website;

    /**
     * Unique message identifier inside this chat
     *
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * Sender, empty for messages sent to channels
     *
     * @return User|null
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * Date the message was sent in Unix time
     *
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * Conversation the message belongs to
     *
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * For forwarded messages, sender of the original message
     *
     * @return User|null
     */
    public function getForwardFrom(): ?User
    {
        return $this->forward_from;
    }

    /**
     * For messages forwarded from channels, information about the original channel
     *
     * @return Chat|null
     */
    public function getForwardFromChat(): ?Chat
    {
        return $this->forward_from_chat;
    }

    /**
     * For messages forwarded from channels, identifier of the original message in the channel
     *
     * @return int|null
     */
    public function getForwardFromMessageId(): ?int
    {
        return $this->forward_from_message_id;
    }

    /**
     * For messages forwarded from channels, signature of the post author if present
     *
     * @return string|null
     */
    public function getForwardSignature(): ?string
    {
        return $this->forward_signature;
    }

    /**
     * For forwarded messages, date the original message was sent in Unix time
     *
     * @return int|null
     */
    public function getForwardDate(): ?int
    {
        return $this->forward_date;
    }

    /**
     * For replies, the original message. Note that the Message object in this field will not contain further
     * reply_to_message fields even if it itself is a reply.
     *
     * @return Message|null
     */
    public function getReplyToMessage(): ?Message
    {
        return $this->reply_to_message;
    }

    /**
     * Date the message was last edited in Unix time
     *
     * @return int|null
     */
    public function getEditDate(): ?int
    {
        return $this->edit_date;
    }

    /**
     * The unique identifier of a media message group this message belongs to
     *
     * @return string|null
     */
    public function getMediaGroupId(): ?string
    {
        return $this->media_group_id;
    }

    /**
     * Signature of the post author for messages in channels
     *
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

    /**
     * For text messages, the actual UTF-8 text of the message, 0-4096 characters.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     *
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
     *
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    /**
     * Message is an audio file, information about the file
     *
     * @return Audio|null
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * Message is a general file, information about the file
     *
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * Message is a game, information about the game. More about games »
     *
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * Message is a photo, available sizes of the photo
     *
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * Message is a sticker, information about the sticker
     *
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * Message is a video, information about the video
     *
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * Message is a voice message, information about the file
     *
     * @return Voice|null
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * Message is a video note, information about the video message
     *
     * @return VideoNote|null
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->video_note;
    }

    /**
     * Caption for the audio, document, photo, video or voice, 0-200 characters
     *
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * Message is a shared contact, information about the contact
     *
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * Message is a shared location, information about the location
     *
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * Message is a venue, information about the venue
     *
     * @return Venue|null
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * New members that were added to the group or supergroup and information about them (the bot itself may be one of these
     * members)
     *
     * @return User[]|null
     */
    public function getNewChatMembers(): ?array
    {
        return $this->new_chat_members;
    }

    /**
     * A member was removed from the group, information about them (this member may be the bot itself)
     *
     * @return User|null
     */
    public function getLeftChatMember(): ?User
    {
        return $this->left_chat_member;
    }

    /**
     * A chat title was changed to this value
     *
     * @return string|null
     */
    public function getNewChatTitle(): ?string
    {
        return $this->new_chat_title;
    }

    /**
     * A chat photo was change to this value
     *
     * @return PhotoSize[]|null
     */
    public function getNewChatPhoto(): ?array
    {
        return $this->new_chat_photo;
    }

    /**
     * Service message: the chat photo was deleted
     *
     * @return bool|null
     */
    public function getDeleteChatPhoto(): ?bool
    {
        return $this->delete_chat_photo;
    }

    /**
     * Service message: the group has been created
     *
     * @return bool|null
     */
    public function getGroupChatCreated(): ?bool
    {
        return $this->group_chat_created;
    }

    /**
     * Service message: the supergroup has been created. This field can‘t be received in a message coming through updates,
     * because bot can’t be a member of a supergroup when it is created. It can only be found in reply_to_message if
     * someone replies to a very first message in a directly created supergroup.
     *
     * @return bool|null
     */
    public function getSupergroupChatCreated(): ?bool
    {
        return $this->supergroup_chat_created;
    }

    /**
     * Service message: the channel has been created. This field can‘t be received in a message coming through updates,
     * because bot can’t be a member of a channel when it is created. It can only be found in reply_to_message if someone
     * replies to a very first message in a channel.
     *
     * @return bool|null
     */
    public function getChannelChatCreated(): ?bool
    {
        return $this->channel_chat_created;
    }

    /**
     * The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits
     * and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits,
     * so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrate_to_chat_id;
    }

    /**
     * The supergroup has been migrated from a group with the specified identifier. This number may be greater than 32 bits
     * and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits,
     * so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @return int|null
     */
    public function getMigrateFromChatId(): ?int
    {
        return $this->migrate_from_chat_id;
    }

    /**
     * Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message
     * fields even if it is itself a reply.
     *
     * @return Message|null
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinned_message;
    }

    /**
     * Message is an invoice for a payment, information about the invoice. More about payments »
     *
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * Message is a service message about a successful payment, information about the payment. More about payments »
     *
     * @return SuccessfulPayment|null
     */
    public function getSuccessfulPayment(): ?SuccessfulPayment
    {
        return $this->successful_payment;
    }

    /**
     * The domain name of the website on which the user has logged in. More about Telegram Login »
     *
     * @return string|null
     */
    public function getConnectedWebsite(): ?string
    {
        return $this->connected_website;
    }

    /**
      * Creates Message object from data.
      * @param \stdClass $data
      * @return Message
      */
    public static function createFromObject(?\stdClass $data): ?Message
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Message();
        $object->message_id = $data->message_id;
        $object->from = User::createFromObject($data->from ?? null);
        $object->date = $data->date;
        $object->chat = Chat::createFromObject($data->chat);
        $object->forward_from = User::createFromObject($data->forward_from ?? null);
        $object->forward_from_chat = Chat::createFromObject($data->forward_from_chat ?? null);
        $object->forward_from_message_id = $data->forward_from_message_id ?? null;
        $object->forward_signature = $data->forward_signature ?? null;
        $object->forward_date = $data->forward_date ?? null;
        $object->reply_to_message = Message::createFromObject($data->reply_to_message ?? null);
        $object->edit_date = $data->edit_date ?? null;
        $object->media_group_id = $data->media_group_id ?? null;
        $object->author_signature = $data->author_signature ?? null;
        $object->text = $data->text ?? null;
        $object->entities = MessageEntity::createFromObject($data->entities ?? null);
        $object->caption_entities = MessageEntity::createFromObject($data->caption_entities ?? null);
        $object->audio = Audio::createFromObject($data->audio ?? null);
        $object->document = Document::createFromObject($data->document ?? null);
        $object->game = Game::createFromObject($data->game ?? null);
        $object->photo = PhotoSize::createFromObject($data->photo ?? null);
        $object->sticker = Sticker::createFromObject($data->sticker ?? null);
        $object->video = Video::createFromObject($data->video ?? null);
        $object->voice = Voice::createFromObject($data->voice ?? null);
        $object->video_note = VideoNote::createFromObject($data->video_note ?? null);
        $object->caption = $data->caption ?? null;
        $object->contact = Contact::createFromObject($data->contact ?? null);
        $object->location = Location::createFromObject($data->location ?? null);
        $object->venue = Venue::createFromObject($data->venue ?? null);
        $object->new_chat_members = User::createFromObject($data->new_chat_members ?? null);
        $object->left_chat_member = User::createFromObject($data->left_chat_member ?? null);
        $object->new_chat_title = $data->new_chat_title ?? null;
        $object->new_chat_photo = PhotoSize::createFromObject($data->new_chat_photo ?? null);
        $object->delete_chat_photo = $data->delete_chat_photo ?? null;
        $object->group_chat_created = $data->group_chat_created ?? null;
        $object->supergroup_chat_created = $data->supergroup_chat_created ?? null;
        $object->channel_chat_created = $data->channel_chat_created ?? null;
        $object->migrate_to_chat_id = $data->migrate_to_chat_id ?? null;
        $object->migrate_from_chat_id = $data->migrate_from_chat_id ?? null;
        $object->pinned_message = Message::createFromObject($data->pinned_message ?? null);
        $object->invoice = Invoice::createFromObject($data->invoice ?? null);
        $object->successful_payment = SuccessfulPayment::createFromObject($data->successful_payment ?? null);
        $object->connected_website = $data->connected_website ?? null;
        return $object;
    }

    /**
      * Creates array of Message objects from data.
      * @param array $data
      * @return Message[]
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
