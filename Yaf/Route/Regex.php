<?php

namespace Yaf\Route;

final class Regex extends \Yaf\Route_Interface implements \Yaf\Route_Interface {

    protected $_route   = NULL;
    protected $_default = NULL;
    protected $_maps    = NULL;
    protected $_verify  = NULL;

    public function __construct($match, array $route, array $map = NULL, array $verify = NULL);

    public function route($request);
}
