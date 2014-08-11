<?php

namespace Yaf;

abstract class Controller_Abstract {

    public $actions         = NULL;
    protected $_module      = NULL;
    protected $_name        = NULL;
    protected $_request     = NULL;
    protected $_response    = NULL;
    protected $_invoke_args = NULL;
    protected $_view        = NULL;

    protected function render($tpl, array $parameters = NULL);

    protected function display($tpl, array $parameters = NULL);

    /**
     * @return \Yaf\Request\Http
     */
    public function getRequest();

    /**
     * @return \Yaf\Response\Http
     */
    public function getResponse();

    public function getModuleName();

    /**
     * @return \Yaf\View\Simple;
     */
    public function getView();

    public function initView(array $options = NULL);

    public function setViewpath($view_directory);

    public function getViewpath();

    /**
     * 将当前请求转给另外一个动作处理
     *
     * 注意:
     * Yaf_Controller_Abstract::forward只是登记下一个要 forward 的目的地, 并不会立即跳转.
     * 而是会等到当前的 Action 执行完成以后, 才会进行新的一轮 dispatch.
     *
     * @param string $module     要转给动作的模块, 注意要首字母大写, 如果为空, 则转给当前模块
     * @param string $controller 要转给动作的控制器, 注意要首字母大写, 如果为空, 则转给当前控制器
     * @param string $action     要转给的动作, 注意要全部小写
     * @param string $paramters  关联数组, 附加的参数
     *
     */
    public function forward($module, $controller = NULL, $action = NULL, array $paramters = NULL);

    /**
     * 跳转到另一个URL
     *
     * @param string $url
     */
    public function redirect($url);

    public function getInvokeArgs();

    public function getInvokeArg($name);

    final public function __construct();

    final private function __clone();
}
