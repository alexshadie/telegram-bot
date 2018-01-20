<?php

namespace alexshadie\telegram\query;

use alexshadie\telegram\objects\Object;
use alexshadie\telegram\objects\User;

/**
 * Class CallbackQuery
 * Этот объект представляет входящий запрос обратной связи от инлайн-кнопки с заданным callback_data.
 *
 * Если кнопка, создавшая этот запрос, была привязана к сообщению, то в запросе будет присутствовать поле message.
 *
 * Если кнопка была показана в сообщении, отправленном при помощи встроенного режима, в запросе будет присутствовать поле inline_message_id.
 * @package telegram
 */
class CallbackQuery extends Object
{
    /**
     * Уникальный идентификатор запроса
     * @var string
     */
    private $id;
    /**
     * Отправитель
     * @var User
     */
    private $from;
    /**
     * Опционально. Сообщение, к которому была привязана вызвавшая запрос кнопка.
     * Обратите внимание: если сообщение слишком старое, содержание сообщения и дата отправки будут недоступны.
     * @var Message|null
     */
    private $message;
    /**
     * Опционально. Идентификатор сообщения, отправленного через вашего бота во встроенном режиме
     * @var string|null
     */
    private $inline_message_id;
    /**
     * Данные, связанные с кнопкой. Обратите внимание, что клиенты могут добавлять свои данные в это поле.
     * @var string|null
     */
    private $data;

}