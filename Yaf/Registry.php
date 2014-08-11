<?php

namespace Yaf;

final class Registry {

    static protected $_instance = NULL;
    protected $_entries         = NULL;

    private function __construct();

    private function __clone();

    public static function get($name);

    public static function has($name);

    public static function set($name, $value);

    public static function del($name);
}
