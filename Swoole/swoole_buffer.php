<?php

/**
 * Memory Operations for binary & string
 *
 * @package Swoole
 */
class swoole_buffer
{

    /**
     * @param int $size
     */
    function __construct($size = 128);

    /**
     * Append data at the end of the string buffer
     *
     * @param string $data
     * @return int
     */
    function append($data);

    /**
     * Remove the contents from the buffer.
     *
     * The memory is not immediately released, you need to destruct the object in order to really free up memory
     *
     * @param int $offset the offset, can be negative
     * @param int $length the length of the data, the default is from $offset to the end of entire buffer
     * @param bool $remove is data will be removed from the head of the buffer. Only valid with $offset = 0
     */
    function substr($offset, $length = -1, $remove = false);

    /**
     * Cleanup data
     *
     * The buffer will be reset. the object can be reused to handle new requests.
     * Swoole_buffer pointer-based operations to achieve clear, and will not write memory
     */
    function clear();

    /**
     * Buffer zone expansion
     *
     * @param int $newSize specify new buffer size, must be greater than the current size
     */
    function expand($newSize);

    /**
     * Write data to an arbitrary memory location.
     *
        * This function write directly to memory. Use with caution, as this may destruct the existing data.
     * This method does not automatically expand the size.
     *
     * @param int $offset
     * @param string $data written data, must not exceed the maximum size of the cache.
     */
    function write($offset, $data);
}
