<?php
namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Class Audio
 * Этот объект представляет аудиозапись, которую клиенты Telegram воспинимают как музыкальный трек.
 * @package telegram
 */
class Audio extends Object
{
    /**
     * Уникальный идентификатор файла
     * @var string
     */
    private $file_id;
    /**
     * Duration of the audio in seconds as defined by sender
     * @var int
     */
    private $duration;
    /**
     * Performer of the audio as defined by sender or by audio tags
     * @var string|null
     */
    private $performer;
    /**
     * Title of the audio as defined by sender or by audio tags
     * @var string|null
     */
    private $title;
    /**
     * MIME файла, заданный отправителем
     * @var string|null
     */
    private $mime_type;
    /**
     * Размер файла
     * @var int|null
     */
    private $file_size;
}