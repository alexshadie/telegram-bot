<?php

namespace alexshadie\TelegramBot;

class TestUtils
{
    public static function getResourcePath()
    {
        return realpath(__DIR__ . "/resources") . "/";
    }
}