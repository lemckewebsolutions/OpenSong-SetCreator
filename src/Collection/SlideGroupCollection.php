<?php

namespace OpenSongSetCreator\Collection;

use OpenSongSetCreator\SlideGroup\SlideGroup;

class SlideGroupCollection implements \Iterator, \ArrayAccess
{
    /**
     * @var array
     */
    private $collection;

    /**
     * Return the current element
     * @return SlideGroup
     */
    public function current()
    {
        return current($this->collection);
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        next($this->collection);
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return key($this->collection);
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        $key = key($this->collection);

        return ($key !== null && $key !== false);
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        reset($this->collection);
    }

    /**
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->collection);
    }

    /**
     * @param mixed $offset
     * @return SlideGroup
     */
    public function offsetGet($offset)
    {
        return $this->collection[$offset];
    }

    /**
     * @param mixed $offset
     * @param SlideGroup $value
     */
    public function offsetSet($offset, $value)
    {
        $this->collection[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->collection[$offset]);
    }
}