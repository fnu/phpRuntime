<?php

namespace Yaf\Config;

/**
 * 为存储在数组中的配置数据提供了适配器。
 */
final class Simple extends \Yaf\Config_Abstract implements Iterator, Traversable, ArrayAccess, Countable {

    protected $_config   = NULL;
    protected $_readonly = "";

    public function __construct($config_file, $section = NULL);

    public function __isset($name);

    public function get($name = NULL);

    public function set($name, $value);

    public function count();

    public function offsetUnset($name);

    public function rewind();

    public function current();

    public function next();

    public function valid();

    public function key();

    public function readonly();

    public function toArray();

    public function __set($name, $value);

    public function __get($name = NULL);

    public function offsetGet($name);

    public function offsetExists($name);

    public function offsetSet($name, $value);
}
