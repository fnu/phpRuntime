<?php

namespace Yaf;

abstract class Request_Abstract {

    const SCHEME_HTTP  = "http";
    const SCHEME_HTTPS = "https";

    public $module        = NULL;
    public $controller    = NULL;
    public $action        = NULL;
    public $method        = NULL;
    protected $params     = NULL;
    protected $language   = NULL;
    protected $_exception = NULL;
    protected $_base_uri  = "";
    protected $uri        = "";
    protected $dispatched = "";
    protected $routed     = "";

    /**
     * @return boolean
     */
    public function isGet();

    /**
     * @return boolean
     */
    public function isPost();

    /**
     * @return boolean
     */
    public function isPut();

    /**
     * @return boolean
     */
    public function isHead();

    /**
     * @return boolean
     */
    public function isOptions();

    /**
     * 是否是命令行
     *
     * @return boolean
     */
    public function isCli();

    /**
     * 是否是Ajax请求
     *
     * @return boolean
     */
    public function isXmlHttpRequest();

    public function getServer($name, $default = NULL);

    public function getEnv($name, $default = NULL);

    public function setParam($name, $value = NULL);

    public function getParam($name, $default = NULL);

    public function getParams();

    public function getException();

    public function getModuleName();

    public function getControllerName();

    public function getActionName();

    public function setModuleName($module);

    public function setControllerName($controller);

    public function setActionName($action);

    public function getMethod();

    public function getLanguage();

    public function setBaseUri($uir);

    public function getBaseUri();

    public function getRequestUri();

    public function setRequestUri($uri);

    public function isDispatched();

    public function setDispatched();

    public function isRouted();

    public function setRouted($flag = NULL);
}
