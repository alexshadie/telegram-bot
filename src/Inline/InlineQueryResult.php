<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents one result of an inline query. Telegram clients currently support results of the following 20
 * types:
 *
 * 
 *
 * InlineQueryResultCachedAudio
 *
 * InlineQueryResultCachedDocument
 *
 * InlineQueryResultCachedGif
 *
 * InlineQueryResultCachedMpeg4Gif
 *
 * InlineQueryResultCachedPhoto
 *
 * InlineQueryResultCachedSticker
 *
 * InlineQueryResultCachedVideo
 *
 * InlineQueryResultCachedVoice
 *
 * InlineQueryResultArticle
 *
 * InlineQueryResultAudio
 *
 * InlineQueryResultContact
 *
 * InlineQueryResultGame
 *
 * InlineQueryResultDocument
 *
 * InlineQueryResultGif
 *
 * InlineQueryResultLocation
 *
 * InlineQueryResultMpeg4Gif
 *
 * InlineQueryResultPhoto
 *
 * InlineQueryResultVenue
 *
 * InlineQueryResultVideo
 *
 * InlineQueryResultVoice
 *
 */
class InlineQueryResult extends Object
{
    /**
     * InlineQueryResult constructor.
     *
     */
    public function __construct()
    {
    }

    /**
      * Creates InlineQueryResult object from data.
      * @param \stdClass $data
      * @return InlineQueryResult
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResult
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResult(
            
        );


        return $object;
    }

    /**
      * Creates array of InlineQueryResult objects from data.
      * @param array $data
      * @return InlineQueryResult[]
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
