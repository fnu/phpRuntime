<?php

namespace Yaf;

/**
 * 被设计在应用程序中简化访问和使用配置数据。
 * 它为在应用程序代码中访问这样的配置数据提 供了一个基于用户接口的嵌入式对象属性。
 * 配置数据可能来自于各种支持等级结构数据存储的媒体。
 * \Yaf\Config_Abstract实现了Countable, ArrayAccess 和 Iterator 接口。
 * 这样，可以基于\Yaf\Config_Abstract对象使用count()函数和PHP语句如foreach,
 *  也可以通过数组方式访问\Yaf\Config_Abstract的元素.
 */
abstract class Config_Abstract implements \Iterator, \Traversable, \ArrayAccess, \Countable {

    protected $_config   = NULL;
    protected $_readonly = "1";

    abstract public function get();

    abstract public function set();

    abstract public function readonly();

    abstract public function toArray();
}
