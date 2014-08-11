<?php

namespace Yaf;

/**
 * \Yaf\Action_Abstract 是MVC中C的动作,
 * 一般而言动作都是定义在 \Yaf\Controller_Abstract 的派生类中的.
 *
 * 但是有的时候, 为了使得代码清晰, 分离一些大的控制器,
 * 则可以采用单独定义 \Yaf\Action_Abstract 来实现.
 *
 * \Yaf\Action_Abstract 体系具有可扩展性,
 * 可以通过继承已有的类, 来实现这个抽象类, 从而添加应用自己的应用逻辑.
 *
 * @link http://yaf.laruence.com/manual/yaf.class.action.html
 */
abstract class Action_Abstract extends \Yaf\Controller_Abstract {

    public $actions         = NULL;
    protected $_module      = NULL;
    protected $_name        = NULL;
    protected $_request     = NULL;
    protected $_response    = NULL;
    protected $_invoke_args = NULL;
    protected $_view        = NULL;
    protected $_controller  = NULL;

    abstract public function execute();

    /**
     * 返回所属的控制器
     *
     * @return \Yaf\Controller_Abstract
     */
    public function getController();

    protected function render($tpl, array $parameters = NULL);

    protected function display($tpl, array $parameters = NULL);

    public function getRequest();

    public function getResponse();

    public function getModuleName();

    /**
     * @return \Yaf\View\Simple;
     */
    public function getView();

    public function initView(array $options = NULL);

    public function setViewpath($view_directory);

    public function getViewpath();

    public function forward($module, $controller = NULL, $action = NULL, array $paramters = NULL);

    public function redirect($url);

    public function getInvokeArgs();

    public function getInvokeArg($name);

    final public function __construct();

    final private function __clone();
}
