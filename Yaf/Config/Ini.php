<?php

namespace Yaf\Config;

/**
 * 为存储在Ini文件的配置数据提供了适配器
 *
 * 允许开发者通过嵌套的对象属性语法在应用程序中用熟悉的 INI 格式存储和读取配置数据。
 * INI格式在提供拥有配置数据键的等级结构和配置数据节之间的继承能力方面具有专长。
 * 配置数据等级结构通过用点或者句号(.)分离键值。
 * 一个节可以扩展或者通过在节的名称之后带一个冒号(:)和被继承的配置数据的节的名称来从另一个节继承。
 */
final class Ini extends \Yaf\Config_Abstract implements Iterator, Traversable, ArrayAccess, Countable {

    protected $_config   = NULL;
    protected $_readonly = "1";

    public function __construct($config_file, $section = NULL);

    public function __isset($name);

    public function __get($name = NULL);

    public function __set($name, $value);

    public function get($name = NULL);

    public function set($name, $value);

    public function count();

    public function rewind();

    public function current();

    public function next();

    public function valid();

    public function key();

    public function toArray();

    public function readonly();

    public function offsetUnset($name);

    public function offsetGet($name);

    public function offsetExists($name);

    public function offsetSet($name, $value);
}
