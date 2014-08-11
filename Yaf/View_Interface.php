<?php

namespace Yaf;

/**
 * 为了提供可扩展的, 可自定的视图引擎而设立的视图引擎接口,
 * 它定义了用在Yaf上的视图引擎需要实现的方法和功能.
 */
interface View_Interface {

    abstract public function assign();

    abstract public function display();

    abstract public function render();

    abstract public function setScriptPath();

    abstract public function getScriptPath();
}
