<?php

namespace alexshadie\TelegramBot\Message;


/**
 * Stub for Audio class. Use it for testing.
 */
class AudioStub extends Audio
{
    /**
     * @return Audio
     */
    public static function getAudioWithCommonFields1(): Audio
    {
        return new Audio(
            'jH7mc4KAXA',
            754403240
        );
    }
    /**
     * @return Audio
     */
    public static function getAudioWithCommonFields2(): Audio
    {
        return new Audio(
            'u5qBA5watX',
            307337544
        );
    }
    /**
     * @return Audio
     */
    public static function getAudioWithCommonFields3(): Audio
    {
        return new Audio(
            'XJe8tEYLf7',
            1902011873
        );
    }
    /**
     * @return Audio
     */
    public static function getAudioWithAllFields1(): Audio
    {
        return new Audio(
            'EhCv1gOqaa',
            1004076851,
            'YUsXSCNiuO',
            'PnFzAd2slK',
            'kS9VAjbpbx',
            577622590
        );
    }
    /**
     * @return Audio
     */
    public static function getAudioWithAllFields2(): Audio
    {
        return new Audio(
            '44FNq2Jzoi',
            1588076089,
            'skEZhHjN5k',
            'lR0WUlLrh3',
            'PM1iq2ZFvb',
            1889113337
        );
    }
    /**
     * @return Audio
     */
    public static function getAudioWithAllFields3(): Audio
    {
        return new Audio(
            '7KmMaTWdlt',
            808182007,
            '3srw58plTZ',
            'TFGRzaufRj',
            '0USI9b8qX4',
            1557700996
        );
    }
}
