<?php

namespace Yaf;

abstract class Response_Abstract {

    const DEFAULT_BODY = "content";

    protected $_header     = NULL;
    protected $_body       = NULL;
    protected $_sendheader = "";

    public function __construct();

    public function __destruct();

    private function __clone();

    public function __toString();

    public function setBody($body, $name = NULL);

    public function appendBody($body, $name = NULL);

    public function prependBody($body, $name = NULL);

    public function clearBody($name = NULL);

    public function getBody($name = NULL);

    public function setHeader();

    public function setAllHeaders();

    public function getHeader();

    public function clearHeaders();

    public function setRedirect($url);

    public function response();
}
