<?php

namespace Yaf\Exception\LoadFailed;

/**
 * 在找不到路由指定的模块时抛出
 */
class Module extends \Yaf\Exception\LoadFailed {

    protected $file     = NULL;
    protected $line     = NULL;
    protected $message  = NULL;
    protected $code     = "0";
    protected $previous = NULL;

    final private function __clone();

    public function __construct($message = NULL, $code = NULL, $previous = NULL);

    final public function getMessage();

    final public function getCode();

    final public function getFile();

    final public function getLine();

    final public function getTrace();

    final public function getPrevious();

    final public function getTraceAsString();

    public function __toString();
}
