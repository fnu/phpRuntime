<?php

namespace Yaf;

/**
 * @link http://yaf.laruence.com/manual/yaf.class.response.html
 */
abstract class Response_Abstract {

    const DEFAULT_BODY = "content";

    protected $_header     = NULL;
    protected $_body       = NULL;
    protected $_sendheader = "";

    public function __construct();

    public function __destruct();

    private function __clone();

    public function __toString();

    /**
     * @link http://yaf.laruence.com/manual/yaf.class.response.setBody.html
     *
     * @param string $body 要响应的字符串, 一般是一段HTML, 或者是一段JSON(返回给Ajax请求)
     * @param string $name 要响应的字符串的key
     */
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
