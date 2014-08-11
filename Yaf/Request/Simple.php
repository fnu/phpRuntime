<?php

namespace Yaf\Request;

final class Simple extends \Yaf\Request_Abstract {

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

    public function __construct();

    private function __clone();

    public function getQuery();

    public function getRequest();

    public function getPost();

    public function getCookie();

    public function getFiles();

    public function get();

    public function isXmlHttpRequest();

    public function isGet();

    public function isPost();

    public function isPut();

    public function isHead();

    public function isOptions();

    public function isCli();

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

    public function setRequestUri($uir);

    public function isDispatched();

    public function setDispatched();

    public function isRouted();

    public function setRouted($flag = NULL);
}
