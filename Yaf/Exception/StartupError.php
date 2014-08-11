<?php

namespace Yaf\Exception;

/**
 * 在Yaf启动失败的时候抛出.
 */
class StartupError extends \Yaf\Exception {

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
