<?php

namespace alexshadie\telegram\keyboard;

use alexshadie\telegram\objects\Object;

/**
 * Class ReplyKeyboardMarkup
 * Этот объект представляет клавиатуру с опциями ответа (см. описание ботов).
 * @package telegram
 */
class ReplyKeyboardMarkup extends Object
{
    /**
     * Массив рядов кнопок, каждый из которых является массивом объектов KeyboardButton
     * @var KeyboardButton[][]
     */
    private $keyboard;
    /**
     * Опционально. Указывает клиенту подогнать высоту клавиатуры под количество кнопок
     * (сделать её меньше, если кнопок мало). По умолчанию False, то есть клавиатура всегда такого же размера,
     * как и стандартная клавиатура устройства.
     * @var Boolean
     */
    private $resize_keyboard;
    /**
     * Опционально. Указывает клиенту скрыть клавиатуру после использования (после нажатия на кнопку). Её по-прежнему
     * можно будет открыть через иконку в поле ввода сообщения. По умолчанию False.
     * @var Boolean
     */
    private $one_time_keyboard;
    /**
     * Опционально. Этот параметр нужен, чтобы показывать клавиатуру только определённым пользователям. Цели:
     * 1) пользователи, которые были @упомянуты в поле text объекта Message;
     * 2) если сообщения бота является ответом (содержит поле reply_to_message_id), авторы этого сообщения.
     *
     * Пример: Пользователь отправляет запрос на смену языка бота. Бот отправляет клавиатуру со списком языков,
     * видимую только этому пользователю.
     * @var Boolean
     */
    private $selective;
}