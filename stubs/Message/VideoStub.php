<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Type\PhotoSizeStub;

/**
 * Stub for Video class. Use it for testing.
 */
class VideoStub extends Video
{
    /**
     * @return Video
     */
    public static function getVideoWithCommonFields1(): Video
    {
        return new Video(
            'HGf4pWV1u4',
            654068478,
            49929465,
            417022312
        );
    }
    /**
     * @return Video
     */
    public static function getVideoWithCommonFields2(): Video
    {
        return new Video(
            'hNQzuiTNjH',
            1255829532,
            1814752248,
            263272910
        );
    }
    /**
     * @return Video
     */
    public static function getVideoWithCommonFields3(): Video
    {
        return new Video(
            'FXNK8numT7',
            1323785184,
            977359929,
            1867324353
        );
    }
    /**
     * @return Video
     */
    public static function getVideoWithAllFields1(): Video
    {
        return new Video(
            '6Z5lOO2e49',
            92385293,
            1494187081,
            1220277428,
            PhotoSizeStub::getPhotoSizeWithCommonFields3(),
            'yzsUyMsL1d',
            316856151
        );
    }
    /**
     * @return Video
     */
    public static function getVideoWithAllFields2(): Video
    {
        return new Video(
            'H5xpTPaC97',
            744242236,
            616956652,
            168009756,
            PhotoSizeStub::getPhotoSizeWithCommonFields3(),
            'CByngvrSoW',
            297108949
        );
    }
    /**
     * @return Video
     */
    public static function getVideoWithAllFields3(): Video
    {
        return new Video(
            'ChVAuB0hDP',
            226462865,
            1652857160,
            647760290,
            PhotoSizeStub::getPhotoSizeWithCommonFields2(),
            'Uu2uSI6HdK',
            1985261876
        );
    }
}
