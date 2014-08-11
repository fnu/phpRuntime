<?php

namespace Yaf;

final class Router {

    protected $_routes  = NULL;
    protected $_current = NULL;

    public function __construct();

    public function addRoute();

    public function addConfig();

    public function route();

    public function getRoute();

    public function getRoutes();

    public function getCurrentRoute();
}
