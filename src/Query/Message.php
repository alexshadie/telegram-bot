<?php

namespace alexshadie\TelegramBot\Query;

use alexshadie\TelegramBot\Message\Audio;
use alexshadie\TelegramBot\Message\Contact;
use alexshadie\TelegramBot\Message\Document;
use alexshadie\TelegramBot\Message\Sticker;
use alexshadie\TelegramBot\Message\Venue;
use alexshadie\TelegramBot\Message\Video;
use alexshadie\TelegramBot\Message\Voice;
use alexshadie\TelegramBot\Objects\Chat;
use alexshadie\TelegramBot\Objects\MessageEntity;
use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Type\Location;
use alexshadie\TelegramBot\Type\PhotoSize;

/**
 * Class Message
 * Этот объект представляет собой сообщение.
 * @package telegram
 */
class Message extends Object
{
    /** @var int Уникальный идентификатор сообщения */
    private $messageId;
    /** @var User|null Отправитель. Может быть пустым в каналах. */
    private $from;
    /** @var int Дата отправки сообщения (Unix time) */
    private $date;
    /** @var Chat Диалог, в котором было отправлено сообщение */
    private $chat;
    /** @var User|null Для пересланных сообщений: отправитель оригинального сообщения */
    private $forward_from;
    /** @var int|null Для пересланных сообщений: дата отправки оригинального сообщения */
    private $forward_date;
    /** @var Message|null Для ответов: оригинальное сообщение. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply. */
    private $reply_to_message;
    /** @var string|null Для текстовых сообщений: текст сообщения, 0-4096 символов */
    private $text;
    /** @var MessageEntity[]|null Для текстовых сообщений: особые сущности в тексте сообщения. */
    private $entities;
    /** @var Audio|null Информация об аудиофайле */
    private $audio;
    /** @var Document|null Информация о файле */
    private $document;
    /** @var PhotoSize[]|null */
    private $photo;
    /** @var Sticker|null Информация о стикере */
    private $sticker;
    /** @var Video|null Информация о видеозаписи */
    private $video;
    /** @var Voice|null Информация о голосовом сообщении */
    private $voice;
    /** @var string|null Подпись к файлу, фото или видео, 0-200 символов */
    private $caption;
    /** @var Contact|null Информация об отправленном контакте */
    private $contact;
    /** @var Location|null Информация о местоположении */
    private $location;
    /** @var Venue|null Информация о месте на карте */
    private $venue;
    /** @var User|null Информация о пользователе, добавленном в группу */
    private $new_chat_member;
    /** @var User|null Информация о пользователе, удалённом из группы */
    private $left_chat_member;
    /** @var string|null Название группы было изменено на это поле */
    private $new_chat_title;
    /** @var PhotoSize|null Фото группы было изменено на это поле */
    private $new_chat_photo;
    /** @var bool|null Сервисное сообщение: фото группы было удалено */
    private $delete_chat_photo;
    /** @var bool|null Сервисное сообщение: группа создана */
    private $group_chat_created;
    /** @var bool|null Сервисное сообщение: супергруппа создана */
    private $supergroup_chat_created;
    /** @var bool|null Сервисное сообщение: канал создан */
    private $channel_chat_created;
    /** @var int|null Группа была преобразована в супергруппу с указанным идентификатором. Не превышает 1e13 */
    private $migrate_to_chat_id;
    /** @var int|null Cупергруппа была создана из группы с указанным идентификатором. Не превышает 1e13 */
    private $migrate_from_chat_id;
    /** @var Message|null Указанное сообщение было прикреплено. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply. */
    private $pinned_message;

    /**
     * @param \stdClass $data
     * @return Message|null
     */
    public static function createFromObject(\stdClass $data)
    {
        if (is_null($data)) {
            return null;
        }
        $message = new Message();
        $message->messageId = $data->message_id;
        $message->from = User::createFromObject($data->from ?? null);
        $message->date = $data->date ?? null;
        $message->chat = Chat::createFromObject($data->chat ?? null);
        $message->forward_from = User::createFromObject($data->forward_from ?? null);
        $message->forward_date = $data->forward_date ?? null;
        $message->reply_to_message = Message::createFromObject($data->reply_to_message ?? null);
        $message->text = $data->text ?? null;
        $message->entities = MessageEntity::createFromObjectList($data->entities ?? null);
        $message->audio = Audio::createFromObject($data->audio ?? null);
        $message->document = Document::createFromObject($data->document ?? null);
        $message->photo = PhotoSize::createFromObjectList($data->photo ?? null);
        $message->sticker = Sticker::createFromObject($data->sticker ?? null);
        $message->video = Video::createFromObject($data->video ?? null);
        $message->voice = Voice::createFromObject($data->voice ?? null);
        $message->caption = $data->caption ?? null;
        $message->contact = Contact::createFromObject($data->contact ?? null);
        $message->location = Location::createFromObject($data->location ?? null);
        $message->venue = Venue::createFromObject($data->venue ?? null);
        $message->new_chat_member = User::createFromObject($data->new_chat_member ?? null);
        $message->left_chat_member = User::createFromObject($data->left_chat_member ?? null);
        $message->new_chat_title = $data->new_chat_title ?? null;
        $message->new_chat_photo = PhotoSize::createFromObject($data->new_chat_photo ?? null);
        $message->delete_chat_photo = $data->delete_chat_photo ?? null;
        $message->group_chat_created = $data->group_chat_created ?? null;
        $message->supergroup_chat_created = $data->supergroup_chat_created ?? null;
        $message->channel_chat_created = $data->channel_chat_created ?? null;
        $message->migrate_to_chat_id = $data->migrate_to_chat_id ?? null;
        $message->migrate_from_chat_id = $data->migrate_from_chat_id ?? null;
        $message->pinned_message = Message::createFromObject($data->pinned_message ?? null);

        return $message;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @return User|null
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @return User|null
     */
    public function getForwardFrom()
    {
        return $this->forward_from;
    }

    /**
     * @return int|null
     */
    public function getForwardDate()
    {
        return $this->forward_date;
    }

    /**
     * @return Message|null
     */
    public function getReplyToMessage()
    {
        return $this->reply_to_message;
    }

    /**
     * @return null|string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @return Audio|null
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * @return Document|null
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker()
    {
        return $this->sticker;
    }

    /**
     * @return Video|null
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @return Voice|null
     */
    public function getVoice()
    {
        return $this->voice;
    }

    /**
     * @return null|string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @return Contact|null
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return Location|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return Venue|null
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @return User|null
     */
    public function getNewChatMember()
    {
        return $this->new_chat_member;
    }

    /**
     * @return User|null
     */
    public function getLeftChatMember()
    {
        return $this->left_chat_member;
    }

    /**
     * @return null|string
     */
    public function getNewChatTitle()
    {
        return $this->new_chat_title;
    }

    /**
     * @return PhotoSize|null
     */
    public function getNewChatPhoto()
    {
        return $this->new_chat_photo;
    }

    /**
     * @return bool|null
     */
    public function getDeleteChatPhoto()
    {
        return $this->delete_chat_photo;
    }

    /**
     * @return bool|null
     */
    public function getGroupChatCreated()
    {
        return $this->group_chat_created;
    }

    /**
     * @return bool|null
     */
    public function getSupergroupChatCreated()
    {
        return $this->supergroup_chat_created;
    }

    /**
     * @return bool|null
     */
    public function getChannelChatCreated()
    {
        return $this->channel_chat_created;
    }

    /**
     * @return int|null
     */
    public function getMigrateToChatId()
    {
        return $this->migrate_to_chat_id;
    }

    /**
     * @return int|null
     */
    public function getMigrateFromChatId()
    {
        return $this->migrate_from_chat_id;
    }

    /**
     * @return Message|null
     */
    public function getPinnedMessage()
    {
        return $this->pinned_message;
    }


}