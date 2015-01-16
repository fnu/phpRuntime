<?php

namespace Yaf;

/**
 * 实现了MVC中的C分发,
 * 它由 \Yaf\Application 负责初始化, 然后由 \Yaf\Application::run 启动,
 * 它协调路由来的请求, 并分发和执行发现的动作, 并收集动作产生的响应,
 * 输出响应给请求者, 并在整个过程完成以后返回响应.
 *
 * @link http://yaf.laruence.com/manual/yaf.class.dispatcher.html
 */
final class Dispatcher
{

    protected $_router             = NULL;
    protected $_view               = NULL;
    protected $_request            = NULL;
    protected $_plugins            = NULL;
    static protected $_instance    = NULL;
    protected $_auto_render        = "1";
    protected $_return_response    = "";
    protected $_instantly_flush    = "";
    protected $_default_module     = NULL;
    protected $_default_controller = NULL;
    protected $_default_action     = NULL;

    private function __construct();

    private function __clone();

    private function __sleep();

    private function __wakeup();

    public function enableView();

    public function disableView();

    public function initView($templates_dir, array $options = NULL);

    public function setView(\Yaf\View_Interface $view);

    /**
     * 设置请求体
     *
     * @param  \Yaf\Request_Abstract $request
     * @return \Yaf\Dispatcher
     */
    public function setRequest(\Yaf\Request_Abstract $request);

    public function getApplication();

    public function getRouter();

    /**
     * @return \Yaf\Request_Abstract
     */
    public function getRequest();

    public function setErrorHandler($callback, $error_types);

    public function setDefaultModule($module);

    public function setDefaultController($controller);

    public function setDefaultAction($action);

    public function returnResponse($flag);

    public function autoRender($flag);

    public function flushInstantly($flag);

    /**
     * @return \Yaf\Dispatcher
     */
    public static function getInstance();

    public function dispatch($request);

    public function throwException($flag = NULL);

    public function catchException($flag = NULL);

    public function registerPlugin($plugin);
}
