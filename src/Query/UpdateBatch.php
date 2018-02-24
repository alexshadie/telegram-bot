<?php


namespace alexshadie\TelegramBot\Query;


class UpdateBatch implements \ArrayAccess, \Iterator, \Countable
{
    /** @var Update[] */
    private $updates = [];

    private $position;

    public function __construct(array $updates)
    {
        $this->updates = $updates;
        $this->position = 0;
    }

    /**
     * Gets last update id. Null for empty batch.
     * @return int|null
     */
    public function getLastUpdateId() {
        if (!count($this->updates)) {
            return null;
        }
        return end($this->updates)->getUpdateId();
    }

    // ArrayAccess methods
    public function offsetExists($offset)
    {
        return isset($this->updates[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->updates[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->updates[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->updates[$offset]);
    }

    // Countable
    public function count()
    {
        return count($this->updates);
    }


    // Iterator
    public function current()
    {
        return $this->updates[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->updates[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}