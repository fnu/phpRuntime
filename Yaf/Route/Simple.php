<?php

namespace Yaf\Route;

final class Simple implements \Yaf\Route_Interface {

    protected $controller = NULL;
    protected $module     = NULL;
    protected $action     = NULL;

    public function __construct($module_name, $controller_name, $action_name);

    public function route($request);
}
