<?php

namespace alexshadie\TelegramBot\Message;


/**
 * Stub for Voice class. Use it for testing.
 */
class VoiceStub extends Voice
{
    /**
     * @return Voice
     */
    public static function getVoiceWithCommonFields1(): Voice
    {
        return new Voice(
            'RnvIRqE5Pi',
            1993493250
        );
    }
    /**
     * @return Voice
     */
    public static function getVoiceWithCommonFields2(): Voice
    {
        return new Voice(
            'OO6IQN2yOF',
            1441763102
        );
    }
    /**
     * @return Voice
     */
    public static function getVoiceWithCommonFields3(): Voice
    {
        return new Voice(
            '5CBvLE67TJ',
            1823900740
        );
    }
    /**
     * @return Voice
     */
    public static function getVoiceWithAllFields1(): Voice
    {
        return new Voice(
            'TyJhaGnTgo',
            144559931,
            'qTdf9yqism',
            1576309584
        );
    }
    /**
     * @return Voice
     */
    public static function getVoiceWithAllFields2(): Voice
    {
        return new Voice(
            'vE5u6HOVh6',
            1998463800,
            'zvOHSa0j7E',
            612637647
        );
    }
    /**
     * @return Voice
     */
    public static function getVoiceWithAllFields3(): Voice
    {
        return new Voice(
            'jVgP77aKsz',
            1951479019,
            'a08AQZVKHD',
            596540351
        );
    }
}
