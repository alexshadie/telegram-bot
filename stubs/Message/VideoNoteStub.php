<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Type\PhotoSizeStub;

/**
 * Stub for VideoNote class. Use it for testing.
 */
class VideoNoteStub extends VideoNote
{
    /**
     * @return VideoNote
     */
    public static function getVideoNoteWithCommonFields1(): VideoNote
    {
        return new VideoNote(
            'kJ1q9v3J3k',
            694919289,
            1669944389
        );
    }
    /**
     * @return VideoNote
     */
    public static function getVideoNoteWithCommonFields2(): VideoNote
    {
        return new VideoNote(
            'uZxn9dqKaN',
            2065844697,
            1033626083
        );
    }
    /**
     * @return VideoNote
     */
    public static function getVideoNoteWithCommonFields3(): VideoNote
    {
        return new VideoNote(
            'U3dgcTaCu5',
            761896690,
            406891753
        );
    }
    /**
     * @return VideoNote
     */
    public static function getVideoNoteWithAllFields1(): VideoNote
    {
        return new VideoNote(
            'EJZRmZ6CBN',
            1841975647,
            1627352587,
            PhotoSizeStub::getPhotoSizeWithCommonFields3(),
            425800221
        );
    }
    /**
     * @return VideoNote
     */
    public static function getVideoNoteWithAllFields2(): VideoNote
    {
        return new VideoNote(
            '6BMP1lVBQI',
            293245164,
            391663289,
            PhotoSizeStub::getPhotoSizeWithCommonFields3(),
            1838910295
        );
    }
    /**
     * @return VideoNote
     */
    public static function getVideoNoteWithAllFields3(): VideoNote
    {
        return new VideoNote(
            'TSiqH9eZXT',
            1571552768,
            1613876356,
            PhotoSizeStub::getPhotoSizeWithCommonFields3(),
            1358743811
        );
    }
}
