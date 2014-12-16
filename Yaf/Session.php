<?php

namespace Yaf;

/**
 * @link http://yaf.laruence.com/manual/yaf.class.session.html
 */
final class Session implements \Iterator, \Traversable, \ArrayAccess, \Countable
{

    static protected $_instance = NULL;
    protected $_session         = NULL;
    protected $_started         = "";

    private function __construct();

    private function __clone();

    private function __sleep();

    private function __wakeup();

    public function __get($name);

    /**
     * @return boolean
     */
    public function __set($name, $value);

    /**
     * @return boolean
     */
    public function __isset($name);

    /**
     * @return boolean
     */
    public function __unset($name);

    /**
     * @return \Yaf\Session;
     */
    public static function getInstance();

    public function start();

    public function get($name);

    /**
     * @return boolean
     */
    public function has($name);

    /**
     * @param string $name  键名
     * @param mixed  $value 键值
     *
     * @return boolean
     */
    public function set($name, $value);

    /**
     * @return boolean
     */
    public function del($name);

    /**
     * @return int
     */
    public function count();

    public function rewind();

    public function next();

    /**
     * @return mixed
     */
    public function current();

    public function key();

    public function valid();

    public function offsetGet($name);

    public function offsetSet($name, $value);

    public function offsetExists($name);

    public function offsetUnset($name);
}
