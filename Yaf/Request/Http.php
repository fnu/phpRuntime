<?php

namespace Yaf\Request;

class Http extends \Yaf\Request_Abstract {

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

    public function getQuery($name, $default = NULL);

    public function getRequest();

    public function getPost($name, $default = NULL);

    public function getCookie($name, $default = NULL);

    public function getFiles();

    public function get($name, $default = NULL);

    /**
     * 是否是Ajax请求
     *
     * @return boolean
     */
    public function isXmlHttpRequest();

    public function __construct();

    private function __clone();

    public function isGet();

    /**
     * 是否是POST方法请求
     *
     * @return boolean
     */
    public function isPost();

    public function isPut();

    public function isHead();

    public function isOptions();

    /**
     * 是否是命令行
     *
     * @return boolean
     */
    public function isCli();

    /**
     * 实现上是 $_SERVER 的一个包装
     *
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function getServer($name, $default = NULL);

    public function getEnv($name, $default = NULL);

    public function setParam($name, $value = NULL);

    /**
     * 获取当前请求中的所有路由参数,
     * 路由参数不是指 $_GET 或者 $_POST,
     * 而是在路由过程中, 路由协议根据Request Uri分析出的请求参数.
     *
     * 比如, 对于默认的路由协议 \Yaf\Route_Static,
     * 路由如下请求URL: http://www.domain.com/module/controller/action/name1/value1/name2/value2/
     * 路由结束后将会得到俩个路由参数, name1和name2, 值分别是value1, value2.
     *
     * 注意:
     * 路由参数和 $_GET, $_POST 一样, 是来自用户的输入, 不是可信的. 使用前需要做安全过滤.
     *
     * @param string $name 要获取的路由参数名
     * @param mixed $default 如果设定此参数, 在没有找到$name路由参数, 则返回此参数值.
     */
    public function getParam(string $name, mixed $default = NULL);

    /**
     * 当前所有的路由参数
     */
    public function getParams();

    public function getException();

    public function getModuleName();

    public function getControllerName();

    public function getActionName();

    public function setModuleName($module);

    public function setControllerName($controller);

    public function setActionName($action);

    /**
     * 获取当前请求的类型,
     * 可能的返回值为GET,POST,HEAD,PUT,CLI等.
     *
     * @return string [GET,POST,HEAD,PUT,CLI]
     */
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
