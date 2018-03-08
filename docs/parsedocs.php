<?php

include (__DIR__ . '/../vendor/autoload.php');

use alexshadie\TelegramBot\Dev\ApiDocDefinitionsParser;


$parser = new ApiDocDefinitionsParser();
$parser->parse();
$parser->loadFiles();

//$parser->buildObjectFiles();
//$parser->buildApi();

