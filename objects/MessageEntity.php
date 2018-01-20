<?php

namespace alexshadie\telegram\objects;

use alexshadie\telegram\objects\Object;

/**
 * Class MessageEntity
 * Этот объект представляет одну из особых сущностей в текстовом сообщении.
 * Например: хештеги, имена пользователей, ссылки итд.
 * @package telegram
 */
class MessageEntity extends Object
{
    /**
     * Type of the entity. One of mention (@username), hashtag, bot_command, url, email, bold (bold text),
     * italic (italic text), code (monowidth string), pre (monowidth block), text_link (for clickable text URLs)
     * @var string
     */
    private $type;
    /**
     * Offset in UTF-16 code units to the start of the entity
     * @var int
     */
    private $offset;
    /**
     * Length of the entity in UTF-16 code units
     * @var string
     */
    private $length;
    /**
     * Опционально. For “text_link” only, url that will be opened after user taps on the text
     * @var string|null
     */
    private $url;
}